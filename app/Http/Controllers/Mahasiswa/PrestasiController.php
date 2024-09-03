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
            'prestasi_tahun' => 'required|integer|min:1950|max:' . date('Y'),
            'prestasi_penyelenggara' => 'required',
            'prestasi_tempat' => 'required',
            'prestasi_pencapaian' => 'required',
            'prestasi_sertifikat_file' => 'required_if:sertifikat_option,file|nullable|file|mimes:pdf,jpg,jpeg,png|max:1024',
            'prestasi_sertifikat_url' => 'required_if:sertifikat_option,url|nullable|url'
        ], [
            'prestasi_nama.required' => 'Nama prestasi harus diisi',
            'prestasi_tingkat.required' => 'Tingkat prestasi harus diisi',
            'prestasi_tahun.required' => 'Tahun prestasi harus diisi',
            'prestasi_tahun.min' => 'Tahun prestasi minimal 1950',
            'prestasi_tahun.max' => 'Tahun prestasi melebihi tahun sekarang',
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
        $prestasi->mahasiswa_id = auth()->user()->mahasiswa->id;
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

        return redirect()->route('mahasiswa.prestasi.index')->with('success', 'Prestasi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $prestasi = Prestasi::findOrFail($id);
        // get file sertifikat url
        $prestasi->file_sertifikat_url = $prestasi->file_sertifikat ? \App\Utils\Skpi::getAssetUrl($prestasi->file_sertifikat) : '';

        // define sertifikat option, file or url
        $file_option = $prestasi->file_sertifikat && filter_var($prestasi->file_sertifikat, FILTER_VALIDATE_URL) ? 'url' : 'file';

        return view('mahasiswa.prestasi.edit', compact('prestasi', 'file_option'));
    }

    public function update(Request $request, $id)
    {
        if ($request->sertifikat_option === 'file') {
            $request->merge(['prestasi_sertifikat_url' => null]);
        } else {
            $request->merge(['prestasi_sertifikat_file' => null]);
        }

        $request->validate([
            'prestasi_nama' => 'required',
            'prestasi_tingkat' => 'required',
            'prestasi_tahun' => 'required|integer|min:1950|max:' . date('Y'),
            'prestasi_penyelenggara' => 'required',
            'prestasi_tempat' => 'required',
            'prestasi_pencapaian' => 'required',
            'prestasi_sertifikat_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:1024',
            'prestasi_sertifikat_url' => 'nullable|url'
        ], [
            'prestasi_nama.required' => 'Nama prestasi harus diisi',
            'prestasi_tingkat.required' => 'Tingkat prestasi harus diisi',
            'prestasi_tahun.required' => 'Tahun prestasi harus diisi',
            'prestasi_tahun.min' => 'Tahun prestasi minimal 1950',
            'prestasi_tahun.max' => 'Tahun prestasi melebihi tahun sekarang',
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

        $prestasi = Prestasi::findOrFail($id);
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

        return redirect()->route('mahasiswa.prestasi.index')->with('success', 'Prestasi berhasil diperbarui');
    }

    public function destroy ($id) {
        // find prestasi
        $prestasi = Prestasi::findOrFail($id);

        // delete file
        $file = $prestasi->file_sertifikat;
        if ($file && $file != '') {
            if (\Storage::exists('public/' . $file)) {
                \Storage::delete('public/' . $file);
            }
        }

        // delete prestasi
        $prestasi->delete();

        return redirect()->route('mahasiswa.prestasi.index')->with('success', 'Prestasi berhasil dihapus');
    }
}
