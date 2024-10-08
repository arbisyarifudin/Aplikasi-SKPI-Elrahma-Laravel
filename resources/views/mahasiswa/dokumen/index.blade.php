@extends('mahasiswa.layout')
@section('title', 'Dokumen SKPI - ')

@section('content')

<?php

if (!function_exists('getJenjangStatus')) {
    function getJenjangStatus ($status) {
        if ($status == 'pending') {
            return '<span class="badge bg-warning">Menunggu Diproses</span>';
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
    <h1>Dokumen SKPI</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item">Dokumen SKPI</li>
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
                        <div class="card-title">Data Dokumen SKPI</div>
                        <a href="{{ route('mahasiswa.pengajuan.index') }}" class="btn btn-sm btn-primary"><i
                                class="bi bi-file-break"></i> Lihat Pengajuan</a>
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
                                <th scope="col">No. Dok</th>
                                {{-- <th scope="col">Tgl. Dok</th> --}}
                                <th scope="col">Jenjang</th>
                                <th scope="col">Prodi</th>
                                <th scope="col">Thn. Lulus</th>
                                <th scope="col">Dibuat pada</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dokumen as $d)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>
                                    <div>{{ $d->nomor }}</div>
                                    <div class="fst-italic small text-secondary">{{ $d->tanggal }}</div>
                                </td>
                                {{-- <td>{{ $d->tanggal }}</td> --}}
                                <td>
                                    <div>{{ $d->nama_jenjang }}</div>
                                    <div class="fst-italic small text-secondary">{{ $d->nama_jenjang_en }}</div>
                                </td>
                                <td>
                                    <div>{{ $d->nama_prodi }}</div>
                                    <div class="fst-italic small text-secondary">{{ $d->nama_prodi_en }}</div>
                                </td>
                                <td>{{ $d->tahun_lulus }}</td>
                                <td>
                                    @if ($d->dibuat_pada)
                                    <div>{{ $d->dibuat_pada }}</div>
                                    @elseif ($d->file === 'proses')
                                    <div class="text-secondary small">
                                        <i class="bi bi-clock"></i> Dokumen diproses
                                    </div>
                                    @else
                                    <div class="text-secondary small">
                                        <i class="bi bi-x-circle"></i> Belum dibuat
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    @if ($d->pengajuan_status)
                                    <div>{!! getJenjangStatus($d->pengajuan_status) !!}</div>
                                    @else
                                    <form action="{{ route('mahasiswa.dokumen.request') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="mahasiswa_prodi_id" value="{{ $d->mps_id }}">
                                        <button type="submit" class="btn btn-sm btn-primary" title="Ajukan Pembuatan">
                                            <i class="bi bi-check-circle"></i>
                                            {{ !empty($d->file) ? 'Ajukan Baru' : 'Ajukan' }}
                                        </button>
                                    </form>
                                    @endif
                                    @if (!empty($d->file))
                                    @if ($d->file !== 'proses')
                                    {{-- <div class="mt-2">
                                        <a href="{{ $d->file_url }}" target="_blank" class="btn btn-sm btn-light"><i
                                                class="bi bi-file-earmark"></i> Lihat SKPI</a>
                                    </div> --}}
                                    <a href="{{ $d->file_url }}" target="_blank"
                                        class="btn btn-sm btn-outline-dark preview-pdf" data-bs-toggle="modal"
                                        data-bs-target="#previewModal" data-url="{{ $d->file_url }}"><i
                                            class="bi bi-file-earmark"></i>
                                        Lihat SKPI</a>
                                    @endif
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

<div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centeredx">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="hapusModalLabel">Konfirmasi Hapus</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus dokumen ini?
            </div>
            <div class="modal-footer">
                <form method="POST" action="">
                    @csrf
                    @method("DELETE")
                    {{-- <input type="hidden" name="id" value=""> --}}
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="previewModalLabel">Preview PDF</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <iframe id="pdfFrame" src="" width="100%" height="728px"></iframe>

                <div class="text-center">
                    <a href="" id="downloadLink" download class="btn btn-primary mt-3" target="_blank"><i
                            class="bi bi-download"></i> Unduh Dokumen</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    // Handle PDF preview
    const previewButtons = document.querySelectorAll(".preview-pdf");
    const previewModal = document.getElementById("previewModal");
    const pdfFrame = document.getElementById("pdfFrame");
    const downloadLink = document.getElementById("downloadLink");

    previewButtons.forEach(btn => {
        btn.addEventListener("click", function() {
            const fileUrl = this.dataset.url;
            pdfFrame.src = fileUrl + "#toolbar=0&navpanes=0&scrollbar=0";
            downloadLink.href = fileUrl;
        });
    });
</script>
@endpush
