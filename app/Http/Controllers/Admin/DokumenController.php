<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\GenerateSkpiFileJob;
use App\Models\DokumenSkpi;
use App\Models\JenjangPendidikan;
use App\Models\Mahasiswa;
use App\Models\PengajuanSkpi;
use App\Models\Pengaturan;
use App\Models\Prestasi;
use App\Models\ProgramStudi;
use App\Utils\Skpi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class DokumenController extends Controller
{
    public function index()
    {
        // join mahasiswa_program_studi where mahasiswa_id = dokumen_skpi.mahasiswa_id and program_studi_id = dokumen_skpi.program_studi_id
        $data = DokumenSkpi::join('mahasiswa_program_studi as mps', function ($join) {
            $join->on('dokumen_skpi.mahasiswa_id', '=', 'mps.mahasiswa_id');
            $join->on('dokumen_skpi.program_studi_id', '=', 'mps.program_studi_id');
        })
            ->join('mahasiswa', 'dokumen_skpi.mahasiswa_id', '=', 'mahasiswa.id')
            ->join('program_studi', 'dokumen_skpi.program_studi_id', '=', 'program_studi.id')
            ->join('jenjang_pendidikan', 'program_studi.jenjang_pendidikan_id', '=', 'jenjang_pendidikan.id')
            ->select([
                'dokumen_skpi.id',
                'dokumen_skpi.nomor',
                'dokumen_skpi.tanggal',
                'dokumen_skpi.file',
                'mahasiswa.nama as nama_mahasiswa',
                'mahasiswa.nim as nim_mahasiswa',
                'program_studi.nama as nama_prodi',
                'program_studi.nama_en as nama_prodi_en',
                'jenjang_pendidikan.nama as nama_jenjang',
                'jenjang_pendidikan.nama_en as nama_jenjang_en',
                'mps.tahun_masuk',
                'mps.tahun_lulus',
                'dokumen_skpi.created_at',
                'dokumen_skpi.updated_at'
            ])
            ->orderBy('dokumen_skpi.created_at', 'desc')
            ->get();

        // format date to indonesian
        foreach ($data as $key => $value) {
            $value->tanggal = date('d M Y', strtotime($value->tanggal));
            $value->dibuat_pada = $value->updated_at ? date('d M Y H:i:s', strtotime($value->updated_at)) : date('d M Y H:i:s', strtotime($value->created_at));

            $value->file_url = \App\Utils\Skpi::getAssetUrl($value->file);
        }


        return view('admin.dokumen.index', [
            'dokumen' => $data
        ]);
    }

    public function create()
    {
        $noDokumen = date('YmdH') . '001'; // temporary
        $jenjang = JenjangPendidikan::all();
        // $pengaturanHasilCapaian = Pengaturan::where('nama', 'informasi_kualifikasi_dan_hasil_capaian')->first();
        // $pengaturanHasilCapaian = isset($pengaturanHasilCapaian->nilai) ? json_decode($pengaturanHasilCapaian->nilai) : [];
        $pengaturanHasilCapaian = Skpi::getSettingByName('informasi_kualifikasi_dan_hasil_capaian');

        // get mhs, prodi, jenjang from query string
        $mhsId = request()->get('mhs');
        $prodiId = request()->get('prodi');
        $jenjangId = request()->get('jenjang');
        $ref = request()->get('ref');
        // dd($mhsId);

        // get $selectedJenjangId, $selectedProdiId, $selectedMahasiswaId
        $selectedJenjangId = $jenjangId ? $jenjangId : old('jenjang_id');
        $selectedProdiId = $prodiId ? $prodiId : old('program_studi_id');
        $selectedMahasiswaId = $mhsId ? [$mhsId] : old('mahasiswa_ids');

        return view('admin.dokumen.create', [
            'noDokumen' => $noDokumen,
            'jenjang' => $jenjang,
            'pengaturanHasilCapaian' => $pengaturanHasilCapaian,
            'mhsId' => $mhsId,
            'selectedJenjangId' => $selectedJenjangId,
            'selectedProdiId' => $selectedProdiId,
            'selectedMahasiswaId' => $selectedMahasiswaId,
        ]);
    }

    public function store(Request $request)
    {
        // validate request
        $request->validate([
            'dokumen_tanggal' => 'required',
            'jenjang_id' => [
                'required',
                function ($attribute, $value, $fail) {
                    $jenjang = JenjangPendidikan::find($value);
                    if (!$jenjang) {
                        $fail('Jenjang pendidikan tidak ditemukan.');
                    }
                }
            ],
            'program_studi_id' => [
                'required',
                function ($attribute, $value, $fail) {
                    $programStudi = ProgramStudi::find($value);
                    if (!$programStudi) {
                        $fail('Program studi tidak ditemukan.');
                    }
                }
            ],
            'mahasiswa_ids' => [
                'required',
                'array',
                function ($attribute, $value, $fail) {
                    foreach ($value as $mahasiswaId) {
                        $mahasiswa = Mahasiswa::find($mahasiswaId);
                        if (!$mahasiswa) {
                            $fail('Mahasiswa tidak ditemukan.');
                        }
                    }
                }
            ],
        ], [
            'dokumen_tanggal.required' => 'Tanggal dokumen harus diisi.',
            'jenjang_id.required' => 'Jenjang pendidikan harus dipilih.',
            'program_studi_id.required' => 'Program studi harus dipilih.',
            'mahasiswa_ids.required' => 'Mahasiswa harus dipilih.',
            'mahasiswa_ids.array' => 'Mahasiswa harus berupa array.',
        ]);

        DB::beginTransaction();

        try {

            // kode: yyyymmdd
            // nomor: 001 (increment per hari)
            $kode = date('Ymd');
            // $nomor = DokumenSkpi::where('nomor', 'like', $kode . '%')->count() + 1;
            // $nomor = str_pad($nomor, 3, '0', STR_PAD_LEFT);
            // $dokumenNomor = $kode . $nomor;

            $jenjangId = $request->jenjang_id;
            $programStudiId = $request->program_studi_id;
            $hasilCapaian = $request->pengaturan_hasil_capaian_data;

            if (!$hasilCapaian) {
                // $pengaturanHasilCapaian = Pengaturan::where('nama', 'informasi_kualifikasi_dan_hasil_capaian')->first();
                // $hasilCapaian = isset($pengaturanHasilCapaian->nilai) ? json_decode($pengaturanHasilCapaian->nilai) : [];
                $hasilCapaian = Skpi::getSettingByName('informasi_kualifikasi_dan_hasil_capaian');
            }
            // dd($hasilCapaian);

            $mahasiswaIds = $request->mahasiswa_ids;
            // dd($mahasiswaIds);

            $dokumenSkpiIds = [];


            // create dokumen skpi data
            foreach ($mahasiswaIds as $mahasiswaId) {
                // $dokumenSkpi = new DokumenSkpi();
                // $dokumenSkpi->mahasiswa_id = $mahasiswaId;
                // $dokumenSkpi->program_studi_id = $programStudiId;
                // $dokumenSkpi->nomor = $dokumenNomor;
                // $dokumenSkpi->tanggal = $request->dokumen_tanggal;
                // // $dokumenSkpi->dibuat_oleh = auth()->user()->id;
                // $dokumenSkpi->file = '-';
                // $dokumenSkpi->save();

                // generate unique nomor dokumen
                // kode = 20210301
                // nomor = 202103010001
                $kode = date('Ymd'); // 20210301
                $nomor = '0001';
                $lastDokumenSkpi = DokumenSkpi::where('nomor', 'like', "{$kode}%")->orderBy('nomor', 'desc')->first();
                if ($lastDokumenSkpi) {
                    // get 4 last digit
                    $lastNomor = substr($lastDokumenSkpi->nomor, -4);
                    $nomor = str_pad($lastNomor + 1, 4, '0', STR_PAD_LEFT);
                }
                $dokumenNomor = $kode . $nomor;

                // is already have skpi
                $isAlreadyHaveSkpi = DokumenSkpi::where('mahasiswa_id', $mahasiswaId)
                    ->where('program_studi_id', $programStudiId);
                if ($isAlreadyHaveSkpi->count() > 0) {
                    $dokumenSkpi = $isAlreadyHaveSkpi->first();
                    $dokumenSkpiId = $dokumenSkpi->id;

                    // delete old file
                    $uploadPath = storage_path('app/public/dokumen_skpi');
                    if (file_exists($uploadPath . '/' . $dokumenSkpi->file)) {
                        unlink($uploadPath . '/' . $dokumenSkpi->file);
                    }

                    $dokumenSkpi->nomor = $dokumenNomor;
                    $dokumenSkpi->tanggal = $request->dokumen_tanggal;
                    $dokumenSkpi->file = 'proses';
                    $dokumenSkpi->save();
                } else {
                    $dokumenSkpi = DokumenSkpi::create([
                        'mahasiswa_id' => $mahasiswaId,
                        'program_studi_id' => $programStudiId,
                        'nomor' => $dokumenNomor,
                        'tanggal' => $request->dokumen_tanggal,
                        'file' => 'proses'
                    ]);
                    $dokumenSkpiId = $dokumenSkpi->id;
                }

                // cek apakah ada data pengajuan?
                $pengajuanSkpi = PengajuanSkpi::where('mahasiswa_id', $mahasiswaId)
                    ->where('program_studi_id', $programStudiId)
                    // ->where('status', '!=', 'selesai')
                    ->first();

                if ($pengajuanSkpi) {
                    $pengajuanSkpi->status = 'siap diambil';
                    $pengajuanSkpi->save();
                } else {
                    $pengajuanSkpi = PengajuanSkpi::create([
                        'mahasiswa_id' => $mahasiswaId,
                        'program_studi_id' => $programStudiId,
                        'status' => 'siap diambil',
                        'kode' => \Str::random(10),
                    ]);
                }



                // generate file
                // $this->__generateFile($dokumenSkpiId, $hasilCapaian);

                $dokumenSkpiIds[] = $dokumenSkpiId;
            }
            DB::commit();

            // run job
            GenerateSkpiFileJob::dispatch($dokumenSkpiIds, $hasilCapaian);

            return redirect()->route('admin.dokumen.index')->with('success', 'Dokumen SKPI berhasil ditambahkan.');
        } catch (\Exception $e) {
            DB::rollback();

            throw $e;

            return redirect()->route('admin.dokumen.index')->with('error', 'Dokumen SKPI gagal ditambahkan.');
        }
    }

    public function show($id)
    {
        return view('admin.dokumen.show');
    }

    public function edit($id)
    {
        return view('admin.dokumen.edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        // delete dokumen skpi
        $dokumenSkpi = DokumenSkpi::find($id);
        $dokumenSkpi->delete();

        // delete file
        $uploadPath = storage_path('app/public/dokumen_skpi');
        if (file_exists($uploadPath . '/' . $dokumenSkpi->file)) {
            unlink($uploadPath . '/' . $dokumenSkpi->file);
        }

        return redirect()->route('admin.dokumen.index')->with('success', 'Dokumen SKPI berhasil dihapus.');
    }

    // private

    /**
     * Generate file dokumen SKPI (pdf)
     */
    private function __generateFile($dokumenSkpiId, $hasilCapaian)
    {
        $dokumenSkpi = DokumenSkpi::find($dokumenSkpiId);
        $mahasiswa = Mahasiswa::find($dokumenSkpi->mahasiswa_id);
        $programStudi = ProgramStudi::find($dokumenSkpi->program_studi_id);
        $prestasi = Prestasi::where('mahasiswa_id', $mahasiswa->id)->get();

        // remove old file, if exists
        $uploadPath = storage_path('app/public/dokumen_skpi');
        if (file_exists($uploadPath . '/' . $dokumenSkpi->file)) {
            unlink($uploadPath . '/' . $dokumenSkpi->file);
        }

        // $pdfPreview = view('admin.dokumen.pdf', [
        //     'dokumenSkpi' => $dokumenSkpi,
        //     'mahasiswa' => $mahasiswa,
        //     'programStudi' => $programStudi,
        //     'hasilCapaian' => $hasilCapaian,
        //     'prestasi' => $prestasi
        // ])->render();

        // echo ($pdfPreview); die;

        $pdf = Pdf::loadView('admin.dokumen.pdf', [
            'dokumenSkpi' => $dokumenSkpi,
            'mahasiswa' => $mahasiswa,
            'programStudi' => $programStudi,
            'hasilCapaian' => $hasilCapaian,
            'prestasi' => $prestasi
        ])->setPaper('a4', 'portrait');

        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        $pdf->save($uploadPath . '/' . $dokumenSkpi->nomor . '.pdf');

        $dokumenSkpi->file = $dokumenSkpi->nomor . '.pdf';
        $dokumenSkpi->save();
    }
}
