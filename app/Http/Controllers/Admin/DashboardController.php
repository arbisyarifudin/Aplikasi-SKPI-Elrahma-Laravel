<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenjangPendidikan;
use App\Models\Mahasiswa;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $data = [
            'totalMahasiswa' => 0,
            'totalJenjang' => 0,
            'totalProdi' => 0,
        ];

        $data['totalMahasiswa'] = Mahasiswa::count();
        $data['totalJenjang'] = JenjangPendidikan::count();
        $data['totalProdi'] = ProgramStudi::count();

        return view('admin.dashboard.index', $data);
    }
}
