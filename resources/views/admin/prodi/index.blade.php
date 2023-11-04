@extends('admin.layout')
@section('title', 'Program Studi - ')

@section('content')
<div class="pagetitle">
    <h1>Program Studi</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item">Program Studi</li>
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
                        <div class="card-title">Data Program Studi</div>
                        <a href="#" class="btn btn-sm btn-primary"><i class="bi bi-plus"></i> Tambah</a>
                    </div>

                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Akreditasi</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($prodi as $p)
                            <tr data-id="{{ $p->id }}">
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>
                                    <div>{{ $p->nama }}</div>
                                    <div class="fst-italic small text-secondary">{{ $p->nama_en }}</div>
                                </td>
                                <td>{{ $p->akreditasi }}</td>
                                <td>
                                    <a title="Detail" href="#" class="btn btn-sm btn-light"><i class="bi bi-search"></i>
                                        Detail</a>
                                    <button title="Hapus" type="button" class="btn btn-sm btn-light text-danger"
                                        data-bs-toggle="modal" data-bs-target="#hapusModal">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                    <a title="Ubah" href="#" class="btn btn-sm btn-light text-primary"><i
                                            class="bi bi-pencil"></i></a>
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
                Apakah Anda yakin ingin menghapus program studi ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-sm btn-danger">Hapus</button>
            </div>
        </div>
    </div>
</div>


@endsection

@push('scripts')

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const hapusButton = document.querySelector("button[data-bs-target='#hapusModal']");
        const hapusModal = document.getElementById("hapusModal");
        const modalTitle = hapusModal.querySelector(".modal-title");

        hapusButton.addEventListener("click", function (e) {
            const row = e.target.closest("tr");
            const dataId = row.getAttribute("data-id");
            const namaItem = row.querySelector("td:nth-child(2)").textContent; // Mengambil teks dari kolom "Nama"

            // Setel data dinamis dalam modal
            // modalTitle.textContent = "Konfirmasi Hapus Program Studi #" + dataId;
            hapusModal.querySelector(".modal-body").textContent = "Apakah Anda yakin ingin menghapus " + namaItem + "?";
        });
    });


</script>

@endpush
