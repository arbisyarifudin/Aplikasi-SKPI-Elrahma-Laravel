<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DokumenSkpi;
use Illuminate\Http\Request;

class DokumenController extends Controller
{
    public function index()
    {
        $data = DokumenSkpi::join('mahasiswa', 'dokumen_skpi.mahasiswa_id', '=', 'mahasiswa.id')
            ->join('program_studi', 'dokumen_skpi.program_studi_id', '=', 'program_studi.id')
            ->join('jenjang_pendidikan', 'program_studi.jenjang_pendidikan_id', '=', 'jenjang_pendidikan.id')
            ->join('mahasiswa_program_studi', 'mahasiswa.id', '=', 'mahasiswa_program_studi.mahasiswa_id')
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
                'mahasiswa_program_studi.tahun_masuk',
                'mahasiswa_program_studi.tahun_lulus',
                'dokumen_skpi.created_at',
            ])
            ->get();

        // format date to indonesian
        foreach ($data as $key => $value) {
            $value->tanggal = date('d M Y', strtotime($value->tanggal));
            $value->dibuat_pada = date('d M Y H:i:s', strtotime($value->created_at));
        }

        return view('admin.dokumen.index', [
            'dokumen' => $data
        ]);
    }

    public function create()
    {
        $noDokumen = date('YmdHis'); // temporary

        return view('admin.dokumen.create', [
            'noDokumen' => $noDokumen,
        ]);
    }

    public function store(Request $request)
    {
        //
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
        //
    }
}
