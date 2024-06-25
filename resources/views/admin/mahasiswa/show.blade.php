@extends('admin.layout')
@section('title', 'Detail Mahasiswa - ')

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
            <div class="col-md-10">
                <div class="card overflow-auto">
                    <div class="card-body" style="min-height: 300px">
                        <div class="card-title d-flex justify-content-between">
                            <a href="{{ route('admin.mahasiswa.index') }}" class="btn btn-sm btn-outline-primary"><i
                                    class="bi bi-arrow-left"></i> Kembali</a>
                        </div>

                        <div class="row">
                            <div class="col-md-5">
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
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-7">
                                <h5>Program Studi</h5>
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
                                                <td>{{ $prodi->tahun_lulus }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-12">
                                <h5>Prestasi</h5>

                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Tahun</th>
                                            <th scope="col">Pencapaian</th>
                                            <th scope="col">Pnyelenggara & Tempat</th>
                                            <th scope="col">Sertifikat</th>
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
                                                            class="btn btn-sm btn-success"><i
                                                                class="bi bi-file-earmark-pdf"></i>
                                                            Lihat</a>
                                                    @else
                                                        <span class="badge bg-secondary">Tidak ada</span>
                                                    @endif
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
