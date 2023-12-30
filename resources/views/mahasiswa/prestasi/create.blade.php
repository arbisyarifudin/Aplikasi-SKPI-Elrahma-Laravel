@extends('mahasiswa.layout')
@section('title', 'Tambah Prestasi - ')

@section('content')
<div class="pagetitle">
    <h1>Tambah Prestasi</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item">Prestasi</li>
            <li class="breadcrumb-item active">Tambah</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col-md-8">
            <div class="card overflow-auto">
                <div class="card-body" style="min-height: 300px">
                    <div class="card-title d-flex justify-content-between">
                        <a href="{{ route('mahasiswa.prestasi.index') }}" class="btn btn-sm btn-outline-primary"><i
                                class="bi bi-arrow-left"></i> Kembali</a>
                        <span class="text-danger small">Bertanda *) wajib diisi</span>
                    </div>

                    <form action="{{ route('mahasiswa.prestasi.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="prestasi_nama" class="form-label">Nama Lomba / Kegiatan <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="prestasi_nama" id="prestasi_nama"
                                class="form-control @error('prestasi_nama') is-invalid @enderror"
                                value="{{ old('prestasi_nama') }}" placeholder="Misal: Lomba Debat Bahasa Inggris">
                            @error('prestasi_nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="prestasi_pencapaian" class="form-label">Pencapaian / Juara <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="prestasi_pencapaian" id="prestasi_pencapaian"
                                class="form-control @error('prestasi_pencapaian') is-invalid @enderror"
                                value="{{ old('prestasi_pencapaian') }}" placeholder="Misal: Juara 1, Juara 2, dsb">
                            @error('prestasi_pencapaian')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="prestasi_tingkat" class="form-label">Tingkat Prestasi <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="prestasi_tingkat" id="prestasi_tingkat"
                                class="form-control @error('prestasi_tingkat') is-invalid @enderror"
                                value="{{ old('prestasi_tingkat') }}" placeholder="Misal: Nasional, Kecamatan, dsb">
                            @error('prestasi_tingkat')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="prestasi_tahun" class="form-label">Tahun <span
                                    class="text-danger">*</span></label>
                            <input type="number" name="prestasi_tahun" id="prestasi_tahun"
                                class="form-control @error('prestasi_tahun') is-invalid @enderror"
                                value="{{ old('prestasi_tahun') }}" placeholder="Misal: 2010">
                            @error('prestasi_tahun')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="prestasi_penyelenggara" class="form-label">Penyelenggara Kegiatan <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="prestasi_penyelenggara" id="prestasi_penyelenggara"
                                class="form-control @error('prestasi_penyelenggara') is-invalid @enderror"
                                value="{{ old('prestasi_penyelenggara') }}">
                            @error('prestasi_penyelenggara')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="prestasi_tempat" class="form-label">Tempat Kegiatan <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="prestasi_tempat" id="prestasi_tempat"
                                class="form-control @error('prestasi_tempat') is-invalid @enderror"
                                value="{{ old('prestasi_tempat') }}">
                            @error('prestasi_tempat')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="prestasi_sertifikat" class="form-label">Sertifikat <span
                                    class="text-danger">[tidak wajib]</span></label>
                            <input type="file" name="prestasi_sertifikat" id="prestasi_sertifikat"
                                class="form-control @error('prestasi_sertifikat') is-invalid @enderror" accept=".pdf,.jpg,.jpeg,.png" />
                            @error('prestasi_sertifikat')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <hr class="my-4" />

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
