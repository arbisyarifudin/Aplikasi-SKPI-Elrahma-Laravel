<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DokumenSkpi;
use App\Models\JenjangPendidikan;
use App\Models\Mahasiswa;
use App\Models\Prestasi;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index(Request $request)
    {
        // filter params
        $thn_masuk = $request->input('thn_masuk', date('Y') - 4);
        $thn_lulus = $request->input('thn_lulus', date('Y'));
        $jenjang = $request->input('jenjang', null);

        $query = Mahasiswa::select(
            [
                'mahasiswa.*',
                'mps.tahun_masuk',
                'mps.tahun_lulus',
                'ps.id as prodi_id',
                'ps.nama as prodi_nama',
                'ps.nama_en as prodi_nama_en',
                'ps.akreditasi',
                'jp.id as jenjang_id',
                'jp.nama as jenjang_nama',
                'jp.nama_en as jenjang_nama_en',
            ]
        )->join('mahasiswa_program_studi as mps', 'mps.mahasiswa_id', '=', 'mahasiswa.id')
            ->join('program_studi as ps', 'ps.id', '=', 'mps.program_studi_id')
            ->join('jenjang_pendidikan as jp', 'jp.id', '=', 'ps.jenjang_pendidikan_id');


        // filter by jenjang
        if ($jenjang) {
            $query->where('jp.id', $jenjang);
        }

        // filter by tahun masuk
        if ($thn_masuk) {
            $query->where('mps.tahun_masuk', '>=', $thn_masuk);
        }

        // filter by tahun lulus
        if ($thn_lulus) {
            $query->where('mps.tahun_lulus', '<=', $thn_lulus);
        }

        $data = $query->orderBy('mahasiswa.created_at', 'desc')
            ->orderBy('tahun_lulus', 'desc')
            ->get();


        // check if mahasiswa already has dokumen_skpi
        foreach ($data as $key => $value) {
            $value->has_dokumen_skpi = false;
            $value->dokumen_skpi_file = null;

            $documenSkpiExists = DokumenSkpi::where('mahasiswa_id', $value->id)
                ->where('program_studi_id', $value->prodi_id)
                ->first();

            if ($documenSkpiExists) {
                $value->has_dokumen_skpi = true;
                $value->dokumen_skpi_file = $documenSkpiExists->file;
            }

            // get is_baru status
            $value->is_baru = $value->created_at->diffInDays() < 1;
        }

        // dd($data);

        $jenjang_list = JenjangPendidikan::all();
        $tahun_masuk_list = range(2015, date('Y'));
        $tahun_lulus_list = range(2015, date('Y'));

        return view('admin.mahasiswa.index', [
            'mahasiswa' => $data,
            'jenjang_list' => $jenjang_list,
            'tahun_masuk_list' => $tahun_masuk_list,
            'tahun_lulus_list' => $tahun_lulus_list,
            'filter' => [
                'thn_masuk' => $thn_masuk,
                'thn_lulus' => $thn_lulus,
                'jenjang' => $jenjang,
            ],
        ]);
    }

    public function create()
    {
        return view('admin.mahasiswa.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $data = Mahasiswa::findOrFail($id);
        if ($data) {
            // $data->prestasis;
            // $data->prodis;
            $data = Mahasiswa::with([
                'prestasis',
                'programStudis',
                'programStudis.programStudi',
                'programStudis.programStudi.jenjangPendidikan',
            ])->where('id', $id)->first();

            // dd($data);
        }
        return view('admin.mahasiswa.show', [
            'mahasiswa' => $data,
        ]);
    }

    public function edit($id)
    {
        return view('admin.mahasiswa.edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    /* MAHASISWA PRESTASI */
    public function prestasiCreate($mahasiswaId)
    {
        // find mahasiswa
        $mahasiswa = Mahasiswa::findOrFail($mahasiswaId);

        return view('admin.mahasiswa.prestasi.create', [
            'mahasiswa' => $mahasiswa,
        ]);
    }

    public function prestasiStore(Request $request, $mahasiswaId)
    {
        // find mahasiswa
        $mahasiswa = Mahasiswa::findOrFail($mahasiswaId);

        // validate request
        $request->validate([
            'prestasi_nama' => 'required',
            'prestasi_tingkat' => 'required',
            'prestasi_tahun' => 'required',
            'prestasi_penyelenggara' => 'required',
            'prestasi_tempat' => 'required',
            'prestasi_pencapaian' => 'required',
            'prestasi_sertifikat_file' => 'required_if:tipe_sertifikat,file|nullable|file|mimes:pdf,jpg,jpeg,png|max:1024',
            'prestasi_sertifikat_url' => 'required_if:tipe_sertifikat,url|nullable|url'
        ], [
            'prestasi_nama.required' => 'Nama prestasi harus diisi',
            'prestasi_tingkat.required' => 'Tingkat prestasi harus diisi',
            'prestasi_tahun.required' => 'Tahun prestasi harus diisi',
            'prestasi_penyelenggara.required' => 'Penyelenggara kegiatan harus diisi',
            'prestasi_tempat.required' => 'Tempat kegiatan harus diisi',
            'prestasi_pencapaian.required' => 'Pencapaian harus diisi',
            'prestasi_sertifikat_file.required_if' => 'File sertifikat prestasi harus diisi jika opsi \'file\' dipilih',
            'prestasi_sertifikat_file.file' => 'File sertifikat prestasi tidak valid',
            'prestasi_sertifikat_file.mimes' => 'File sertifikat prestasi harus berupa file PDF, JPG, JPEG, PNG',
            'prestasi_sertifikat_file.max' => 'File sertifikat prestasi maksimal 1 MB (1024 KB)',
            'prestasi_sertifikat_url.required_if' => 'URL sertifikat harus diisi jika \'opsi\' URL dipilih',
            'prestasi_sertifikat_url.url' => 'URL sertifikat tidak valid'
        ]);

        $prestasi = new Prestasi();
        $prestasi->mahasiswa_id = $mahasiswa->id;
        $prestasi->nama = $request->prestasi_nama;
        $prestasi->tingkat = $request->prestasi_tingkat;
        $prestasi->tahun = $request->prestasi_tahun;
        $prestasi->penyelenggara = $request->prestasi_penyelenggara;
        $prestasi->tempat = $request->prestasi_tempat;
        $prestasi->pencapaian = $request->prestasi_pencapaian;
        $prestasi->file_sertifikat = null;

        if ($request->hasFile('prestasi_sertifikat_file')) {
            $file = $request->file('prestasi_sertifikat_file');
            $fileName = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
            $filePath = $file->storeAs('prestasi', $fileName, 'public');
            $prestasi->file_sertifikat = $filePath;
        } else {
            $prestasi->file_sertifikat = $request->prestasi_sertifikat_url;
        }

        $prestasi->save();

        return redirect()->route('admin.mahasiswa.show', ['id' => $mahasiswaId])->with('success', 'Prestasi berhasil ditambahkan');
    }

    public function prestasiEdit($mahasiswaId, $prestasiId)
    {
        // find mahasiswa
        $mahasiswa = Mahasiswa::findOrFail($mahasiswaId);

        // find prestasi
        $prestasi = $mahasiswa->prestasis()->findOrFail($prestasiId);

        // define sertifikat option, file or url
        $tipe_sertifikat = $prestasi->file_sertifikat && filter_var($prestasi->file_sertifikat, FILTER_VALIDATE_URL) ? 'url' : 'file';

        return view('admin.mahasiswa.prestasi.edit', [
            'mahasiswa' => $mahasiswa,
            'prestasi' => $prestasi,
            'tipe_sertifikat' => $tipe_sertifikat,
        ]);
    }

    public function prestasiUpdate(Request $request, $mahasiswaId, $prestasiId)
    {
        // find mahasiswa
        $mahasiswa = Mahasiswa::findOrFail($mahasiswaId);

        // find prestasi
        $prestasi = Prestasi::findOrFail($prestasiId);

        // validate request
        $request->validate([
            'prestasi_nama' => 'required',
            'prestasi_tingkat' => 'required',
            'prestasi_tahun' => 'required',
            'prestasi_penyelenggara' => 'required',
            'prestasi_tempat' => 'required',
            'prestasi_pencapaian' => 'required',
            'prestasi_sertifikat_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:1024',
            'prestasi_sertifikat_url' => 'nullable|url'
        ], [
            'prestasi_nama.required' => 'Nama prestasi harus diisi',
            'prestasi_tingkat.required' => 'Tingkat prestasi harus diisi',
            'prestasi_tahun.required' => 'Tahun prestasi harus diisi',
            'prestasi_penyelenggara.required' => 'Penyelenggara kegiatan harus diisi',
            'prestasi_tempat.required' => 'Tempat kegiatan harus diisi',
            'prestasi_pencapaian.required' => 'Pencapaian harus diisi',
            'prestasi_sertifikat_file.required_if' => 'File sertifikat prestasi harus diisi jika opsi \'file\' dipilih',
            'prestasi_sertifikat_file.file' => 'File sertifikat prestasi tidak valid',
            'prestasi_sertifikat_file.mimes' => 'File sertifikat prestasi harus berupa file PDF, JPG, JPEG, PNG',
            'prestasi_sertifikat_file.max' => 'File sertifikat prestasi maksimal 1 MB (1024 KB)',
            'prestasi_sertifikat_url.required_if' => 'URL sertifikat harus diisi jika opsi URL dipilih',
            'prestasi_sertifikat_url.url' => 'URL sertifikat tidak valid'
        ]);

        $prestasi->nama = $request->prestasi_nama;
        $prestasi->tingkat = $request->prestasi_tingkat;
        $prestasi->tahun = $request->prestasi_tahun;
        $prestasi->penyelenggara = $request->prestasi_penyelenggara;
        $prestasi->tempat = $request->prestasi_tempat;
        $prestasi->pencapaian = $request->prestasi_pencapaian;

        if ($request->hasFile('prestasi_sertifikat_file')) {
            $oldFile = $prestasi->file_sertifikat;
            if ($oldFile && $oldFile != '') {
                if (\Storage::exists('public/' . $oldFile)) {
                    \Storage::delete('public/' . $oldFile);
                }
            }

            $file = $request->file('prestasi_sertifikat_file');
            $fileName = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
            $filePath = $file->storeAs('prestasi', $fileName, 'public');
            $prestasi->file_sertifikat = $filePath;
        } elseif ($request->prestasi_sertifikat_url) {
            $prestasi->file_sertifikat = $request->prestasi_sertifikat_url;
        }

        $prestasi->save();

        return redirect()->route('admin.mahasiswa.show', ['id' => $mahasiswaId])->with('success', 'Prestasi berhasil diperbarui');
    }

    public function prestasiUpdateStatus (Request $request, $mahasiswaId, $prestasiId) {
        // find mahasiswa
        $mahasiswa = Mahasiswa::findOrFail($mahasiswaId);

        // find prestasi
        $prestasi = Prestasi::findOrFail($prestasiId);
        // dd($mahasiswaId, $prestasiId, $request->all());

        // update status
        if ($request->filled('status')) {
            $prestasi->status = $request->status;
            $prestasi->save();
        }

        return redirect()->route('admin.mahasiswa.show', ['id' => $mahasiswaId])->with('success', 'Status berhasil diperbarui');
    }

}
