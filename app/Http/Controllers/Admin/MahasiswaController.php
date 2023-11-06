<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DokumenSkpi;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $data = Mahasiswa::select(
            [
                'mahasiswa.*',
                'mps.tahun_masuk',
                'mps.tahun_lulus',
                'ps.id as prodi_id',
                'ps.nama as prodi_nama',
                'ps.nama_en as prodi_nama_en',
                'ps.akreditasi',
                'jp.nama as jenjang_nama',
                'jp.nama_en as jenjang_nama_en',
            ]
        )->join('mahasiswa_program_studi as mps', 'mps.mahasiswa_id', '=', 'mahasiswa.id')
            ->join('program_studi as ps', 'ps.id', '=', 'mps.program_studi_id')
            ->join('jenjang_pendidikan as jp', 'jp.id', '=', 'ps.jenjang_pendidikan_id')
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
        }

        // dd($data);

        return view('admin.mahasiswa.index', [
            'mahasiswa' => $data
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
        return view('admin.mahasiswa.show');
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
}
