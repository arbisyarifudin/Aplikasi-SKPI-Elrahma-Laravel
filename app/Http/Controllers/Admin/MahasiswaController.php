<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DokumenSkpi;
use App\Models\JenjangPendidikan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index(Request $request)
    {
        // filter params
        $thn_masuk = $request->input('thn_masuk', date('Y') - 4);
        $thn_lulus = $request->input('thn_lulus', date('Y'));
        $jenjang = $request->input('jenjang', null);

        $query = Mahasiswa::select(
            [
                'mahasiswa.*',
                'mps.tahun_masuk',
                'mps.tahun_lulus',
                'ps.id as prodi_id',
                'ps.nama as prodi_nama',
                'ps.nama_en as prodi_nama_en',
                'ps.akreditasi',
                'jp.id as jenjang_id',
                'jp.nama as jenjang_nama',
                'jp.nama_en as jenjang_nama_en',
            ]
        )->join('mahasiswa_program_studi as mps', 'mps.mahasiswa_id', '=', 'mahasiswa.id')
            ->join('program_studi as ps', 'ps.id', '=', 'mps.program_studi_id')
            ->join('jenjang_pendidikan as jp', 'jp.id', '=', 'ps.jenjang_pendidikan_id');


        // filter by jenjang
        if ($jenjang) {
            $query->where('jp.id', $jenjang);
        }

        // filter by tahun masuk
        if ($thn_masuk) {
            $query->where('mps.tahun_masuk', '>=', $thn_masuk);
        }

        // filter by tahun lulus
        if ($thn_lulus) {
            $query->where('mps.tahun_lulus', '<=', $thn_lulus);
        }

        $data = $query->orderBy('mahasiswa.created_at', 'desc')
            ->orderBy('tahun_lulus', 'desc')
            ->get();


        // check if mahasiswa already has dokumen_skpi
        foreach ($data as $key => $value) {
            $value->has_dokumen_skpi = false;
            $value->dokumen_skpi_file = null;

            $documenSkpiExists = DokumenSkpi::where('mahasiswa_id', $value->id)
                ->where('program_studi_id', $value->prodi_id)
                ->first();

            if ($documenSkpiExists) {
                $value->has_dokumen_skpi = true;
                $value->dokumen_skpi_file = $documenSkpiExists->file;
            }

            // get is_baru status
            $value->is_baru = $value->created_at->diffInDays() < 1;
        }

        // dd($data);

        $jenjang_list = JenjangPendidikan::all();
        $tahun_masuk_list = range(2015, date('Y'));
        $tahun_lulus_list = range(2015, date('Y'));

        return view('admin.mahasiswa.index', [
            'mahasiswa' => $data,
            'jenjang_list' => $jenjang_list,
            'tahun_masuk_list' => $tahun_masuk_list,
            'tahun_lulus_list' => $tahun_lulus_list,
            'filter' => [
                'thn_masuk' => $thn_masuk,
                'thn_lulus' => $thn_lulus,
                'jenjang' => $jenjang,
            ],
        ]);
    }

    public function create()
    {
        return view('admin.mahasiswa.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $data = Mahasiswa::findOrFail($id);
        if ($data) {
            // $data->prestasis;
            // $data->prodis;
            $data = Mahasiswa::with([
                'prestasis',
                'programStudis',
                'programStudis.programStudi',
                'programStudis.programStudi.jenjangPendidikan',
            ])->where('id', $id)->first();

            // dd($data);
        }
        return view('admin.mahasiswa.show', [
            'mahasiswa' => $data,
        ]);
    }

    public function edit($id)
    {
        return view('admin.mahasiswa.edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
