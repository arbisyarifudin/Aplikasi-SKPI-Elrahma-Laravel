<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = auth()->user()->mahasiswa;
        return view('mahasiswa.profile.index', compact('profile'));
    }

    public function update(Request $request) {
        $request->validate([
            // 'nim' => 'required|numeric',
            'nama' => 'required|string|min:3,max:255',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string',
            'alamat' => 'required|string',
            'no_telepon' => 'required|numeric',
        ], [
            'required' => ':Attribute harus diisi',
            'numeric' => ':Attribute harus berupa angka',
            'string' => ':Attribute harus berupa teks',
            'min' => ':Attribute minimal :min karakter',
            'max' => ':Attribute maksimal :max karakter',
            'date' => ':Attribute harus berupa tanggal',
        ]);

        $user = auth()->user();
        $mahasiswa = $user->mahasiswa;

        $mahasiswa->update([
            // 'nim' => $request->nim,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
        ]);

        User::where('id', $user->id)->update([
            'name' => $request->nama,
        ]);

        return redirect()->route('mahasiswa.profile.index')->with('success', 'Profile berhasil diperbarui');
    }
}
