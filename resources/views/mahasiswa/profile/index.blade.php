@extends('mahasiswa.layout')
@section('title', 'Dashboard - ')

@section('content')
<div class="pagetitle">
    <h1>Profil</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item">Profil</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-md-8">
            <div class="card overflow-auto">
                <div class="card-body" style="min-height: 300px">
                    <div class="card-title">Ubah Profil</div>

                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                        {!! session('success') !!}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                        {!! session('error') !!}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <form action="{{ route('mahasiswa.profile.update') }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nim" class="form-label">NIM</label>
                            <input type="text" name="nim" id="nim"
                                class="form-control @error('nim') is-invalid @enderror" value="{{ $profile->nim }}"
                                readonly disabled>
                            @error('nim')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama" id="nama"
                                class="form-control @error('nama') is-invalid @enderror"
                                value="{{ old('nama', $profile->nama) }}">
                            @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" id="tempat_lahir"
                                    class="form-control @error('tempat_lahir') is-invalid @enderror"
                                    value="{{ old('tempat_lahir', $profile->tempat_lahir) }}">
                                @error('tempat_lahir')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="tanggal_lahir" class="form-label">Tempat Lahir</label>
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                                    class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                    value="{{ old('tanggal_lahir', $profile->tanggal_lahir) }}">
                                @error('tanggal_lahir')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin"
                                class="form-select @error('jenis_kelamin') is-invalid @enderror">
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="L" {{ old('jenis_kelamin', $profile->jenis_kelamin) == 'L' ? 'selected' :
                                    '' }}>
                                    Laki-laki</option>
                                <option value="P" {{ old('jenis_kelamin', $profile->jenis_kelamin) == 'P' ? 'selected' :
                                    '' }}>
                                    Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="no_telepon" class="form-label">No. HP</label>
                            <input type="text" name="no_telepon" id="no_telepon"
                                class="form-control @error('no_telepon') is-invalid @enderror"
                                value="{{ old('no_telepon', $profile->no_telepon) }}">
                            @error('no_telepon')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea name="alamat" id="alamat"
                                class="form-control @error('alamat') is-invalid @enderror"
                                rows="3">{{ old('alamat', $profile->alamat) }}</textarea>
                            @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 mt-4">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="bi bi-save me-1"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
