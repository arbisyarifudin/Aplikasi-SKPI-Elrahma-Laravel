@extends('admin.layout')
@section('title', 'Detail Mahasiswa - ')


@php

if (!function_exists('getStatusColor')) {
function getStatusColor ($status) {
$status = strtolower($status);
if ($status == 'diproses') {
return '<span class="badge bg-warning">Diproses</span>';
} else if ($status == 'ditolak') {
return '<span class="badge bg-danger">Ditolak</span>';
} else if ($status == 'diterima') {
return '<span class="badge bg-success">Diterima</span>';
} else {
return '<span class="badge bg-secondary">Tidak diketahui</span>';
}
}
}

@endphp

@section('content')
<div class="pagetitle">
    <h1>Detail Mahasiswa</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item">Mahasiswa</li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="card overflow-auto">
                <div class="card-body" style="min-height: 300px">
                    <div class="card-title d-flex justify-content-between">
                        <a href="{{ route('admin.mahasiswa.index') }}" class="btn btn-sm btn-outline-primary"><i
                                class="bi bi-arrow-left"></i> Kembali</a>
                    </div>

                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <div class="row">
                        <div class="col-md-5">
                            <h5>Data Diri</h5>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Nama</th>
                                        <td>:</td>
                                        <td>{{ $mahasiswa->nama }}</td>
                                    </tr>
                                    <tr>
                                        <th>NIM</th>
                                        <td>:</td>
                                        <td>{{ $mahasiswa->nim }}</td>
                                    </tr>
                                    <tr>
                                        <th>NIK</th>
                                        <td>:</td>
                                        <td>{{ $mahasiswa->nik }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tempat/Tanggal Lahir</th>
                                        <td>:</td>
                                        <td>{{ $mahasiswa->tempat_lahir }} / {{ $mahasiswa->tanggal_lahir_indo }}</td>
                                    </tr>
                                    <tr>
                                        <th>Jenis Kelamin</th>
                                        <td>:</td>
                                        <td>{{ $mahasiswa->jenis_kelamin === 'P' ? 'Perempuan' : 'Laki-laki' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td>:</td>
                                        <td>{{ $mahasiswa->alamat }}</td>
                                    </tr>
                                    <tr>
                                        <th>No. Telp</th>
                                        <td>:</td>
                                        <td>
                                            <a href="https://wa.me/{{ $mahasiswa->nomor_whatsapp }}" target="_blank">{{
                                                $mahasiswa->nomor_whatsapp }}</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-7">
                            <h5>Riwayat Program Studi</h5>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Jenjang</th>
                                        <th>Prodi</th>
                                        <th>Th. Masuk</th>
                                        <th>Th. Lulus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mahasiswa->programStudis as $prodi)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $prodi->programStudi->jenjangPendidikan->nama }}</td>
                                        <td>{{ $prodi->programStudi->nama }}</td>
                                        <td>{{ $prodi->tahun_masuk }}</td>
                                        <td>{{ $prodi->tahun_lulus ?? '-' }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="col-12">

                            <div class="d-flex justify-content-between">
                                <h5>Prestasi</h5>

                                {{-- <a href="{{ route('admin.mahasiswa.prestasi.create') }}"
                                    class="btn btn-sm btn-primary"><i class="bi bi-plus"></i> Tambah</a> --}}
                            </div>

                            <table class="table table-borderless datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Tahun</th>
                                        <th scope="col">Pencapaian</th>
                                        <th scope="col">Penyelenggara & Tempat</th>
                                        <th scope="col">Sertifikat</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mahasiswa->prestasis as $prestasi)
                                    <tr data-id="{{ $prestasi->id }}">
                                        <td scope="row">{{ $loop->iteration }}</td>
                                        <td>{{ $prestasi->nama }}</td>
                                        <td>{{ $prestasi->tahun }}</td>
                                        <td>
                                            <div>{{ $prestasi->pencapaian }}</div>
                                            <div class="small text-italic text-muted">tingkat: {{ $prestasi->tingkat }}
                                            </div>
                                        </td>
                                        <td>
                                            <div>{{ $prestasi->penyelenggara }}</div>
                                            <div class="small text-italic text-muted">di: {{ $prestasi->tempat }}</div>
                                        </td>
                                        <td>
                                            @if ($prestasi->file_sertifikat)
                                            <a href="{{ $prestasi->file_sertifikat_url }}" target="_blank"
                                                class="btn btn-sm btn-success"><i class="bi bi-file-earmark-pdf"></i>
                                                Lihat</a>
                                            @else
                                            <span class="badge bg-secondary">Tidak ada</span>
                                            @endif
                                        </td>
                                        <td>
                                            {!! getStatusColor($prestasi->status) !!}
                                        </td>
                                        <td>
                                            <a title="Ubah" data-tooltip="tooltip"
                                                href="{{ route('admin.mahasiswa.prestasi.edit', ['mahasiswaId' => $mahasiswa->id, 'prestasiId' => $prestasi->id]) }}"
                                                class="btn btn-sm btn-info"><i class="bi bi-pencil"></i></a>
                                            <form id="updateStatusForm"
                                                action="{{ route('admin.mahasiswa.prestasi.update-status', ['mahasiswaId' => $mahasiswa->id, 'prestasiId' => $prestasi->id]) }}"
                                                method="POST" style="display: inline;">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="status" id="status" value="">
                                                @if ($prestasi->status !== 'Diterima')
                                                <button title="Terima" data-tooltip="tooltip" type="button"
                                                    class="btn btn-sm btn-success" onclick="submitForm('Diterima')">
                                                    <i class="bi bi-check"></i>
                                                </button>
                                                @endif
                                                @if ($prestasi->status !== 'Ditolak')
                                                <button title="Tolak" data-tooltip="tooltip" type="button"
                                                    class="btn btn-sm btn-danger" onclick="submitForm('Ditolak')">
                                                    <i class="bi bi-x"></i>
                                                </button>
                                                @endif
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    function submitForm(status) {
        document.getElementById('status').value = status;
        document.getElementById('updateStatusForm').submit();
    }
</script>
@endpush
