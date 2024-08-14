<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InitialDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (env('APP_ENV') === 'local' || env('APP_ENV') === 'testing') {
            // truncate table
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            DB::table('users')->truncate();
            DB::table('jenjang_pendidikan')->truncate();
            DB::table('program_studi')->truncate();
            DB::table('mahasiswa')->truncate();
            DB::table('mahasiswa_program_studi')->truncate();
            DB::table('prestasi')->truncate();
            DB::table('kategori_pengaturan')->truncate();
            DB::table('pengaturan')->truncate();
            DB::table('dokumen_skpi')->truncate();
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }

        try {
            DB::beginTransaction();


            // data admin
            $admins = [
                [
                    'name' => 'Admin',
                    'uid' => 'admin',
                    'email' => 'admin@mail.com',
                    'password' => \Hash::make('admin'),
                    'role' => 'admin',
                ]
            ];

            foreach ($admins as $admin) {
                \App\Models\User::firstOrCreate([
                    'email' => $admin['email'],
                    'role' => 'admin'
                ], $admin);
            }

            // data jenjang pendidikan
            $jenjangPendidikan = [
                [
                    'nama' => 'Sarjana',
                    'nama_en' => 'Bachelor Degree',
                    'singkatan' => 'S1',
                    'level_kkni' => 6,
                    'syarat_masuk' => 'Lulusan SMA/SMK/MA/MAK atau sederajat',
                    'syarat_masuk_en' => 'Graduated Senior High School / equivalent',
                    'lama_studi_reguler' => '8 Semester',
                    'jenjang_lanjutan' => 'Pasca Sarjana',
                    'jenjang_lanjutan_en' => 'Postgraduate',
                    'program_studi' => [
                        [
                            'nama' => 'Informatika',
                            'nama_en' => 'Informatics',
                            'akreditasi' => 'B',
                            'gelar' => 'Sarjana Komputer',
                            'gelar_en' => 'Bachelor of Computer Information Systems',
                        ],
                        [
                            'nama' => 'Sistem Informasi',
                            'nama_en' => 'Information System',
                            'akreditasi' => 'B',
                            'gelar' => 'Sarjana Komputer',
                            'gelar_en' => 'Bachelor of Computer Information Systems',
                        ]
                    ]
                ],
                [
                    'nama' => 'Magister (simulasi)',
                    'nama_en' => 'Master Degree',
                    'singkatan' => 'S2',
                    'level_kkni' => 6,
                    'syarat_masuk' => 'Lulusan Sarjana / S1 sederajat',
                    'syarat_masuk_en' => 'Graduated Bachelor Degree / equivalent',
                    'lama_studi_reguler' => '4 Semester',
                    'jenjang_lanjutan' => 'Doktor',
                    'jenjang_lanjutan_en' => 'Doctor',
                    'program_studi' => [
                        [
                            'nama' => 'Manajemen Informasi',
                            'nama_en' => 'Informatic Manajemen',
                            'akreditasi' => 'B',
                            'gelar' => 'Magister Komputer',
                            'gelar_en' => 'Master of Computer Information Systems',
                        ],
                    ]
                ]
            ];

            foreach ($jenjangPendidikan as $jenjang) {
                $insertJenjang = $jenjang;
                unset($insertJenjang['program_studi']);
                $dataJenjang = \App\Models\JenjangPendidikan::firstOrCreate([
                    'nama' => $jenjang['nama'],
                    'singkatan' => $jenjang['singkatan'],
                ], $insertJenjang);

                if (isset($jenjang['program_studi'])) {
                    foreach ($jenjang['program_studi'] as $programStudi) {
                        $programStudi['jenjang_pendidikan_id'] = $dataJenjang->id;
                        $dataProgramStudi = \App\Models\ProgramStudi::firstOrCreate(
                            [
                                'nama' => $programStudi['nama'],
                                'jenjang_pendidikan_id' => $dataJenjang->id,
                            ],
                            $programStudi
                        );
                        $dataJenjang->programStudi()->save($dataProgramStudi);
                    }
                }
            }

            // data mahasiswa
            $mahasiswa = [
                [
                    'nama' => 'Raditya Dika',
                    'nim' => '1234567890',
                    'nik' => '3001010101000001',
                    'jenis_kelamin' => 'L',
                    'tempat_lahir' => 'Bandung',
                    'tanggal_lahir' => '2000-01-01',
                    'alamat' => 'Jl. Jalan',
                    'no_telepon' => '081234567890',
                    'email' => 'mahasiswa@mail.com',
                    'jenjang_pendidikan' => 'S1',
                    'program_studi' => 'Informatika',
                    'tahun_masuk' => '2018',
                    'tahun_lulus' => '2024',
                    'nomor_ijazah' => '',
                    'prestasi' => [
                        [
                            'nama' => 'Lomba 1',
                            'tingkat' => 'Nasional',
                            'tahun' => '2020',
                            'penyelenggara' => 'Kemenristekdikti',
                            'tempat' => 'Bandung',
                            'pencapaian' => 'Juara 1',
                            'file_sertifikat' => '/sertifikat/lomba1.pdf',
                        ]
                    ]
                ],
                [
                    'nama' => 'Panji Pragiwaksono',
                    'nim' => '1234567891',
                    'nik' => '3001010101000002',
                    'jenis_kelamin' => 'L',
                    'tempat_lahir' => 'Jakarta',
                    'tanggal_lahir' => '1995-04-05',
                    'alamat' => 'Jl. Sudirman',
                    'no_telepon' => '081234567891',
                    'email' => 'mahasiswa2@mail.com',
                    'jenjang_pendidikan' => 'S1',
                    'program_studi' => 'Informatika',
                    'tahun_masuk' => '2015',
                    'tahun_lulus' => '2020',
                    'nomor_ijazah' => '',
                ],
                [
                    'nama' => 'Panji Pragiwaksono',
                    'nim' => '1234567891',
                    'nik' => '3001010101000002',
                    'jenis_kelamin' => 'L',
                    'tempat_lahir' => 'Jakarta',
                    'tanggal_lahir' => '1995-04-05',
                    'alamat' => 'Jl. Sudirman',
                    'no_telepon' => '081234567891',
                    'email' => 'mahasiswa2@mail.com',
                    'jenjang_pendidikan' => 'S2',
                    'program_studi' => 'Manajemen Informasi',
                    'tahun_masuk' => '2020',
                    'tahun_lulus' => '2024',
                    'nomor_ijazah' => '',
                ]
            ];

            foreach ($mahasiswa as $mhs) {

                $user = \App\Models\User::firstOrCreate([
                    'email' => $mhs['email'],
                    'uid' => $mhs['nim'], // uid = nim
                    'role' => 'mahasiswa',
                ], [
                    'name' => $mhs['nama'],
                    'email' => $mhs['email'],
                    'password' => \Hash::make($mhs['nim']),
                    'role' => 'mahasiswa',
                ]);

                $mhsData = $mhs;
                unset($mhsData['email']);
                unset($mhsData['program_studi']);
                unset($mhsData['tahun_masuk']);
                unset($mhsData['tahun_lulus']);
                unset($mhsData['nomor_ijazah']);
                unset($mhsData['gelar']);
                unset($mhsData['jenjang_pendidikan']);
                unset($mhsData['prestasi']);

                $mhsData['user_id'] = $user->id;
                $dataMahasiswa = \App\Models\Mahasiswa::firstOrCreate(
                    [
                        'nim' => $mhs['nim'],
                    ],
                    $mhsData
                );

                $dataProgramStudi = \App\Models\ProgramStudi::select([
                    'program_studi.*',
                ])->join('jenjang_pendidikan', 'jenjang_pendidikan.id', '=', 'program_studi.jenjang_pendidikan_id')
                    ->where('program_studi.nama', $mhs['program_studi'])
                    ->where('jenjang_pendidikan.singkatan', $mhs['jenjang_pendidikan'])
                    ->first();

                $mhsProgramStudi = \App\Models\MahasiswaProgramStudi::firstOrCreate([
                    'mahasiswa_id' => $dataMahasiswa->id,
                    'program_studi_id' => $dataProgramStudi->id,
                ], [
                    'mahasiswa_id' => $dataMahasiswa->id,
                    'program_studi_id' => $dataProgramStudi->id,
                    'tahun_masuk' => $mhs['tahun_masuk'],
                    'tahun_lulus' => $mhs['tahun_lulus'],
                    'nomor_ijazah' => $mhs['nomor_ijazah'],
                ]);


                if (isset($mhs['prestasi'])) {
                    foreach ($mhs['prestasi'] as $prestasi) {
                        $prestasi['mahasiswa_id'] = $dataMahasiswa->id;
                        $dataPrestasi = \App\Models\Prestasi::firstOrCreate(
                            [
                                'nama' => $prestasi['nama'],
                                'mahasiswa_id' => $dataMahasiswa->id,
                            ],
                            $prestasi
                        );
                    }
                }
            }

            // data dokumen
            // $dokumen = [
            //     [
            //         'mahasiswa_id' => 1,
            //         'program_studi_id' => 1,
            //         'nomor' => '1234567890',
            //         'tanggal' => '2024-01-01',
            //         'file' => 'dokumen/skpi1.pdf',
            //     ]
            // ];

            // foreach ($dokumen as $dok) {
            //     \App\Models\DokumenSkpi::firstOrCreate(
            //         [
            //             'mahasiswa_id' => $dok['mahasiswa_id'],
            //             'program_studi_id' => $dok['program_studi_id'],
            //             'nomor' => $dok['nomor'],
            //         ],
            //         $dok
            //     );
            // }

            // is transaction success
            if (DB::transactionLevel() > 0) {
                DB::commit();
            } else {
                throw new \Exception('Transaction failed');
                DB::rollBack();
            }
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
