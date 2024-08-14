<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\DokumenSkpi;
use App\Models\MahasiswaProgramStudi;
use App\Models\PengajuanSkpi;
use App\Models\Prestasi;
use Illuminate\Http\Request;

class DokumenController extends Controller
{
    public function index(Request $request)
    {
        $authUser = auth()->user();
        $mahasiswa = $authUser->mahasiswa;

        // $query = DokumenSkpi::join('mahasiswa_program_studi as mps', function ($join) {
        //     $join->on('dokumen_skpi.mahasiswa_id', '=', 'mps.mahasiswa_id');
        //     $join->on('dokumen_skpi.program_studi_id', '=', 'mps.program_studi_id');
        // })
        //     ->join('mahasiswa', 'dokumen_skpi.mahasiswa_id', '=', 'mahasiswa.id')
        //     ->join('program_studi', 'dokumen_skpi.program_studi_id', '=', 'program_studi.id')
        //     ->join('jenjang_pendidikan', 'program_studi.jenjang_pendidikan_id', '=', 'jenjang_pendidikan.id')
        //     ->select([
        //         'dokumen_skpi.id',
        //         'dokumen_skpi.nomor',
        //         'dokumen_skpi.tanggal',
        //         'dokumen_skpi.file',
        //         'mahasiswa.nama as nama_mahasiswa',
        //         'mahasiswa.nim as nim_mahasiswa',
        //         'program_studi.nama as nama_prodi',
        //         'program_studi.nama_en as nama_prodi_en',
        //         'jenjang_pendidikan.nama as nama_jenjang',
        //         'jenjang_pendidikan.nama_en as nama_jenjang_en',
        //         'mps.tahun_masuk',
        //         'mps.tahun_lulus',
        //         'dokumen_skpi.created_at',
        //         'dokumen_skpi.updated_at'
        //     ])
        //     ->where('dokumen_skpi.mahasiswa_id', $mahasiswa->id)
        //     ->orderBy('dokumen_skpi.created_at', 'desc');

        $query = MahasiswaProgramStudi::leftJoin('dokumen_skpi', function ($join) {
            $join->on('mahasiswa_program_studi.mahasiswa_id', '=', 'dokumen_skpi.mahasiswa_id');
            $join->on('mahasiswa_program_studi.program_studi_id', '=', 'dokumen_skpi.program_studi_id');
        })
            ->join('mahasiswa', 'mahasiswa_program_studi.mahasiswa_id', '=', 'mahasiswa.id')
            ->join('program_studi', 'mahasiswa_program_studi.program_studi_id', '=', 'program_studi.id')
            ->join('jenjang_pendidikan', 'program_studi.jenjang_pendidikan_id', '=', 'jenjang_pendidikan.id')

            // join with pengajuan_skpi where mahasiswa_id = mahasiswa.id and program_studi_id = program_studi.id
            ->leftJoin('pengajuan_skpi', function ($join) {
                $join->on('mahasiswa.id', '=', 'pengajuan_skpi.mahasiswa_id');
                $join->on('program_studi.id', '=', 'pengajuan_skpi.program_studi_id');
            })

            ->select([
                'mahasiswa_program_studi.id as mps_id',
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
                'mahasiswa_program_studi.tahun_masuk',
                'mahasiswa_program_studi.tahun_lulus',
                'dokumen_skpi.created_at',
                'dokumen_skpi.updated_at',

                'pengajuan_skpi.id as pengajuan_id',
                'pengajuan_skpi.status as pengajuan_status',
            ])
            ->where('mahasiswa_program_studi.mahasiswa_id', $mahasiswa->id)
            ->orderBy('mahasiswa_program_studi.created_at', 'desc');

        $prodiId = $request->query('prodi_id');

        if ($prodiId) {
            $query->where('dokumen_skpi.program_studi_id', $prodiId);
        }

        $data = $query->get();

        // format date to indonesian
        foreach ($data as $key => $value) {
            $value->nomor = $value->nomor ? $value->nomor : '-';
            $value->tanggal = $value->tanggal ? date('d M Y', strtotime($value->tanggal)) : null;
            $value->dibuat_pada = $value->updated_at ? date('d M Y H:i:s', strtotime($value->updated_at)) : ($value->created_at ? date('d M Y H:i:s', strtotime($value->created_at)) : null);

            $value->file_url = $value->file ? \App\Utils\Skpi::getAssetUrl($value->file) : null;
        }

        return view('mahasiswa.dokumen.index', [
            'dokumen' => $data,
            'prodiId' => $prodiId
        ]);
    }

    public function create()
    {
        return view('mahasiswa.prestasi.create');
    }

    public function request(Request $request)
    {
        $request->validate([
            'mahasiswa_prodi_id' => 'required|exists:mahasiswa_program_studi,id',
        ], [
            'mahasiswa_prodi_id.required' => 'Program studi harus diisi',
            'mahasiswa_prodi_id.exists' => 'Program studi tidak ditemukan',
        ]);

        $mahasiswaProdiDetail = MahasiswaProgramStudi::find($request->mahasiswa_prodi_id);

        // dd($mahasiswaProdiDetail);

        if (!$mahasiswaProdiDetail) {
            return redirect()->back()->with('error', 'Program studi tidak ditemukan');
        }

        // is there any pengajuan skpi that is not finished?
        $pengajuanSkpi = PengajuanSkpi::where('mahasiswa_id', $mahasiswaProdiDetail->mahasiswa_id)
            ->where('program_studi_id', $mahasiswaProdiDetail->program_studi_id)
            // ->where('status', '!=', 'selesai')
            ->first();

        if ($pengajuanSkpi) {
            return redirect()->route('mahasiswa.pengajuan.index')->with('error', 'Anda sudah mengirim pengajuan SKPI');
        }

        // $code = \Str::random(10);
        $code = date('YmdHi');
        $counter = 1;
        while (PengajuanSkpi::where('kode', $code)->first()) {
            $code = date('YmdHi') . $counter;
            $counter++;
        }

        $pengajuanSkpi = PengajuanSkpi::create([
            'mahasiswa_id' => $mahasiswaProdiDetail->mahasiswa_id,
            'program_studi_id' => $mahasiswaProdiDetail->program_studi_id,
            'kode' => $code,
            'status' => 'pending'
        ]);

        return redirect()->route('mahasiswa.pengajuan.index')->with('success', 'Pengajuan SKPI berhasil dikirim');
    }
}
