<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\JenjangPendidikan;
use App\Models\Mahasiswa;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('mahasiswa.dashboard.index');
    }
}
