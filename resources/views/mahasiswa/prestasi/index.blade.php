@extends('mahasiswa.layout')
@section('title', 'Prestasi - ')

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
    <h1>Prestasi</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item">Prestasi</li>
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
                        <div class="card-title">Data Prestasi</div>
                        <a href="{{ route('mahasiswa.prestasi.create') }}" class="btn btn-sm btn-primary"><i
                                class="bi bi-plus"></i> Tambah</a>
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
                                <th scope="col">Nama</th>
                                <th scope="col">Tahun</th>
                                <th scope="col">Pencapaian</th>
                                {{-- <th scope="col">Tingkat</th> --}}
                                <th scope="col">Pnyelenggara & Tempat</th>
                                <th scope="col">Sertifikat</th>
                                <th scope="col">Status Persetujuan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($prestasi as $p)
                            <tr data-id="{{ $p->id }}">
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ $p->nama }}</td>
                                <td>{{ $p->tahun }}</td>
                                <td>
                                    <div>{{ $p->pencapaian }}</div>
                                    <div class="small text-italic text-muted">tingkat: {{ $p->tingkat }}</div>
                                </td>
                                {{-- <td>{{ $p->tingkat }}</td> --}}
                                <td>
                                    <div>{{ $p->penyelenggara }}</div>
                                    <div class="small text-italic text-muted">di: {{ $p->tempat }}</div>
                                </td>
                                <td>
                                    @if ($p->file_sertifikat)
                                    <button type="button" class="btn btn-sm btn-success preview-file"
                                        data-bs-toggle="modal" data-bs-target="#previewModal"
                                        data-url="{{ $p->file_sertifikat_url }}"
                                        data-type="{{ pathinfo($p->file_sertifikat_url, PATHINFO_EXTENSION) }}">
                                        <i class="bi bi-file-earmark"></i> Lihat
                                    </button>
                                    @else
                                    <span class="badge bg-secondary">Tidak ada</span>
                                    @endif
                                </td>
                                <td>{!! getStatusColor($p->status) !!}</td>
                                <td>
                                    <button title="Hapus" type="button" class="btn btn-sm btn-light text-danger"
                                        data-bs-toggle="modal" data-bs-target="#hapusModal" data-id="{{ $p->id }}">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                    @if ($p->status !== 'Ditolak')
                                    <a title="Ubah" href="{{ route('mahasiswa.prestasi.edit', ['id' => $p->id]) }}"
                                        class="btn btn-sm btn-light text-primary"><i class="bi bi-pencil"></i></a>
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
                Apakah Anda yakin ingin menghapus prestasi ini?
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
                <h5 class="modal-title" id="previewModalLabel">Preview Sertifikat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <iframe id="fileFrame" src="" width="100%" height="728px" style="display: none;"></iframe>
                <img id="fileImage" src="" alt="Preview Image" width="100%" style="display: none;">
                <div class="text-center mt-3">
                    <div id="unsupportedFile" style="display: none;">
                        <p>File ini tidak dapat dipreview.</p>
                    </div>
                    <div class="py-6">
                        <a href="" id="downloadLink" download class="btn btn-primary" target="_blank"><i
                                class="bi bi-download"></i> Buka/Unduh Dokumen</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const hapusButton = document.querySelectorAll("button[data-bs-target='#hapusModal']");
        const hapusModal = document.getElementById("hapusModal");
        const modalTitle = hapusModal.querySelector(".modal-title");

        hapusButton.forEach(btn => {
            btn.addEventListener("click", function (e) {
            const dataId = this.dataset.id;
            console.log('dataId',dataId)

            const row = e.target.closest("tr");
            // const dataId = row.getAttribute("data-id");
            const namaItem = row.querySelector("td:nth-child(2)").textContent; // Mengambil teks dari kolom "Nama"
            const form = hapusModal.querySelector("form");
            // const inputId = form.querySelector("input[name='id']");
            const buttonHapus = hapusModal.querySelector("button[type='button']");
            const url = "{{ route('mahasiswa.prestasi.destroy', ':id') }}";
            const urlDelete = url.replace(":id", dataId);

            // Setel URL form hapus
            form.setAttribute("action", urlDelete);

            // Setel data dinamis dalam form
            // inputId.value = dataId;

            // Setel data dinamis dalam modal
            // modalTitle.textContent = "Konfirmasi Hapus Jenjang #" + dataId;
            hapusModal.querySelector(".modal-body").textContent = "Apakah Anda yakin ingin menghapus " + namaItem + "?";

            // Setel event click pada tombol hapus
            // buttonHapus.addEventListener("click", function () {
            //     form.submit();
            // });

            });
        });

        const previewButtons = document.querySelectorAll(".preview-file");
        const previewModal = document.getElementById("previewModal");
        const fileFrame = document.getElementById("fileFrame");
        const fileImage = document.getElementById("fileImage");
        const unsupportedFile = document.getElementById("unsupportedFile");
        const downloadLink = document.getElementById("downloadLink");

        previewButtons.forEach(btn => {
            btn.addEventListener("click", function() {
                const fileUrl = this.dataset.url;
                const fileType = this.dataset.type.toLowerCase();

                downloadLink.href = fileUrl;

                fileFrame.style.display = 'none';
                fileImage.style.display = 'none';
                unsupportedFile.style.display = 'none';

                if (fileType === 'pdf') {
                    fileFrame.src = fileUrl + '#toolbar=0&navpanes=0&scrollbar=0';
                    fileFrame.style.display = 'block';
                } else if (['jpg', 'jpeg', 'png', 'gif'].includes(fileType)) {
                    fileImage.src = fileUrl + '?t=' + new Date().getTime();
                    fileImage.style.display = 'block';
                } else {
                    downloadLink.href = fileUrl;
                    unsupportedFile.style.display = 'block';
                }
            });
        });
    });


</script>

@endpush
