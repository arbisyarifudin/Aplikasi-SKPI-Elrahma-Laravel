<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengaturanController extends Controller
{
    public function index()
    {

        $dataPengaturan = [
            'nama_aplikasi' => \App\Utils\Skpi::getSettingByName('nama_aplikasi'),
            'logo_aplikasi' => \App\Utils\Skpi::getSettingByName('logo_aplikasi'),
            'logo_aplikasi_url' => '',

            'logo_institusi' => \App\Utils\Skpi::getSettingByName('logo_institusi'),
            'logo_institusi_url' => '',
            'nama_institusi' => \App\Utils\Skpi::getSettingByName('nama_institusi'),
            'nama_institusi_en' => \App\Utils\Skpi::getSettingByName('nama_institusi_en'),
            'nama_institusi_singkat' => \App\Utils\Skpi::getSettingByName('nama_institusi_singkat'),
            'sk_pendirian_institusi' => \App\Utils\Skpi::getSettingByName('sk_pendirian_institusi'),
            'sk_pendirian_institusi_en' => \App\Utils\Skpi::getSettingByName('sk_pendirian_institusi_en'),
            'alamat_institusi' => \App\Utils\Skpi::getSettingByName('alamat_institusi'),
            'email_institusi' => \App\Utils\Skpi::getSettingByName('email_institusi'),
            'telepon_institusi' => \App\Utils\Skpi::getSettingByName('telepon_institusi'),
            'jenis_pendidikan' => \App\Utils\Skpi::getSettingByName('jenis_pendidikan'),
            'jenis_pendidikan_en' => \App\Utils\Skpi::getSettingByName('jenis_pendidikan_en'),

        ];

        if (isset($dataPengaturan['logo_aplikasi']) && $dataPengaturan['logo_aplikasi'] != '') {
            // $dataPengaturan['logo_aplikasi_url'] = asset('storage/' . $dataPengaturan['logo_aplikasi']);
            $dataPengaturan['logo_aplikasi_url'] = \App\Utils\Skpi::getAssetUrl($dataPengaturan['logo_aplikasi']);
        }

        if (isset($dataPengaturan['logo_institusi']) && $dataPengaturan['logo_institusi'] != '') {
            // $dataPengaturan['logo_institusi_url'] = asset('storage/' . $dataPengaturan['logo_institusi']);
            $dataPengaturan['logo_institusi_url'] = \App\Utils\Skpi::getAssetUrl($dataPengaturan['logo_institusi']);
        }

        // dd($dataPengaturan);

        return view('admin.pengaturan.index', [
            'pengaturan' => $dataPengaturan
        ]);
    }

    public function update(Request $request)
    {

        $category = $request->input('category');

        if ($category == 'dasar') {
            return $this->__updateDasar($request);
        } else if ($category == 'institusi') {
            return $this->__updateInstitusi($request);
        } else {
            return redirect()->route('admin.pengaturan.index')->with('error', 'Kategori pengaturan tidak ditemukan');
        }
    }

    private function __updateDasar(Request $request)
    {
        $request->validate([
            'nama_aplikasi' => 'required',
            'logo_aplikasi' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'logo_aplikasi_url' => [
                'nullable',
                // 'url'
                // must valid url if logo_aplikasi is null
                function ($attribute, $value, $fail) use ($request) {
                    $logoAplikasi = $request->file('logo_aplikasi');
                    if (!isset($logoAplikasi) && !filter_var($value, FILTER_VALIDATE_URL)) {
                        $fail('Logo aplikasi harus berupa url yang valid');
                    }
                }
            ]
        ]);

        // dd($request->all());

        $namaAplikasi = $request->input('nama_aplikasi');
        $logoAplikasi = $request->file('logo_aplikasi');

        $dataPengaturan = [
            'nama_aplikasi' => $namaAplikasi,
            'logo_aplikasi' => \App\Utils\Skpi::getSettingByName('logo_aplikasi'),
        ];

        if (isset($logoAplikasi)) {
            // delete old logo
            if (isset($dataPengaturan['logo_aplikasi']) && $dataPengaturan['logo_aplikasi'] != '') {
                if (file_exists(storage_path('app/public/' . $dataPengaturan['logo_aplikasi']))) {
                    unlink(storage_path('app/public/' . $dataPengaturan['logo_aplikasi']));
                }
            }

            $namaFile = time() . '.' . $logoAplikasi->getClientOriginalExtension();
            $logoAplikasi->storeAs('public/settings', $namaFile);
            $dataPengaturan['logo_aplikasi'] = 'storage/settings/' . $namaFile;
        }

        foreach ($dataPengaturan as $key => $value) {
            \App\Utils\Skpi::updateSettingByName($key, $value);
        }

        return redirect()->route('admin.pengaturan.index')->with('success', 'Pengaturan berhasil diperbarui');
    }

    private function __updateInstitusi(Request $request)
    {
        $request->validate([
            'nama_institusi' => 'required',
            'nama_institusi_en' => 'required',
            'nama_institusi_singkat' => 'required',
            'sk_pendirian_institusi' => 'required',
            'sk_pendirian_institusi_en' => 'required',
            'alamat_institusi' => 'required',
            'email_institusi' => 'required',
            'telepon_institusi' => 'required',
            'jenis_pendidikan' => 'required',
            'jenis_pendidikan_en' => 'required',
            'logo_institusi' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'logo_institusi_url' => [
                'nullable',
                // 'url'
                // must valid url if logo_aplikasi is null
                function ($attribute, $value, $fail) use ($request) {
                    $logoInstitusi = $request->file('logo_institusi');
                    if (!isset($logoInstitusi) && !filter_var($value, FILTER_VALIDATE_URL)) {
                        $fail('Logo institusi harus berupa url yang valid');
                    }
                }
            ]
        ]);

        // dd($request->all());

        $namaInstitusi = $request->input('nama_institusi');
        $namaInstitusiEn = $request->input('nama_institusi_en');
        $namaInstitusiSingkat = $request->input('nama_institusi_singkat');
        $skPendirianInstitusi = $request->input('sk_pendirian_institusi');
        $skPendirianInstitusiEn = $request->input('sk_pendirian_institusi_en');
        $alamatInstitusi = $request->input('alamat_institusi');
        $emailInstitusi = $request->input('email_institusi');
        $teleponInstitusi = $request->input('telepon_institusi');
        $jenisPendidikan = $request->input('jenis_pendidikan');
        $jenisPendidikanEn = $request->input('jenis_pendidikan_en');
        $logoInstitusi = $request->file('logo_institusi');

        $dataPengaturan = [
            'nama_institusi' => $namaInstitusi,
            'nama_institusi_en' => $namaInstitusiEn,
            'nama_institusi_singkat' => $namaInstitusiSingkat,
            'sk_pendirian_institusi' => $skPendirianInstitusi,
            'sk_pendirian_institusi_en' => $skPendirianInstitusiEn,
            'alamat_institusi' => $alamatInstitusi,
            'email_institusi' => $emailInstitusi,
            'telepon_institusi' => $teleponInstitusi,
            'jenis_pendidikan' => $jenisPendidikan,
            'jenis_pendidikan_en' => $jenisPendidikanEn,
            'logo_institusi' => \App\Utils\Skpi::getSettingByName('logo_institusi'),
        ];

        if (isset($logoInstitusi)) {
            // delete old logo
            if (isset($dataPengaturan['logo_institusi']) && $dataPengaturan['logo_institusi'] != '') {
                if (file_exists(storage_path('app/public/' . $dataPengaturan['logo_institusi']))) {
                    unlink(storage_path('app/public/' . $dataPengaturan['logo_institusi']));
                }
            }

            $namaFile = time() . '.' . $logoInstitusi->getClientOriginalExtension();
            $logoInstitusi->storeAs('public/settings', $namaFile);
            $dataPengaturan['logo_institusi'] = 'storage/settings/' . $namaFile;
        }

        foreach ($dataPengaturan as $key => $value) {
            \App\Utils\Skpi::updateSettingByName($key, $value);
        }

        return redirect()->route('admin.pengaturan.index')->with('success', 'Pengaturan berhasil diperbarui');
    }
}
