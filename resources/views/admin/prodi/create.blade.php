@extends('admin.layout')
@section('title', 'Tambah Program Studi - ')

@section('content')
<div class="pagetitle">
    <h1>Tambah Program Studi</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item">Program Studi</li>
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
                        <a href="{{ route('admin.prodi.index') }}" class="btn btn-sm btn-outline-primary"><i
                                class="bi bi-arrow-left"></i> Kembali</a>
                        <span class="text-danger small">Bertanda *) wajib diisi</span>
                    </div>

                    <form action="{{ route('admin.prodi.store') }}" method="post">
                        @csrf

                        <div class="mb-3">
                            <label for="jenjang_pendidikan_id" class="form-label">Jenjang Pendidikan</label>
                            <select name="jenjang_pendidikan_id" id="jenjang_pendidikan_id"
                                class="form-select @error('jenjang_pendidikan_id') is-invalid @enderror">
                                <option value="">-- Pilih Jenjang Pendidikan --</option>
                                @foreach ($jenjangPendidikan as $jp)
                                <option value="{{ $jp->id }}" {{ old('jenjang_pendidikan_id') == $jp->id ? 'selected' : ''
                                    }}>
                                    {{ $jp->nama }}</option>
                                @endforeach
                            </select>
                            @error('jenjang_pendidikan_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="prodi_nama" class="form-label">Nama Program Studi <span
                                    class="text-danger">*</span></label>
                            <div class="input-group mb-3 @error('prodi_nama') is-invalid @enderror">
                                <span class="input-group-text">&nbsp;ID</span>
                                <input type="text" name="prodi_nama" class="form-control"
                                    aria-describedby="prodi_nama-addon" class="form-control"
                                    value="{{ old('prodi_nama') }}" autofocus placeholder="Nama program studi">
                            </div>
                            @error('prodi_nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <div class="input-group mb-3 @error('prodi_nama_en') is-invalid @enderror">
                                <span class="input-group-text">EN</span>
                                <input type="text" name="prodi_nama_en" class="form-control"
                                    aria-describedby="prodi_nama_en-addon" class="form-control"
                                    value="{{ old('prodi_nama_en') }}" autofocus placeholder="Nama program studi (english)">
                            </div>
                            @error('prodi_nama_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="prodi_akreditasi" class="form-label">Akreditasi</label>
                            <input type="text" name="prodi_akreditasi" id="prodi_akreditasi"
                                class="form-control @error('prodi_akreditasi') is-invalid @enderror"
                                value="{{ old('prodi_akreditasi') }}" placeholder="Misal: A, B, dsb">
                            @error('prodi_akreditasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="prodi_gelar" class="form-label">Gelar <span
                                    class="text-danger">*</span></label>
                            <div class="input-group mb-3 @error('prodi_gelar') is-invalid @enderror">
                                <span class="input-group-text">&nbsp;ID</span>
                                <input type="text" name="prodi_gelar" class="form-control"
                                    aria-describedby="prodi_gelar-addon" class="form-control"
                                    value="{{ old('prodi_gelar') }}" autofocus placeholder="Gelar">
                            </div>
                            @error('prodi_gelar')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <div class="input-group mb-3 @error('prodi_gelar_en') is-invalid @enderror">
                                <span class="input-group-text">EN</span>
                                <input type="text" name="prodi_gelar_en" class="form-control"
                                    aria-describedby="prodi_gelar_en-addon" class="form-control"
                                    value="{{ old('prodi_gelar_en') }}" autofocus placeholder="Gelar (english)">
                            </div>
                            @error('prodi_gelar_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


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
