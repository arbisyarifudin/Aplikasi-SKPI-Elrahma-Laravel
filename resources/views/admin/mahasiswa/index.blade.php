@extends('admin.layout')
@section('title', 'Mahasiswa - ')

@section('content')
<div class="pagetitle">
    <h1>Mahasiswa</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item">Mahasiswa</li>
            <li class="breadcrumb-item active">List</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col-12">
            <div class="card overflow-auto">

                <div class="filter d-none">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                            <h6>Filter</h6>
                        </li>

                        <li><a class="dropdown-item" href="#">Today</a></li>
                        <li><a class="dropdown-item" href="#">This Month</a></li>
                        <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                </div>

                <div class="card-body" style="min-height: 300px">

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="card-title">Data Mahasiswa</div>
                        <button type="button" class="btn btn-sm btn-primary"><i class="bi bi-arrow-counterclockwise"></i> Sinkronkan data</button>
                    </div>

                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">NIM</th>
                                <th scope="col">Prodi</th>
                                <th scope="col">Thn. Masuk</th>
                                <th scope="col">Thn. Lulus</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mahasiswa as $m)
                            <tr data-id="{{ $m->id }}">
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ $m->nama }}</td>
                                <td>{{ $m->nim }}</td>
                                <td>
                                    <div>{{ $m->prodi_nama }}</div>
                                    <div class="fst-italic small text-secondary">{{ $m->prodi_nama_en }}</div>
                                </td>
                                <td>{{ $m->tahun_masuk }}</td>
                                <td>{{ $m->tahun_lulus }}</td>
                                <td>
                                    <a title="Detail" href="#" class="btn btn-sm btn-light"><i class="bi bi-search"></i> Detail</a>
                                    {{-- <a href="#" class="btn btn-sm btn-light"><i class="bi bi-trash"></i></a> --}}
                                    {{-- <button title="Hapus" type="button" class="btn btn-sm btn-light text-danger"
                                        data-bs-toggle="modal" data-bs-target="#hapusModal">
                                        <i class="bi bi-trash"></i>
                                    </button> --}}
                                    {{-- <a title="Ubah" href="#" class="btn btn-sm btn-light text-primary"><i class="bi bi-pencil"></i></a> --}}
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
                Apakah Anda yakin ingin menghapus mahasiswa ini?
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
            // modalTitle.textContent = "Konfirmasi Hapus Mahasiswa #" + dataId;
            hapusModal.querySelector(".modal-body").textContent = "Apakah Anda yakin ingin menghapus " + namaItem + "?";
        });
    });


</script>

@endpush
