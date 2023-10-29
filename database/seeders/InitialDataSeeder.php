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

        try {
            DB::beginTransaction();

            // data admin
            $admins = [
                [
                    'name' => 'Admin',
                    'email' => 'admin@mail.com',
                    'password' => bcrypt('admin'),
                    'role' => 'admin',
                ]
            ];

            foreach ($admins as $admin) {
                \App\Models\User::create($admin);
            }

            // data jenjang pendidikan
            $jenjangPendidikan = [
                [
                    'nama' => 'Sarjana (Strata 1)',
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
                        ],
                        [
                            'nama' => 'Sistem Informasi',
                            'nama_en' => 'Information System',
                            'akreditasi' => 'B',
                        ]
                    ]
                ],
            ];

            foreach ($jenjangPendidikan as $jenjang) {
                $insertJenjang = $jenjang;
                unset($insertJenjang['program_studi']);
                $dataJenjang = \App\Models\JenjangPendidikan::create($insertJenjang);

                if (isset($jenjang['program_studi'])) {
                    foreach ($jenjang['program_studi'] as $programStudi) {
                        $programStudi['jenjang_pendidikan_id'] = $dataJenjang->id;
                        $dataProgramStudi = \App\Models\ProgramStudi::create($programStudi);
                        $dataJenjang->programStudi()->save($dataProgramStudi);
                    }
                }
            }

            // data mahasiswa
            $mahasiswa = [
                [
                    'nama' => 'Mahasiswa 1',
                    'nim' => '1234567890',
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
                    'gelar' => [
                        'Sarjana Komputer',
                        'Bachelor of Computer Information Systems'
                    ],
                    'prestasi' => [
                        [
                            'nama' => 'Lomba 1',
                            'tingkat' => 'Nasional',
                            'tahun' => '2020',
                            'penyelenggara' => 'Pihak penyelenggara',
                            'tempat' => 'Bandung',
                            'pencapaian' => 'Juara 1',
                            'file_sertifikat' => '/sertifikat/lomba1.pdf',
                        ]
                    ]
                ],
            ];

            foreach ($mahasiswa as $mhs) {

                $user = \App\Models\User::create([
                    'name' => $mhs['nama'],
                    'email' => $mhs['email'],
                    'password' => bcrypt($mhs['nim']),
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
                $dataMahasiswa = \App\Models\Mahasiswa::create($mhsData);

                $dataProgramStudi = \App\Models\ProgramStudi::join('jenjang_pendidikan', 'jenjang_pendidikan.id', '=', 'program_studi.jenjang_pendidikan_id')
                    ->where('program_studi.nama', $mhs['program_studi'])
                    ->where('jenjang_pendidikan.singkatan', $mhs['jenjang_pendidikan'])
                    ->first();

                \App\Models\MahasiswaProgramStudi::create([
                    'mahasiswa_id' => $dataMahasiswa->id,
                    'program_studi_id' => $dataProgramStudi->id,
                    'tahun_masuk' => $mhs['tahun_masuk'],
                    'tahun_lulus' => $mhs['tahun_lulus'],
                    'nomor_ijazah' => $mhs['nomor_ijazah'],
                    'gelar' => @$mhs['gelar'][0],
                    'gelar_en' => @$mhs['gelar'][1],
                ]);

                if (isset($mhs['prestasi'])) {
                    foreach ($mhs['prestasi'] as $prestasi) {
                        $prestasi['mahasiswa_id'] = $dataMahasiswa->id;
                        $dataPrestasi = \App\Models\Prestasi::create($prestasi);
                    }
                }
            }

            // data kategori pengaturan
            $kategoriPengaturan = [
                [
                    'nama' => 'Umum',
                    'pengaturan' => [
                        [
                            'nama' => 'nama_aplikasi',
                            'nilai' => 'Sistem Informasi SKPI',
                            'tipe' => 'text'
                        ],
                    ],
                ],
                [
                    'nama' => 'Institusi',
                    'pengaturan' => [
                        [
                            'nama' => 'logo_institusi',
                            'nilai' => '',
                            'tipe' => 'image'
                        ],
                        [
                            'nama' => 'nama_institusi',
                            'nilai' => 'SEKOLAH TINGGI MANAJEMEN INFORMATIKA DAN ILMU KOMPUTER <br>EL RAHMA YOGYAKARTA',
                            'tipe' => 'editor'
                        ],
                        [
                            'nama' => 'nama_institusi_en',
                            'nilai' => 'EL RAHMA COLLEGE OF INFORMATICS MANAGEMENT AND COMPUTER SCIENCE',
                            'tipe' => 'text'
                        ],
                        [
                            'nama' => 'nama_institusi_singkat',
                            'nilai' => 'STMIK EL RAHMA YOGYAKARTA',
                            'tipe' => 'text'
                        ],
                        [
                            'nama' => 'jenis_pendidikan',
                            'nilai' => 'Sekolah Tinggi',
                            'tipe' => 'text'
                        ],
                        [
                            'nama' => 'jenis_pendidikan_en',
                            'nilai' => 'Graduate from High School or Similar level of Education',
                            'tipe' => 'text'
                        ],
                        [
                            'nama' => 'alamat_institusi',
                            'nilai' => 'Jl. Kaliurang KM. 100 No. 1, Sinduadi, Mlati, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55284',
                            'tipe' => 'textarea'
                        ],
                        [
                            'nama' => 'telepon_institusi',
                            'nilai' => '(0274) 486664',
                            'tipe' => 'text'
                        ],
                        [
                            'nama' => 'email_institusi',
                            'nilai' => 'cs@elrahmajogja.net',
                            'tipe' => 'email'
                        ]
                    ],
                ],
                [
                    'nama' => 'Capaian Belajar',
                    'pengaturan' => [
                        [
                            'nama' => 'informasi_kualifikasi_dan_hasil_capaian',
                            'tipe' => 'json',
                            'nilai' => [
                                [
                                    'judul' => 'Capaian Pembelajaran',
                                    'judul_en' => 'Learning Outcome',
                                    'subs' => [
                                        [
                                            'judul' => 'Sikap dan Tata Nilai',
                                            'judul_en' => 'Attitude and Value rule',
                                            'list' => [
                                                [
                                                    'teks' => 'Bertakwa kepada Tuhan Yang Maha Esa dan mampu menunjukkan sikap religius',
                                                    'teks_en' => 'Devout to God Almighty and able to show religious attitudes',
                                                ],
                                                [
                                                    'teks' => 'Menjunjung tinggi nilai kemanusiaan dalam menjalankan tugas berdasarkan agama, moral dan etika',
                                                    'teks_en' => 'Uphold the value of humanity in carrying out duties based on religion, morals and ethics',
                                                ],
                                                [
                                                    'teks' => 'Berkontribusi dalam peningkatan mutu kehidupan bermasyarakat, berbangsa, bernegara, kemajuan peradaban berdasarkan Pancasila',
                                                    'teks_en' => 'Contribute to improving the quality of community life, nation, state, progress of civilization based on Pancasila',
                                                ]
                                            ]
                                        ],
                                        [
                                            'judul' => 'Kemampuan Kerja',
                                            'judul_en' => 'Working Ability',
                                            'subs' => [
                                                [
                                                    'judul' => 'Umum',
                                                    'judul_en' => 'General',
                                                    'list' => [
                                                        [
                                                            'teks' => 'Mampu menerapkan pemikiran logis, kritis, sistematis, dan inovatif dalam konteks pengembangan atau implementasi ilmu pengetahuan dan teknologi yang memperhatikan dan menerapkan nilai humaniora yang sesuai dengan bidang keahliannya',
                                                            'teks_en' => 'Able to apply logical, critical, systematic, and innovative thinking in the context of the development or implementation of science and technology that considers and applies the appropriate humanistic values in their fields of expertise',
                                                        ],
                                                        [
                                                            'teks' => 'Mampu menunjukkan kinerja mandiri, bermutu, dan terukur',
                                                            'teks_en' => 'Capable to show the independent, quality, and measurable performance',
                                                        ]
                                                    ]
                                                ],
                                                [
                                                    'judul' => 'Khusus',
                                                    'judul_en' => 'Specific',
                                                    'list' => [
                                                        [
                                                            'teks' => 'Memiliki kemampuan menggunakan beberapa bahasa pemrograman komputer',
                                                            'teks_en' => 'Have the ability to use several computer programming languages',
                                                        ],
                                                        [
                                                            'teks' => 'Memiliki kemampuan membangun/ mengembangkan perangkat lunak terutama pada tahap konstruksi dengan melakukan coding dengan bahasa pemrograman tertentu',
                                                            'teks_en' => 'Have the ability to build / develop software, especially at the construction stage by coding with a particular programming language',
                                                        ]
                                                    ]
                                                ]
                                            ]
                                        ],
                                        [
                                            'judul' => 'Penguasaan Pengetahuan',
                                            'judul_en' => 'Knowledge Mastery',
                                            'list' => [
                                                [
                                                    'teks' => 'Menguasai konsep teoretis ilmu komputer/informatika',
                                                    'teks_en' => 'Mastering the theoretical concepts of computer science / informatics',
                                                ],
                                                [
                                                    'teks' => 'Menguasai konsep terkait algoritma dan logika pemrograman',
                                                    'teks_en' => 'Mastering the concepts related to algorithms and programming logic',
                                                ]
                                            ]
                                        ],
                                        [
                                            'judul' => 'Hak/Wewenang dan Tanggung Jawab',
                                            'judul_en' => 'Rights/Authority and Responsibility',
                                            'subs' => [
                                                [
                                                    'judul' => 'Umum',
                                                    'judul_en' => 'General',
                                                    'list' => [
                                                        [
                                                            'teks' => 'Mampu mempublikasikan hasil tugas akhir atau karya / desain / seni / model yang dapat diakses oleh masyarakatak akademik',
                                                            'teks_en' => 'Able to publish the results of the final project or work / design / art / model that can be accessed by the academic community',
                                                        ],
                                                        [
                                                            'teks' => 'Mampu bertanggungjawab atas pekerjaan dibidang keahliannya secara mandiri dan dapat diberi tanggung jawab atas pencapaian hasil kerja institusi atau organisasi dengan mengutamakan keselamatan dan keamanan kerja',
                                                            'teks_en' => 'Able to be responsible for work in their field of expertise independently and can be given responsibility for achieving the results of institutional or organizational work by prioritizing work safety and security',
                                                        ]
                                                    ]
                                                ],
                                                [
                                                    'judul' => 'Khusus',
                                                    'judul_en' => 'Specific',
                                                    'list' => [
                                                        [
                                                            'teks' => 'Mampu mengelola tim kerja',
                                                            'teks_en' => 'Able to manage a work team',
                                                        ],
                                                        [
                                                            'teks' => 'Mampu mengelola sumber daya mulai dari perencanaan, pengadaan, pengawasan sampai pengoptimalan pemanfaatan',
                                                            'teks_en' => 'Able to manage resources starting from planning, procurement, supervision to optimization of utilization',
                                                        ]
                                                    ]
                                                ]
                                            ]
                                        ],
                                        [
                                            'judul' => 'Penciri Perguruan Tinggi',
                                            'judul_en' => 'Characteristic of University',
                                            'list' => [
                                                [
                                                    'teks' => 'Menguasai, menerapkan dan menyampaikan nilai-nilai keislaman dalam setiap aspek kehidupan',
                                                    'teks_en' => 'Mastering, applying and conveying Islamic values in every aspect of life',
                                                ],
                                                [
                                                    'teks' => 'Memiliki kemampuan mengembangkan ide  dan menjalan usaha yang syar\'i',
                                                    'teks_en' => 'Have the ability to develop ideas and run businesses that are sharia',
                                                ]
                                            ]
                                        ]
                                    ]
                                ]
                            ],
                        ]
                    ]
                ]
            ];

            foreach ($kategoriPengaturan as $kategori) {
                $insertKategori = $kategori;
                unset($insertKategori['pengaturan']);
                $dataKategori = \App\Models\KategoriPengaturan::create($insertKategori);

                if (isset($kategori['pengaturan'])) {
                    foreach ($kategori['pengaturan'] as $pengaturan) {
                        $pengaturan['kategori_pengaturan_id'] = $dataKategori->id;

                        if ($pengaturan['tipe'] == 'json') {
                            $pengaturan['nilai'] = json_encode($pengaturan['nilai']);
                        }
                        $dataPengaturan = \App\Models\Pengaturan::create($pengaturan);
                    }
                }
            }

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
