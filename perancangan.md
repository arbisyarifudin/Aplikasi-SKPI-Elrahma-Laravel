# PERANCANGAN DATABASE

1. Users
    - id (PK)
    - email
    - password
    - role (admin, mahasiswa)

0. Mahasiswa
    - id (PK)
    - user_id (FK)
    - user_siakad_id
    - nim
    - nik
    - nama
    - tempat_lahir
    - tanggal_lahir
    - jenis_kelamin
    - alamat
    - no_hp
    - foto

0. Perguruan Tinggi (atau bisa gunakan pengaturan)
    - id (PK)
    - nama
    - alamat
    - no_telp
    - email
    - website
    - logo
    - jenis (universitas, institut, politeknik, akademi, sekolah tinggi)
    - nomor_sk_pendirian
    - tanggal_sk_pendirian
    - bahasa_pengantar (misal: indonesia, inggris, indonesia dan inggris)
    - sistem_penilaian 

0. Jenjang Pendidikan
    - id (PK)
    - nama (diplomat 1, sarjana, magister, doktor)
    - singkatan (D1, D2, D3, D4, S1, S2, S3)
    - level_kkni
    - syarat_masuk (lulusan sma/sederajat, dll)
    - lama_studi_reguler (8 semester)
    - jenjang_lanjutan (misal: S2 atau Pasca Sarjana)
    - status_profesi

0. Program Studi
    - id (PK)
    - perguruan_tinggi_id (FK)
    - nama
    - akreditasi
    - jenjang (diplomat, sarjana, magister, doktor)

0. Mahasiswa Program Studi
    - id (PK)
    - mahasiswa_id (FK)
    - program_studi_id (FK)
    - tahun_masuk
    - tahun_lulus
    - no_ijazah 
    - gelar

0. Prestasi
    - id (PK)
    - mahasiswa_id (FK)
    - nama
    - tingkat (internasional, nasional, provinsi, kota)
    - tahun
    - penyelenggara
    - tempat
    - peringkat
    - file (sertifikat)

0. informasi_kualifikasi_capaian
    - id (PK)
    - program_studi_id (FK)
    - data JSON

0. SKPI
    - id (PK)
    - mahasiswa_program_studi_id (FK)
    - nomor
    - tanggal
    - file (SKPI)
    - data JSON
