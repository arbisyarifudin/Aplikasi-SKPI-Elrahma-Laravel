<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\PengajuanSkpi;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    public function index()
    {
        $pengajuan = PengajuanSkpi::join('program_studi', 'pengajuan_skpi.program_studi_id', '=', 'program_studi.id')
            ->join('jenjang_pendidikan', 'program_studi.jenjang_pendidikan_id', '=', 'jenjang_pendidikan.id')
            ->select([
                'pengajuan_skpi.id',
                'pengajuan_skpi.kode',
                'pengajuan_skpi.status',
                'pengajuan_skpi.created_at',
                'pengajuan_skpi.updated_at',
                'program_studi.nama as nama_prodi',
                'program_studi.nama_en as nama_prodi_en',
                'jenjang_pendidikan.nama as nama_jenjang',
                'jenjang_pendidikan.nama_en as nama_jenjang_en',
            ])
        ->where('mahasiswa_id', auth()->user()->mahasiswa->id)->get();
        return view('mahasiswa.pengajuan.index', compact('pengajuan'));
    }
}
