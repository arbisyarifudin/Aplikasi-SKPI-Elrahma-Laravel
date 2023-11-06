@extends('admin.layout')
@section('title', 'Buat Dokumen SKPI - ')

@section('content')
<div class="pagetitle">
    <h1>Buat Dokumen SKPI</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item">Dokumen SKPI</li>
            <li class="breadcrumb-item active">Buat Baru</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col-md-8">
            <div class="card overflow-auto">
                <div class="card-body" style="min-height: 300px">
                    <div class="card-title d-flex justify-content-between">
                        <a href="{{ route('admin.dokumen.index') }}" class="btn btn-sm btn-outline-primary"><i
                                class="bi bi-arrow-left"></i> Kembali</a>
                        <span class="text-danger small">Bertanda *) wajib diisi</span>
                    </div>

                    <form action="{{ route('admin.dokumen.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="dokumen_nomor" class="form-label">No. Dokumen</label>
                                    <input type="text" name="dokumen_nomor" id="dokumen_nomor"
                                        class="form-control @error('dokumen_nomor') is-invalid @enderror"
                                        value="{{ $noDokumen }}" disabled placeholder="Nomor dokumen">
                                    @error('dokumen_nomor')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="dokumen_tanggal" class="form-label">Tgl. Dokumen</label>
                                    <input type="date" name="dokumen_tanggal" id="dokumen_tanggal"
                                        class="form-control @error('dokumen_tanggal') is-invalid @enderror"
                                        value="{{ old('dokumen_tanggal') }}" placeholder="Lama">
                                    @error('dokumen_tanggal')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
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
