<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cpl;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function index(Request $request)
    {
        $jenjangId = $request->jenjang_id ?? null;
        $prodi = ProgramStudi::where('jenjang_pendidikan_id', $jenjangId)->get();

        return response()->json([
            'status' => 'success',
            'data' => $prodi
        ]);
    }

    public function show($id)
    {
        $prodi = ProgramStudi::find($id);
        if ($prodi) {

            // get active tahun kurikulum
            $tahunKurikulum = \App\Utils\Skpi::getSettingByName('tahun_kurikulum');

            // get cpl for this prodi in tahun_kurikulum
            $cplFind = Cpl::where('program_studi_id', $id)
                ->where('tahun_kurikulum', $tahunKurikulum)
                ->first();
            $prodi->kualifikasi_cpl = $cplFind ? $cplFind->data : [];

            return response()->json([
                'status' => 'success',
                'data' => $prodi
            ]);
        }

        return response()->json([
            'status' => 'error',
            'data' => null
        ], 404);
    }
}
