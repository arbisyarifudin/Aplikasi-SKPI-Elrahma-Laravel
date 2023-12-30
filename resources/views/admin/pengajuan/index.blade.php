@extends('admin.layout')
@section('title', 'Pengajuan SKPI - ')

@section('content')

<?php

if (!function_exists('getJenjangStatus')) {
    function getJenjangStatus ($status) {
        if ($status == 'pending') {
            return '<span class="badge bg-warning">Menunggu</span>';
        } else if ($status == 'diproses') {
            return '<span class="badge bg-info">Diproses</span>';
        } else if ($status == 'ditolak') {
            return '<span class="badge bg-danger">Ditolak</span>';
        } else if ($status == 'selesai') {
            return '<span class="badge bg-secondary">Selesai</span>';
        } else if ($status == 'siap diambil') {
            return '<span class="badge bg-success">Siap Diambil</span>';
        } else {
            return '<span class="badge bg-secondary">Tidak diketahui</span>';
        }
    }
}

?>

<div class="pagetitle">
    <h1>Pengajuan SKPI</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item">Pengajuan SKPI</li>
            <li class="breadcrumb-item active">List</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col-12">
            <div class="card overflow-auto">

                <div class="card-body" style="min-height: 300px">

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="card-title">Data Pengajuan SKPI</div>
                        <a href="{{ route('admin.dokumen.index') }}" class="btn btn-sm btn-outline-primary"><i
                                class="bi bi-arrow-left"></i> Ke Dokumen SKPI</a>
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

                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Kode</th>
                                <th scope="col">Status</th>
                                <th scope="col">Mahasiswa</th>
                                <th scope="col">Jenjang & Prodi</th>
                                <th scope="col">Tahun Lulus</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengajuan as $p)
                            <tr data-id="{{ $p->id }}">
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ $p->kode }}</td>
                                <td>{!! getJenjangStatus($p->status) !!}</td>
                                <td>
                                    <div>{{ $p->nama_mahasiswa }}</div>
                                    <div class="fst-italic small text-secondary">NIM: {{ $p->nim_mahasiswa }}</div>
                                </td>
                                <td>
                                    <div>{{ $p->nama_jenjang }}</div>
                                    <div class="fst-italic small text-secondary">{{ $p->nama_prodi }}</div>
                                </td>
                                <td>{{ $p->tahun_lulus }}</td>
                                <td>
                                    @if ($p->status === 'pending')
                                    <a title="Buat dokumen"
                                        href="{{ route('admin.dokumen.create', ['mhs' => $p->id_mahasiswa, 'prodi' => $p->id_prodi, 'jenjang' => $p->id_jenjang, 'ref' => 'pengajuan']) }}"
                                        class="btn btn-sm btn-outline-danger py-0 ms-2"><i
                                            class="bi bi-file-earmark-plus"></i></a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
        <!-- End Recent Sales -->
    </div>
</section>

@endsection
