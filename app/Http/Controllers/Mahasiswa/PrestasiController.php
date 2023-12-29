<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Prestasi;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    public function index()
    {
        $prestasi = Prestasi::where('mahasiswa_id', auth()->user()->mahasiswa->id)->get();

        // get file sertifikat url
        foreach ($prestasi as $item) {
            $item->file_sertifikat_url = $item->file_sertifikat ? \App\Utils\Skpi::getAssetUrl($item->file_sertifikat) : '';
        }

        return view('mahasiswa.prestasi.index', compact('prestasi'));
    }

    public function create()
    {
        return view('mahasiswa.prestasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'prestasi_nama' => 'required',
            'prestasi_tingkat' => 'required',
            'prestasi_tahun' => 'required',
            'prestasi_penyelenggara' => 'required',
            'prestasi_tempat' => 'required',
            'prestasi_pencapaian' => 'required',
            'prestasi_sertifikat' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10000',
        ], [
            'prestasi_nama.required' => 'Nama prestasi harus diisi',
            'prestasi_tingkat.required' => 'Tingkat prestasi harus diisi',
            'prestasi_tahun.required' => 'Tahun prestasi harus diisi',
            'prestasi_penyelenggara.required' => 'Penyelenggara kegiatan harus diisi',
            'prestasi_tempat.required' => 'Tempat kegiatan harus diisi',
            'prestasi_pencapaian.required' => 'Pencapaian harus diisi',
            'prestasi_sertifikat.required' => 'Sertifikat prestasi harus diisi',
            'prestasi_sertifikat.file' => 'Sertifikat prestasi harus berupa file',
            'prestasi_sertifikat.mimes' => 'Sertifikat prestasi harus berupa file pdf',
            'prestasi_sertifikat.max' => 'Sertifikat prestasi maksimal 10 MB',
        ]);

        $prestasi = new Prestasi();
        $prestasi->mahasiswa_id = auth()->user()->mahasiswa->id;
        $prestasi->nama = $request->prestasi_nama;
        $prestasi->tingkat = $request->prestasi_tingkat;
        $prestasi->tahun = $request->prestasi_tahun;
        $prestasi->penyelenggara = $request->prestasi_penyelenggara;
        $prestasi->tempat = $request->prestasi_tempat;
        $prestasi->pencapaian = $request->prestasi_pencapaian;
        $prestasi->file_sertifikat = null;

        if ($request->hasFile('prestasi_sertifikat')) {
            $file = $request->file('prestasi_sertifikat');
            $fileName = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
            $filePath = $file->storeAs('prestasi', $fileName, 'public');
            $prestasi->file_sertifikat = $filePath;
        }

        $prestasi->save();

        return redirect()->route('mahasiswa.prestasi.index')->with('success', 'Prestasi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $prestasi = Prestasi::findOrFail($id);
        // get file sertifikat url
        $prestasi->file_sertifikat_url = $prestasi->file_sertifikat ? \App\Utils\Skpi::getAssetUrl($prestasi->file_sertifikat) : '';

        return view('mahasiswa.prestasi.edit', compact('prestasi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'prestasi_nama' => 'required',
            'prestasi_tingkat' => 'required',
            'prestasi_tahun' => 'required',
            'prestasi_penyelenggara' => 'required',
            'prestasi_tempat' => 'required',
            'prestasi_pencapaian' => 'required',
            'prestasi_sertifikat' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10000',
        ], [
            'prestasi_nama.required' => 'Nama prestasi harus diisi',
            'prestasi_tingkat.required' => 'Tingkat prestasi harus diisi',
            'prestasi_tahun.required' => 'Tahun prestasi harus diisi',
            'prestasi_penyelenggara.required' => 'Penyelenggara kegiatan harus diisi',
            'prestasi_tempat.required' => 'Tempat kegiatan harus diisi',
            'prestasi_pencapaian.required' => 'Pencapaian harus diisi',
            'prestasi_sertifikat.required' => 'Sertifikat prestasi harus diisi',
            'prestasi_sertifikat.file' => 'Sertifikat prestasi harus berupa file',
            'prestasi_sertifikat.mimes' => 'Sertifikat prestasi harus berupa file pdf',
            'prestasi_sertifikat.max' => 'Sertifikat prestasi maksimal 10 MB',
        ]);

        $prestasi = Prestasi::findOrFail($id);
        $prestasi->nama = $request->prestasi_nama;
        $prestasi->tingkat = $request->prestasi_tingkat;
        $prestasi->tahun = $request->prestasi_tahun;
        $prestasi->penyelenggara = $request->prestasi_penyelenggara;
        $prestasi->tempat = $request->prestasi_tempat;
        $prestasi->pencapaian = $request->prestasi_pencapaian;

        if ($request->hasFile('prestasi_sertifikat')) {
            $oldFile = $prestasi->file_sertifikat;
            if ($oldFile && $oldFile != '') {
                if (\Storage::exists('public/'.$oldFile)) {
                    \Storage::delete('public/'.$oldFile);
                }
            }

            $file = $request->file('prestasi_sertifikat');
            $fileName = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
            $filePath = $file->storeAs('prestasi', $fileName, 'public');
            $prestasi->file_sertifikat = $filePath;
        }

        $prestasi->save();

        return redirect()->route('mahasiswa.prestasi.index')->with('success', 'Prestasi berhasil diperbarui');
    }
}
