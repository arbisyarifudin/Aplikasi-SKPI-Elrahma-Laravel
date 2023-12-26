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
        ];

        if (isset($dataPengaturan['logo_aplikasi'])) {
            $dataPengaturan['logo_aplikasi_url'] = asset('storage/' . $dataPengaturan['logo_aplikasi']);
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
            return $this->updateDasar($request);
        }
    }

    public function updateDasar(Request $request)
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
            if (isset($dataPengaturan['logo_aplikasi'])) {
                if (file_exists(storage_path('app/public/' . $dataPengaturan['logo_aplikasi']))) {
                    unlink(storage_path('app/public/' . $dataPengaturan['logo_aplikasi']));
                }
            }

            $namaFile = time() . '.' . $logoAplikasi->getClientOriginalExtension();
            $logoAplikasi->storeAs('public/settings', $namaFile);
            $dataPengaturan['logo_aplikasi'] = 'settings/' . $namaFile;
        }

        foreach ($dataPengaturan as $key => $value) {
            \App\Utils\Skpi::updateSettingByName($key, $value);
        }

        return redirect()->route('admin.pengaturan.index')->with('success', 'Pengaturan berhasil diperbarui');
    }
}
