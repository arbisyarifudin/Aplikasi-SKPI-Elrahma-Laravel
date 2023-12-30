<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PengajuanSkpi;
use App\Utils\Skpi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class PengajuanController extends Controller
{
    public function index()
    {
        $pengajuan = PengajuanSkpi::join('program_studi', 'pengajuan_skpi.program_studi_id', '=', 'program_studi.id')
            ->join('jenjang_pendidikan', 'program_studi.jenjang_pendidikan_id', '=', 'jenjang_pendidikan.id')
            ->join('mahasiswa', 'pengajuan_skpi.mahasiswa_id', '=', 'mahasiswa.id')

            // join with mahasiswa_program_studi table where mahasiswa_id = mahasiswa.id and program_studi_id = program_studi.id
            ->join('mahasiswa_program_studi as mps', function ($join) {
                $join->on('mahasiswa.id', '=', 'mps.mahasiswa_id');
                $join->on('program_studi.id', '=', 'mps.program_studi_id');
            })

            ->select([
                'pengajuan_skpi.id',
                'pengajuan_skpi.kode',
                'pengajuan_skpi.status',
                'pengajuan_skpi.created_at',
                'pengajuan_skpi.updated_at',
                'program_studi.id as id_prodi',
                'program_studi.nama as nama_prodi',
                'program_studi.nama_en as nama_prodi_en',
                'jenjang_pendidikan.id as id_jenjang',
                'jenjang_pendidikan.nama as nama_jenjang',
                'jenjang_pendidikan.nama_en as nama_jenjang_en',
                'mahasiswa.id as id_mahasiswa',
                'mahasiswa.nama as nama_mahasiswa',
                'mahasiswa.nim as nim_mahasiswa',
                'mps.tahun_lulus'
            ])
            ->get();


        return view('admin.pengajuan.index', [
            'pengajuan' => $pengajuan
        ]);
    }
}
