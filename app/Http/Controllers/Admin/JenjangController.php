<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenjangPendidikan;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;

class JenjangController extends Controller
{
    public function index()
    {
        $data = JenjangPendidikan::all();

        return view('admin.jenjang.index', [
            'jenjang' => $data
        ]);
    }

    public function create()
    {
        return view('admin.jenjang.create');
    }

    public function store(Request $request)
    {
        // validate request
        $request->validate([
            'nama' => 'required|min:3|unique:jenjang_pendidikan,nama',
            'nama_en' => 'required|min:3|unique:jenjang_pendidikan,nama_en',
            'singkatan' => 'required',
            'level_kkni' => 'nullable|numeric',
            'syarat_masuk' => 'nullable',
            'syarat_masuk_en' => 'nullable',
            'lama_studi_reguler' => 'nullable|numeric',
            'jenjang_lanjutan' => 'nullable',
            'jenjang_lanjutan_en' => 'nullable',
        ], [
            'nama.required' => 'Nama jenjang harus diisi',
            'nama.min' => 'Nama jenjang minimal 3 karakter',
            'nama_en.required' => 'Nama jenjang (English) harus diisi',
            'nama_en.min' => 'Nama jenjang (English) minimal 3 karakter',
            'singkatan.required' => 'Singkatan jenjang harus diisi',
            'level_kkni.numeric' => 'Level KKNI harus berupa angka',
            'lama_studi_reguler.numeric' => 'Lama studi reguler harus berupa angka',
        ]);

        // insert data
        JenjangPendidikan::create([
            'nama' => $request->nama,
            'nama_en' => $request->nama_en,
            'singkatan' => $request->singkatan,
            'level_kkni' => $request->level_kkni,
            'syarat_masuk' => $request->syarat_masuk,
            'syarat_masuk_en' => $request->syarat_masuk_en,
            'lama_studi_reguler' => $request->lama_studi_reguler,
            'jenjang_lanjutan' => $request->jenjang_lanjutan,
            'jenjang_lanjutan_en' => $request->jenjang_lanjutan_en,
        ]);

        // redirect back
        return redirect()->route('admin.jenjang.index')->with('success', 'Jenjang berhasil ditambahkan');
    }

    public function show($id)
    {
        return view('admin.jenjang.show');
    }

    public function edit($id)
    {
        // get detail data
        $detailData = JenjangPendidikan::findOrFail($id);

        return view('admin.jenjang.edit', [
            'detailData' => $detailData
        ]);
    }

    public function update(Request $request, $id)
    {
        // validate request
        $request->validate([
            'nama' => 'required|min:3',
            'nama_en' => 'required|min:3',
            'singkatan' => 'required',
            'level_kkni' => 'nullable|numeric',
            'syarat_masuk' => 'nullable',
            'syarat_masuk_en' => 'nullable',
            'lama_studi_reguler' => 'nullable|numeric',
            'jenjang_lanjutan' => 'nullable',
            'jenjang_lanjutan_en' => 'nullable',
        ], [
            'nama.required' => 'Nama jenjang harus diisi',
            'nama.min' => 'Nama jenjang minimal 3 karakter',
            'nama_en.required' => 'Nama jenjang (English) harus diisi',
            'nama_en.min' => 'Nama jenjang (English) minimal 3 karakter',
            'singkatan.required' => 'Singkatan jenjang harus diisi',
            'level_kkni.numeric' => 'Level KKNI harus berupa angka',
            'lama_studi_reguler.numeric' => 'Lama studi reguler harus berupa angka',
        ]);

        // update data
        JenjangPendidikan::where('id', $id)->update([
            'nama' => $request->nama,
            'nama_en' => $request->nama_en,
            'singkatan' => $request->singkatan,
            'level_kkni' => $request->level_kkni,
            'syarat_masuk' => $request->syarat_masuk,
            'syarat_masuk_en' => $request->syarat_masuk_en,
            'lama_studi_reguler' => $request->lama_studi_reguler,
            'jenjang_lanjutan' => $request->jenjang_lanjutan,
            'jenjang_lanjutan_en' => $request->jenjang_lanjutan_en,
        ]);

        // redirect back
        return redirect()->route('admin.jenjang.index')->with('success', 'Jenjang berhasil diubah');
    }

    public function destroy($id)
    {
        // check if jenjang id doesnt exist in program_studi table
        if (ProgramStudi::where('jenjang_pendidikan_id', $id)->exists()) {
            return redirect()->back()->with('error', 'Jenjang sudah tertaut dengan salahsatu data Progam Studi');
        }

        // delete data
        JenjangPendidikan::destroy($id);

        // redirect back
        return redirect()->back()->with('success', 'Jenjang berhasil dihapus');
    }
}
