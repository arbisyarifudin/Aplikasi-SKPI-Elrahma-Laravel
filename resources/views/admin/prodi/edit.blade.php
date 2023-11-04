@extends('admin.layout')
@section('title', 'Ubah Program Studi - ')

@section('content')
<div class="pagetitle">
    <h1>Ubah Program Studi</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item">Program Studi</li>
            <li class="breadcrumb-item active">Ubah</li>
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

                    <form action="{{ route('admin.prodi.update', ['id' => $detailData->id]) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="jenjang_pendidikan_id" class="form-label">Jenjang Pendidikan</label>
                            <select name="jenjang_pendidikan_id" id="jenjang_pendidikan_id"
                                class="form-select @error('jenjang_pendidikan_id') is-invalid @enderror">
                                <option value="">-- Pilih Jenjang Pendidikan --</option>
                                @foreach ($jenjangPendidikan as $jp)
                                <option value="{{ $jp->id }}" {{ $detailData->jenjang_pendidikan_id == $jp->id ? 'selected' : ''
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
                                    value="{{ $detailData->nama }}" autofocus placeholder="Nama program studi">
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
                                    value="{{ $detailData->nama_en }}" autofocus placeholder="Nama program studi">
                            </div>
                            @error('prodi_nama_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="prodi_akreditasi" class="form-label">Akreditasi</label>
                            <input type="text" name="prodi_akreditasi" id="prodi_akreditasi"
                                class="form-control @error('prodi_akreditasi') is-invalid @enderror"
                                value="{{ $detailData->akreditasi }}" placeholder="Misal: A, B, dsb">
                            @error('prodi_akreditasi')
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
