<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\MahasiswaProgramStudi;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;

class ElrahmaController extends Controller
{
    /**
     * Get mahasiswa from elrahma API
     * and syncronize with local database
     *
     * TODO: change with actual elrahma API URL and its data structure
     */
    public function syncMahasiswa(Request $request)
    {
        // $client = new \GuzzleHttp\Client();
        // $response = $client->request('GET', 'https://elrahma.com/api/mahasiswa'); // change with actual elrahma API URL
        // $data = json_decode($response->getBody()->getContents(), true);

        // DUMMY DATA
        $data = [
            [
                'nama' => 'Ernest Prakasa',
                'nim' => '1234567893',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '1998-01-20',
                'alamat' => 'Jl. Jalan 100',
                'no_telepon' => '081234567893',
                'email' => 'mahasiswa3@mail.com',
                'jenjang_pendidikan' => 'S1',
                'program_studi' => 'Informatika',
                'tahun_masuk' => '2020',
                'tahun_lulus' => '2024',
                'nomor_ijazah' => '',
            ],
            [
                'nama' => 'Arie Kriting',
                'nim' => '1234567894',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '1998-01-20',
                'alamat' => 'Jl. Jalan 100',
                'no_telepon' => '081234567894',
                'email' => 'mahasiswa4@gmail.com',
                'jenjang_pendidikan' => 'S1',
                'program_studi' => 'Informatika',
                'tahun_masuk' => '2020',
                'tahun_lulus' => '2024',
                'nomor_ijazah' => '',
            ],
        ];

        \DB::beginTransaction();
        try {
            foreach ($data as $mahasiswa) {
                $user = \App\Models\User::firstOrCreate([
                    'email' => $mahasiswa['email'],
                    'uid' => $mahasiswa['nim'], // uid = nim
                    'role' => 'mahasiswa',
                ], [
                    'name' => $mahasiswa['nama'],
                    'email' => $mahasiswa['email'],
                    'password' => \Hash::make($mahasiswa['nim']),
                    'role' => 'mahasiswa',
                ]);

                $mahasiswaData = $mahasiswa;
                unset($mahasiswaData['email']);
                unset($mahasiswaData['program_studi']);
                unset($mahasiswaData['tahun_masuk']);
                unset($mahasiswaData['tahun_lulus']);
                unset($mahasiswaData['nomor_ijazah']);
                unset($mahasiswaData['gelar']);
                unset($mahasiswaData['jenjang_pendidikan']);
                unset($mahasiswaData['prestasi']);

                $mahasiswaData['user_id'] = $user->id;
                $dataMahasiswa = Mahasiswa::firstOrCreate(
                    [
                        'nim' => $mahasiswa['nim'],
                    ],
                    $mahasiswaData
                );

                $dataProgramStudi = ProgramStudi::select([
                    'program_studi.*',
                ])->join('jenjang_pendidikan', 'jenjang_pendidikan.id', '=', 'program_studi.jenjang_pendidikan_id')
                    ->where('program_studi.nama', $mahasiswa['program_studi'])
                    ->where('jenjang_pendidikan.singkatan', $mahasiswa['jenjang_pendidikan'])
                    ->first();

                $mahasiswaProgramStudi = MahasiswaProgramStudi::firstOrCreate([
                    'mahasiswa_id' => $dataMahasiswa->id,
                    'program_studi_id' => $dataProgramStudi->id,
                ], [
                    'mahasiswa_id' => $dataMahasiswa->id,
                    'program_studi_id' => $dataProgramStudi->id,
                    'tahun_masuk' => $mahasiswa['tahun_masuk'],
                    'tahun_lulus' => $mahasiswa['tahun_lulus'],
                    'nomor_ijazah' => $mahasiswa['nomor_ijazah'],
                ]);
            }

            \DB::commit();
            return response()->json([
                'status' => 'success',
                'data' => $data
            ]);
        } catch (\Exception $e) {
            // throw $e;
            \DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage() . ' ' . $e->getLine() . ' ' . $e->getFile()
            ], 500);
        }
    }
}
