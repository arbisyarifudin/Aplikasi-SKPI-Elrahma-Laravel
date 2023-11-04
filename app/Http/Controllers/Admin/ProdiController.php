<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenjangPendidikan;
use App\Models\MahasiswaProgramStudi;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function index()
    {
        $data = ProgramStudi::join('jenjang_pendidikan', 'program_studi.jenjang_pendidikan_id', '=', 'jenjang_pendidikan.id')
            ->select('program_studi.*', 'jenjang_pendidikan.nama as jenjang_pendidikan_nama')
            ->get();

        return view('admin.prodi.index', [
            'prodi' => $data,
        ]);
    }

    public function create()
    {
        // get jenjang pendidikan data
        $jenjangPendidikan = JenjangPendidikan::all();

        return view('admin.prodi.create', [
            'jenjangPendidikan' => $jenjangPendidikan
        ]);
    }

    public function store(Request $request)
    {
        // validate request
        $request->validate([
            'jenjang_pendidikan_id' => 'required|exists:jenjang_pendidikan,id',
            'prodi_nama' => 'required|unique:program_studi,nama',
            'prodi_nama_en' => 'required|unique:program_studi,nama_en',
            'prodi_akreditasi' => 'required'
        ], [
            'jenjang_pendidikan_id.required' => 'Jenjang pendidikan harus dipilih',
            'prodi_nama.required' => 'Nama program studi harus diisi',
            'prodi_nama.unique' => 'Nama program studi sudah terdaftar',
            'prodi_nama_en.required' => 'Nama program studi (English) harus diisi',
            'prodi_nama_en.unique' => 'Nama program studi (English) sudah terdaftar',
            'prodi_akreditasi.required' => 'Akreditasi harus diisi'
        ]);

        // insert data
        ProgramStudi::create([
            'jenjang_pendidikan_id' => $request->jenjang_pendidikan_id,
            'nama' => $request->prodi_nama,
            'nama_en' => $request->prodi_nama_en,
            'akreditasi' => $request->prodi_akreditasi
        ]);

        // redirect back
        return redirect()->back()->with('success', 'Program studi berhasil ditambahkan');
    }

    public function show($id)
    {
        return view('admin.prodi.show');
    }

    public function edit($id)
    {
        // get jenjang pendidikan data
        $jenjangPendidikan = JenjangPendidikan::all();

        // get detail data
        $detailData = ProgramStudi::findOrFail($id);

        return view('admin.prodi.edit', [
            'jenjangPendidikan' => $jenjangPendidikan,
            'detailData' => $detailData
        ]);

        return view('admin.prodi.edit');
    }

    public function update(Request $request, $id)
    {
        // validate request
        $request->validate([
            'jenjang_pendidikan_id' => 'required|exists:jenjang_pendidikan,id',
            'prodi_nama' => 'required|unique:program_studi,nama,' . $id,
            'prodi_nama_en' => 'required|unique:program_studi,nama_en,' . $id,
            'prodi_akreditasi' => 'required'
        ], [
            'jenjang_pendidikan_id.required' => 'Jenjang pendidikan harus dipilih',
            'prodi_nama.required' => 'Nama program studi harus diisi',
            'prodi_nama.unique' => 'Nama program studi sudah terdaftar',
            'prodi_nama_en.required' => 'Nama program studi (English) harus diisi',
            'prodi_nama_en.unique' => 'Nama program studi (English) sudah terdaftar',
            'prodi_akreditasi.required' => 'Akreditasi harus diisi'
        ]);

        // update data
        ProgramStudi::where('id', $id)->update([
            'jenjang_pendidikan_id' => $request->jenjang_pendidikan_id,
            'nama' => $request->prodi_nama,
            'nama_en' => $request->prodi_nama_en,
            'akreditasi' => $request->prodi_akreditasi
        ]);

        // redirect back
        return redirect()->route('admin.prodi.index')->with('success', 'Program studi berhasil diperbarui');
    }

    public function destroy($id)
    {
        // check if program_studi_id id doesnt exist in mahasiswa_program_studi table
        if (MahasiswaProgramStudi::where('program_studi_id', $id)->exists()) {
            return redirect()->back()->with('error', 'Program studi sudah tertaut dengan salahsatu data Mahasiswa');
        }

        // delete data
        ProgramStudi::destroy($id);

        // redirect back
        return redirect()->back()->with('success', 'Program studi berhasil dihapus');
    }
}
