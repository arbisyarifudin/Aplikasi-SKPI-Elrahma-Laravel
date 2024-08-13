@extends('admin.layout')
@section('title', 'Arsip CPL per Program Studi - ')

@section('content')
<div class="pagetitle">
    <h1>CPL Program Studi</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item">Program Studi</li>
            <li class="breadcrumb-item">CPL</li>
            <li class="breadcrumb-item active">Arsip</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col-md-10">
            <div class="card overflow-auto" id="app">
                <div class="card-body" style="min-height: 300px">
                    <div class="d-flex justify-content-between">
                        <div class="card-title">
                            {{ $prodi->nama }} / <small class="text-muted">{{$prodi->nama_en}}</small>
                        </div>
                    </div>
                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                {{-- <th scope="col">Nama Prodi</th> --}}
                                <th scope="col">Tahun Kurikulum</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cplListData as $cpl)
                            <tr data-id="{{ $cpl->id }}">
                                <td scope="row">{{ $loop->iteration }}</td>
                                {{-- <td>
                                    <div>{{ $cpl->program_studi_nama }}</div>
                                    <div class="fst-italic small text-secondary">{{ $cpl->program_studi_nama_en }}</div>
                                </td> --}}
                                <td>
                                    {{ $cpl->tahun_kurikulum }}
                                    @if ($tahunKurikulumAktif === $cpl->tahun_kurikulum)
                                    <span class="badge bg-success">Aktif</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($tahunKurikulumAktif === $cpl->tahun_kurikulum)
                                    <a title="Ubah CPL"
                                        href="{{ route('admin.prodi.edit-cpl', ['id' => $prodi->id]) }}"
                                        class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i></a>
                                    @endif
                                    <a title="Lihat CPL"
                                        href="{{ route('admin.prodi.view-cpl', ['id' => $prodi->id, 'idCpl' => $cpl->id]) }}"
                                        class="btn btn-sm btn-outline-primary"><i class="bi bi-card-heading"></i> Lihat</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
