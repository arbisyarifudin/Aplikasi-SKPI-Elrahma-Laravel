<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\JenjangPendidikan;
use App\Models\Mahasiswa;
use App\Models\ProgramStudi;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function postLogin(Request $request)
    {

        $request->validate([
            'uid' => [
                'required',
                'min:3'
            ],
            'password' => [
                'required',
                'min:5'
            ]
        ], [
            'uid.required' => 'NIM / User ID harus diisi',
            'uid.min' => 'NIM / User ID minimal 3 karakter',
            'password.required' => 'Kata sandi harus diisi',
            'password.min' => 'Kata sandi minimal 5 karakter'
        ]);

        // check user as admin or mahasiswa
        $checkMahasiswa = Mahasiswa::where('nim', $request->uid)->first();
        if ($checkMahasiswa) {
            // login as mahasiswa
            $user = User::where('id', $checkMahasiswa->user_id)->first();

            // check password
            if (\Hash::check($request->password, $user->password)) {

                // set auth
                \Auth::guard('web')->login($user);

                return redirect()->route('mahasiswa.dashboard');
            } else {
                // return redirect()->back()->with('error', 'NIM / User ID atau kata sandi salah');
                return redirect()->back()->withErrors([
                    'password' => 'Kredensial tidak valid'
                ]);
            }
        } else {
            // login as admin
            $user = User::where('uid', $request->uid)->first();

            if ($user) {

                // check password
                if (\Hash::check($request->password, $user->password)) {

                    // set auth
                    \Auth::guard('web')->login($user);

                    return redirect()->route('admin.dashboard');
                } else {
                    // return redirect()->back()->with('error', 'NIM / User ID atau kata sandi salah');
                    return redirect()->back()->withErrors([
                        'password' => 'Kredensial tidak valid'
                    ]);
                }
            } else {
                // return redirect()->back()->with('error', 'NIM / User ID atau kata sandi salah');
                return redirect()->back()->withErrors([
                    'password' => 'Kredensial tidak valid'
                ]);
            }
        }
    }

    public function logout()
    {
        \Auth::guard('web')->logout();
        return redirect()->route('home')->with('success', 'Berhasil keluar');
    }
}
