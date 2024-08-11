# PERANCANGAN DATABASE (versi 2)

1. Users
    - id (PK)
    - nama
    - email
    - password
    - role (admin, mahasiswa)

0. Mahasiswa
    - id (PK)
    - user_id (FK)
    - user_siakad_id ** ID mahasiswa di SIAKAD
    - nim
    - nik
    - nama
    - tempat_lahir
    - tanggal_lahir
    - jenis_kelamin
    - alamat
    - no_hp

0. Kategori pengaturan
    - id (PK)
    - nama (perguruan tinggi, informasi isi kualifikasi & capaian, penanda tangan SKPI, dll)
    - deskripsi

0. Pengaturan
    - id (PK)
    - kategori_pengaturan_id (FK)
    - nama
    - deskripsi
    - isi
    - tipe (teks, angka, tanggal, file, json, dll)

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
    - nama
    - akreditasi
    - jenjang_id (FK)

0. CPL (capaian belajar)
    - id (PK)
    - tahun_kurikulum
    - program_studi_id
    - data JSON

    ```UNIQUE > tahun + prodi```

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
    - tingkat (internasional, nasional, provinsi, kota, lainnya)
    - tahun
    - penyelenggara
    - tempat
    - peringkat
    - file (sertifikat)

0. Pengajuan SKPI
    - id (PK)
    - mahasiswa_program_studi_id (FK)
    - kode pengajuan 
    - tanggal pengajuan
    - status (pending, diproses, ditolak, siap diambil, dll)
    - pesan (alasan ditolak, dll)

0. Dokumen SKPI
    - id (PK)
    - pengajuan_skpi_id (FK) NULL jika tidak melalui pengajuan (misal: admin)
    - mahasiswa_program_studi_id (FK)
    - nomor dokumen
    - file (SKPI)
    - data JSON
    - tanggal dibuat
