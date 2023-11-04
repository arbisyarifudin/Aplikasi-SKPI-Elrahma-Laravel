<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
                'ps.nama as prodi_nama',
                'ps.nama_en as prodi_nama_en',
                'ps.akreditasi'
            ]
        )->join('mahasiswa_program_studi as mps', 'mps.mahasiswa_id', '=', 'mahasiswa.id')
            ->join('program_studi as ps', 'ps.id', '=', 'mps.program_studi_id')
            ->get();

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
