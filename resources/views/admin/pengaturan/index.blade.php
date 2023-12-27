@extends('admin.layout')
@section('title', 'Pengaturan - ')

@section('content')
<div class="pagetitle">
    <h1>Pengaturan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item">Pengaturan</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">

    <div class="row">
        <div class="col-md-12">
            <div class="card overflow-auto">
                <div class="card-body" style="min-height: 300px">
                    {{-- <div class="card-title d-flex justify-content-between">
                        <a href="{{ route('admin.prodi.index') }}" class="btn btn-sm btn-outline-primary"><i
                                class="bi bi-arrow-left"></i> Kembali</a>
                    </div> --}}

                    {{-- tab --}}
                    <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="dasar-tab" data-bs-toggle="tab" data-bs-target="#dasar"
                                type="button" role="tab" aria-controls="dasar" aria-selected="true">Dasar</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="institusi-tab" data-bs-toggle="tab" data-bs-target="#institusi"
                                type="button" role="tab" aria-controls="institusi"
                                aria-selected="false">Institusi</button>
                        </li>
                        {{-- <li class="nav-item" role="presentation">
                            <button class="nav-link" id="capaian-tab" data-bs-toggle="tab" data-bs-target="#capaian"
                                type="button" role="tab" aria-controls="capaian" aria-selected="false">Capaian
                                Belajar</button>
                        </li> --}}
                    </ul>

                    {{-- tab content --}}
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="dasar" role="tabpanel" aria-labelledby="dasar-tab">

                            <div class="row">
                                <div class="col-md-6">

                                    {{-- @if ($errors->any())
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Whoops!</strong> Terdapat kesalahan saat mengisi form.
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>

                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                    @endif --}}

                                    <form action="{{ route('admin.pengaturan.update', ['category' => 'dasar']) }}"
                                        method="post" class="mt-3" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="nama_aplikasi" class="form-label">Nama Aplikasi <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="nama_aplikasi" id="nama_aplikasi"
                                                class="form-control @error('nama_aplikasi') is-invalid @enderror"
                                                value="{{ old('nama_aplikasi', $pengaturan['nama_aplikasi']) }}" />
                                            @error('nama_aplikasi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <label for="logo_aplikasi_url" class="form-label">Logo Aplikasi</label>
                                        <div class="row">
                                            @if (!empty($pengaturan['logo_aplikasi']))
                                            <div class="col-md-4">
                                                <img src="{{ $pengaturan['logo_aplikasi_url'] }}"
                                                    class="img-fluid img-thumbnail" alt="Logo Aplikasi">
                                            </div>
                                            @endif
                                            <div class="col-md-8">
                                                <div
                                                    class="input-group mb-3 @error('logo_aplikasi_url') is-invalid @enderror @error('logo_aplikasi') is-invalid @enderror">
                                                    <input type="text" name="logo_aplikasi_url" class="form-control url"
                                                        aria-describedby="logo_aplikasi-addon" class="form-control"
                                                        value="{{ old('logo_aplikasi',  $pengaturan['logo_aplikasi_url']) }}"
                                                        autofocus placeholder="https://">
                                                    <input type="file" name="logo_aplikasi" class="d-none" />
                                                    <button class="input-group-text" type="button"
                                                        onclick="openFile(this)" title="Browse Server">
                                                        <i class="bi bi-folder2-open me-1"></i> Pilih Berkas
                                                    </button>
                                                </div>
                                                @error('logo_aplikasi_url')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                                @error('logo_aplikasi')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <hr />

                                        <button type="submit" class="btn btn-primary btn-sm py-2">
                                            <i class="bi bi-save me-1"></i>
                                            Simpan Perubahan
                                        </button>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="institusi" role="tabpanel" aria-labelledby="institusi-tab">

                            <div class="row">
                                <div class="col-md-6">

                                    {{-- @if ($errors->any())
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Whoops!</strong> Terdapat kesalahan saat mengisi form.
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>

                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                    @endif --}}

                                    <form action="{{ route('admin.pengaturan.update', ['category' => 'institusi']) }}"
                                        method="post" class="mt-3" enctype="multipart/form-data">
                                        @csrf

                                        <div class="mb-3">
                                            <label for="nama_institusi" class="form-label">Nama Institusi <span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group mb-3 @error('nama_institusi') is-invalid @enderror">
                                                <span class="input-group-text">&nbsp;ID</span>
                                                <input type="text" name="nama_institusi" class="form-control"
                                                    aria-describedby="nama_institusi-addon" class="form-control"
                                                    value="{{ old('nama_institusi', $pengaturan['nama_institusi']) }}"
                                                    autofocus placeholder="Nama program studi">
                                            </div>
                                            @error('nama_institusi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <div
                                                class="input-group mb-3 @error('nama_institusi_en') is-invalid @enderror">
                                                <span class="input-group-text">EN</span>
                                                <input type="text" name="nama_institusi_en" class="form-control"
                                                    aria-describedby="nama_institusi_en-addon" class="form-control"
                                                    value="{{ old('nama_institusi_en', $pengaturan['nama_institusi_en']) }}"
                                                    autofocus placeholder="Nama program studi (english)">
                                            </div>
                                            @error('nama_institusi_en')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="nama_institusi_singkat" class="form-label">Nama Institusi
                                                (singkat) <span class="text-danger">*</span></label>
                                            <input type="text" name="nama_institusi_singkat" id="nama_institusi_singkat"
                                                class="form-control @error('nama_institusi_singkat') is-invalid @enderror"
                                                value="{{ old('nama_institusi_singkat', $pengaturan['nama_institusi_singkat']) }}" />
                                            @error('nama_institusi_singkat')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <label for="logo_institusi_url" class="form-label">Logo Institusi</label>
                                        <div class="row">
                                            @if (!empty($pengaturan['logo_institusi']))
                                            <div class="col-md-4">
                                                <img src="{{ $pengaturan['logo_institusi_url'] }}"
                                                    class="img-fluid img-thumbnail" alt="Logo Institusi">
                                            </div>
                                            @endif
                                            <div class="col-md-8">
                                                <div
                                                    class="input-group mb-3 @error('logo_institusi_url') is-invalid @enderror @error('logo_institusi') is-invalid @enderror">
                                                    <input type="text" name="logo_institusi_url"
                                                        class="form-control url" aria-describedby="logo_institusi-addon"
                                                        class="form-control"
                                                        value="{{ old('logo_institusi',  $pengaturan['logo_institusi_url']) }}"
                                                        autofocus placeholder="https://">
                                                    <input type="file" name="logo_institusi" class="d-none" />
                                                    <button class="input-group-text" type="button"
                                                        onclick="openFile(this)" title="Browse Server">
                                                        <i class="bi bi-folder2-open me-1"></i> Pilih Berkas
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="alamat_institusi" class="form-label">Alamat <span class="text-danger">*</span></label>
                                            <textarea name="alamat_institusi" id="alamat_institusi"
                                                class="form-control @error('alamat_institusi') is-invalid @enderror">{{ old('alamat_institusi', $pengaturan['alamat_institusi']) }}</textarea>
                                            @error('alamat_institusi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="email_institusi" class="form-label">Email <span class="text-danger">*</span></label>
                                            <input type="text" name="email_institusi" id="email_institusi"
                                                class="form-control @error('email_institusi') is-invalid @enderror"
                                                value="{{ old('email_institusi', $pengaturan['email_institusi']) }}" />
                                            @error('email_institusi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="telepon_institusi" class="form-label">No. Telp <span class="text-danger">*</span></label>
                                            <input type="text" name="telepon_institusi" id="telepon_institusi"
                                                class="form-control @error('telepon_institusi') is-invalid @enderror"
                                                value="{{ old('telepon_institusi', $pengaturan['telepon_institusi']) }}" />
                                            @error('telepon_institusi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="sk_pendirian_institusi" class="form-label">SK Pendirian <span class="text-danger">*</span></label>
                                            <div
                                                class="input-group mb-3 @error('sk_pendirian_institusi') is-invalid @enderror">
                                                <span class="input-group-text">&nbsp;ID</span>
                                                <input type="text" name="sk_pendirian_institusi" class="form-control"
                                                    aria-describedby="sk_pendirian_institusi-addon" class="form-control"
                                                    value="{{ old('sk_pendirian_institusi', $pengaturan['sk_pendirian_institusi']) }}"
                                                    autofocus placeholder="Nama program studi">
                                            </div>
                                            @error('sk_pendirian_institusi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <div
                                                class="input-group mb-3 @error('sk_pendirian_institusi_en') is-invalid @enderror">
                                                <span class="input-group-text">EN</span>
                                                <input type="text" name="sk_pendirian_institusi_en" class="form-control"
                                                    aria-describedby="sk_pendirian_institusi_en-addon"
                                                    class="form-control"
                                                    value="{{ old('sk_pendirian_institusi_en', $pengaturan['sk_pendirian_institusi_en']) }}"
                                                    autofocus placeholder="Nama program studi (english)">
                                            </div>
                                            @error('sk_pendirian_institusi_en')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="jenis_pendidikan" class="form-label">Jenis Pendidikan <span
                                                    class="text-danger">*</span></label>
                                            <div
                                                class="input-group mb-3 @error('jenis_pendidikan') is-invalid @enderror">
                                                <span class="input-group-text">&nbsp;ID</span>
                                                <input type="text" name="jenis_pendidikan" class="form-control"
                                                    aria-describedby="jenis_pendidikan-addon" class="form-control"
                                                    value="{{ old('jenis_pendidikan', $pengaturan['jenis_pendidikan']) }}"
                                                    autofocus placeholder="Nama program studi">
                                            </div>
                                            @error('jenis_pendidikan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <div
                                                class="input-group mb-3 @error('jenis_pendidikan_en') is-invalid @enderror">
                                                <span class="input-group-text">EN</span>
                                                <input type="text" name="jenis_pendidikan_en" class="form-control"
                                                    aria-describedby="jenis_pendidikan_en-addon" class="form-control"
                                                    value="{{ old('jenis_pendidikan_en', $pengaturan['jenis_pendidikan_en']) }}"
                                                    autofocus placeholder="Nama program studi (english)">
                                            </div>
                                            @error('jenis_pendidikan_en')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <hr />

                                        <button type="submit" class="btn btn-primary btn-sm py-2">
                                            <i class="bi bi-save me-1"></i>
                                            Simpan Perubahan
                                        </button>

                                    </form>
                                </div>


                            </div>
                        </div>
                        {{-- <div class="tab-pane fade" id="capaian" role="tabpanel" aria-labelledby="capaian-tab">
                            capaian
                        </div> --}}
                    </div>


                </div>
            </div>
        </div>
    </div>

</section>


@endsection

@push('scripts')

{{-- jquery --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    function openFile(el) {
        $(el).parent().find('input[type="file"]').click();
        $(el).parent().find('input[type="file"]').change(function () {
            var filename = $(this).val().split('\\').pop();
            $(el).parent().find('input.url').val(filename);
        });
    }

</script>

@endpush
