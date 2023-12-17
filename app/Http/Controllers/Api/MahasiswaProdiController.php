<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DokumenSkpi;
use App\Models\MahasiswaProgramStudi;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;

class MahasiswaProdiController extends Controller
{
    public function index(Request $request)
    {
        $prodiId = $request->prodi_id ?? null;
        $mahasiswaProdi = MahasiswaProgramStudi::where('program_studi_id', $prodiId)
            ->join('mahasiswa', 'mahasiswa_program_studi.mahasiswa_id', '=', 'mahasiswa.id')
            ->select([
                'mahasiswa.id',
                'mahasiswa.nama',
                'mahasiswa.nim',
            ])
            ->get();

        // is already have skpi
        foreach ($mahasiswaProdi as $key => $value) {
            $value->is_have_skpi = false;

            DokumenSkpi::where('mahasiswa_id', $value->id)
                ->where('program_studi_id', $prodiId)
                ->get()
                ->each(function ($item, $key) use ($value) {
                    $value->is_have_skpi = true;
                });
        }

        return response()->json([
            'status' => 'success',
            'data' => $mahasiswaProdi,
        ]);
    }
}
