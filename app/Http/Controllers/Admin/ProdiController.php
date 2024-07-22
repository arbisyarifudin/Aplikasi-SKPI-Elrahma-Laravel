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
            'prodi_akreditasi' => 'required',
            'prodi_gelar' => 'required',
            'prodi_gelar_en' => 'required'
        ], [
            'jenjang_pendidikan_id.required' => 'Jenjang pendidikan harus dipilih',
            'prodi_nama.required' => 'Nama program studi harus diisi',
            'prodi_nama.unique' => 'Nama program studi sudah terdaftar',
            'prodi_nama_en.required' => 'Nama program studi (English) harus diisi',
            'prodi_nama_en.unique' => 'Nama program studi (English) sudah terdaftar',
            'prodi_akreditasi.required' => 'Akreditasi harus diisi',
            'prodi_gelar.required' => 'Gelar harus diisi',
            'prodi_gelar_en.required' => 'Gelar (English) harus diisi'
        ]);

        // insert data
        $newProdi = ProgramStudi::create([
            'jenjang_pendidikan_id' => $request->jenjang_pendidikan_id,
            'nama' => $request->prodi_nama,
            'nama_en' => $request->prodi_nama_en,
            'akreditasi' => $request->prodi_akreditasi,
            'gelar' => $request->prodi_gelar,
            'gelar_en' => $request->prodi_gelar_en
        ]);

        // fill cpl from pengaturan
        $pengaturan = \App\Models\Pengaturan::where('nama', 'informasi_kualifikasi_dan_hasil_capaian')->first();
        $newProdi->kualifikasi_cpl = $pengaturan ? $pengaturan->nilai : json_encode([]);
        $newProdi->save();

        // redirect back
        return redirect()->route('admin.prodi.index')->with('success', 'Program studi berhasil ditambahkan');
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
    }

    public function update(Request $request, $id)
    {
        // validate request
        $request->validate([
            'jenjang_pendidikan_id' => 'required|exists:jenjang_pendidikan,id',
            'prodi_nama' => 'required|unique:program_studi,nama,' . $id,
            'prodi_nama_en' => 'required|unique:program_studi,nama_en,' . $id,
            'prodi_akreditasi' => 'required',
            'prodi_gelar' => 'required',
            'prodi_gelar_en' => 'required'
        ], [
            'jenjang_pendidikan_id.required' => 'Jenjang pendidikan harus dipilih',
            'prodi_nama.required' => 'Nama program studi harus diisi',
            'prodi_nama.unique' => 'Nama program studi sudah terdaftar',
            'prodi_nama_en.required' => 'Nama program studi (English) harus diisi',
            'prodi_nama_en.unique' => 'Nama program studi (English) sudah terdaftar',
            'prodi_akreditasi.required' => 'Akreditasi harus diisi',
            'prodi_gelar.required' => 'Gelar harus diisi',
            'prodi_gelar_en.required' => 'Gelar (English) harus diisi'
        ]);

        // update data
        ProgramStudi::where('id', $id)->update([
            'jenjang_pendidikan_id' => $request->jenjang_pendidikan_id,
            'nama' => $request->prodi_nama,
            'nama_en' => $request->prodi_nama_en,
            'akreditasi' => $request->prodi_akreditasi,
            'gelar' => $request->prodi_gelar,
            'gelar_en' => $request->prodi_gelar_en
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

    /* CPL (capaian pembelajaran) */

    public function editCpl($id)
    {
        // get detail data
        $detailData = ProgramStudi::findOrFail($id);

        return view('admin.prodi.cpl', [
            'detailData' => $detailData
        ]);
    }

    public function updateCpl(Request $request, $id)
    {
        // dd($request->cpl);

        // update data
        ProgramStudi::where('id', $id)->update([
            'kualifikasi_cpl' => $request->cpl
        ]);

        // redirect back
        return redirect()->back()->with('success', 'CPL berhasil diperbarui');
    }
}
