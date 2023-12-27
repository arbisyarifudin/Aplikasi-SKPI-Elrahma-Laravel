<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile()
    {
        $user = auth()->user();
        return view('admin.user.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'min:3',
                'max:100',
            ],
            'uid' => [
                'required',
                'string',
                'min:3',
                'max:100',
                'unique:users,uid,' . auth()->user()->id,
            ],
            'email' => [
                'required',
                'email',
                'unique:users,email,' . auth()->user()->id,
            ],
        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'name.string' => 'Nama harus berupa string',
            'name.min' => 'Nama minimal :min karakter',
            'name.max' => 'Nama maksimal :max karakter',
            'uid.required' => 'ID tidak boleh kosong',
            'uid.string' => 'ID harus berupa string',
            'uid.min' => 'ID minimal :min karakter',
            'uid.max' => 'ID maksimal :max karakter',
            'uid.unique' => 'ID sudah digunakan',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email sudah digunakan',
        ]);

        $user = auth()->user();

        User::find($user->id)->update([
            'name' => $request->name,
            'uid' => $request->uid,
            'email' => $request->email,
        ]);

        return redirect()->back()->with('success', 'Profil berhasil diperbarui');
    }

    public function password()
    {
        return view('admin.user.password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => [
                'required',
                'string',
                // 'min:8',
                'max:100',
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'max:100',
                'confirmed',
            ],
        ], [
            'old_password.required' => 'Kata sandi lama tidak boleh kosong',
            'old_password.string' => 'Kata sandi lama harus berupa string',
            'old_password.min' => 'Kata sandi lama minimal :min karakter',
            'old_password.max' => 'Kata sandi lama maksimal :max karakter',
            'password.required' => 'Kata sandi baru tidak boleh kosong',
            'password.string' => 'Kata sandi baru harus berupa string',
            'password.min' => 'Kata sandi baru minimal :min karakter',
            'password.max' => 'Kata sandi baru maksimal :max karakter',
            'password.confirmed' => 'Konfirmasi kata sandi baru tidak cocok',
        ]);

        $user = auth()->user();

        if (!password_verify($request->old_password, $user->password)) {
            return redirect()->back()->with('error', 'Kata sandi lama tidak cocok');
        }

        User::find($user->id)->update([
            'password' => \Hash::make($request->password),
        ]);

        return redirect()->back()->with('success', 'Kata sandi berhasil diperbarui');
    }
}
