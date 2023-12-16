<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
}
