<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengaturanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (env('APP_ENV') === 'local' || env('APP_ENV') === 'testing') {
            // truncate table
            \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            \DB::table('kategori_pengaturan')->truncate();
            \DB::table('pengaturan')->truncate();
            \DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }

        // data kategori pengaturan dan pengaturan
        $kategoriPengaturan = [
            [
                'nama' => 'Dasar',
                'pengaturan' => [
                    [
                        'nama' => 'nama_aplikasi',
                        'nilai' => 'SKPI ELRAHMA',
                        'tipe' => 'text'
                    ],
                    [
                        'nama' => 'logo_aplikasi',
                        'nilai' => 'images/elrahma.jpeg',
                        'tipe' => 'url'
                    ]
                ],
            ],
            [
                'nama' => 'Institusi',
                'pengaturan' => [
                    [
                        'nama' => 'logo_institusi',
                        'nilai' => 'images/elrahma.jpeg',
                        'tipe' => 'url'
                    ],
                    [
                        'nama' => 'nama_institusi',
                        // 'nilai' => 'SEKOLAH TINGGI MANAJEMEN INFORMATIKA DAN ILMU KOMPUTER <br>EL RAHMA YOGYAKARTA',
                        'nilai' => 'Sekolah Tinggi Manajemen Informatika dan Ilmu Komputer El Rahma Yogyakarta',
                        'tipe' => 'editor'
                    ],
                    [
                        'nama' => 'nama_institusi_en',
                        // 'nilai' => 'EL RAHMA COLLEGE OF INFORMATICS MANAGEMENT AND COMPUTER SCIENCE',
                        'nilai' => 'El Rahma College of Informatics Management and Computer Science',
                        'tipe' => 'text'
                    ],
                    [
                        'nama' => 'nama_institusi_singkat',
                        'nilai' => 'STMIK EL RAHMA YOGYAKARTA',
                        'tipe' => 'text'
                    ],
                    [
                        'nama' => 'sk_pendirian_institusi',
                        'nilai' => 'SK Mendiknas No. 155/D/O/2001, Tanggal 30 Agustus 2001',
                        'tipe' => 'text'
                    ],
                    [
                        'nama' => 'sk_pendirian_institusi_en',
                        'nilai' => 'SK Mendiknas No. 155/D/O/2001, Date August 30, 2001',
                        'tipe' => 'text'
                    ],
                    [
                        'nama' => 'jenis_pendidikan',
                        'nilai' => 'Sekolah Tinggi',
                        'tipe' => 'text'
                    ],
                    [
                        'nama' => 'jenis_pendidikan_en',
                        // 'nilai' => 'Graduate from High School or Similar level of Education',
                        'nilai' => 'College',
                        'tipe' => 'text'
                    ],
                    [
                        'nama' => 'alamat_institusi',
                        'nilai' => 'Jalan Sisingamangaraja No.76, Brontokusuman, Kota Yogyakarta, DIY, Indonesia
                        Kodepos 55153',
                        'tipe' => 'textarea'
                    ],
                    [
                        'nama' => 'telepon_institusi',
                        'nilai' => '(0274) 486664',
                        'tipe' => 'text'
                    ],
                    [
                        'nama' => 'hp_institusi',
                        'nilai' => '+62-8112929757',
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
            ],
            [
                'nama' => 'Kurikulum',
                'pengaturan' => [
                    [
                        'nama' => 'tahun_kurikulum',
                        'nilai' => '2024',
                        'tipe' => 'select',
                    ],
                ]
            ],
            [
                'nama' => 'Tanda Tangan',
                'pengaturan' => [
                    [
                        'nama' => 'nama_penandatangan',
                        'nilai' => 'Eko Riswanto, S.T., M.Cs',
                        'tipe' => 'text',
                    ],
                    [
                        'nama' => 'nip_penandatangan',
                        'nilai' => '197501152005011002',
                        'tipe' => 'number',
                    ],
                    [
                        'nama' => 'jabatan_penandatangan',
                        'nilai' => 'Ketua',
                        'tipe' => 'text',
                    ],
                    [
                        'nama' => 'gambar_tandatangan_cap',
                        'nilai' => '',
                        'tipe' => 'image',
                    ],
                ]
            ]
        ];

        foreach ($kategoriPengaturan as $kategori) {
            $insertKategori = $kategori;
            unset($insertKategori['pengaturan']);
            $dataKategori = \App\Models\KategoriPengaturan::firstOrCreate([
                'nama' => $insertKategori['nama'],
            ], $insertKategori);

            if (isset($kategori['pengaturan'])) {
                foreach ($kategori['pengaturan'] as $pengaturan) {
                    $pengaturan['kategori_pengaturan_id'] = $dataKategori->id;

                    if ($pengaturan['tipe'] == 'json') {
                        $pengaturan['nilai'] = json_encode($pengaturan['nilai']);
                    }
                    $dataPengaturan = \App\Models\Pengaturan::firstOrCreate([
                        'nama' => $pengaturan['nama'],
                    ], [
                        'kategori_pengaturan_id' => $dataKategori->id,
                        'nama' => $pengaturan['nama'],
                        'nilai' => $pengaturan['nilai'],
                        'tipe' => $pengaturan['tipe'],
                    ]);
                }
            }
        }

        /* // get all prodi, and set setting 'informasi_kualifikasi_dan_hasil_capaian' for each prodi
        $prodis = \App\Models\ProgramStudi::all();
        foreach ($prodis as $prodi) {
            $pengaturan = \App\Models\Pengaturan::where('nama', 'informasi_kualifikasi_dan_hasil_capaian')->first();
            $prodi->kualifikasi_cpl = $pengaturan ? $pengaturan->nilai : json_encode([]);
            $prodi->save();
        } */

        // get all prodi,  and create cpl per prodi + tahun kurikukum
        $prodis = \App\Models\ProgramStudi::all();
        foreach ($prodis as $prodi) {
            $pengaturan = \App\Models\Pengaturan::where('nama', 'informasi_kualifikasi_dan_hasil_capaian')->first();


            // get range from 2015 to 2024
            $tahunKurikulums = range(2015, 2024);
            foreach ($tahunKurikulums as $tahunKurikulum) {
                $cpl = \App\Models\Cpl::firstOrCreate([
                    'tahun_kurikulum' => $tahunKurikulum,
                    'program_studi_id' => $prodi->id,
                ], [
                    'tahun_kurikulum' => $tahunKurikulum,
                    'program_studi_id' => $prodi->id,
                    'data' => $pengaturan ? $pengaturan->nilai : json_encode([]),
                ]);
            }
        }
    }
}
