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
                        <a href="{{ route('admin.prodi.create') }}" class="btn btn-sm btn-primary"><i class="bi bi-plus"></i> Tambah</a>
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
                                <th scope="col">Akreditasi</th>
                                <th scope="col">Jenjang</th>
                                <th scope="col">Gelar</th>
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
                                <td>{{ $p->jenjang_pendidikan_nama }}</td>
                                <td>
                                    <div>{{ $p->gelar }}</div>
                                    <div class="fst-italic small text-secondary">{{ $p->gelar_en }}</div>
                                </td>
                                <td>
                                    <a title="Ubah CPL" href="{{ route('admin.prodi.edit-cpl', ['id' => $p->id]) }}" class="btn btn-sm btn-light text-success fw-bold"><i class="bi bi-card-heading"></i> CPL</a>
                                    <a title="Ubah" href="{{ route('admin.prodi.edit', ['id' => $p->id]) }}" class="btn btn-sm btn-light text-primary"><i class="bi bi-pencil"></i></a>
                                    <button title="Hapus" type="button" class="btn btn-sm btn-light text-danger" data-bs-toggle="modal" data-bs-target="#hapusModal" data-id="{{ $p->id }}">
                                        <i class="bi bi-trash"></i>
                                    </button>
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


@endsection

@push('scripts')

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const hapusButton = document.querySelectorAll("button[data-bs-target='#hapusModal']");
        const hapusModal = document.getElementById("hapusModal");
        const modalTitle = hapusModal.querySelector(".modal-title");

        hapusButton.forEach(btn => {
            btn.addEventListener("click", function(e) {
                const dataId = this.dataset.id;
                console.log('dataId', dataId)

                const row = e.target.closest("tr");
                // const dataId = row.getAttribute("data-id");
                const namaItem = row.querySelector("td:nth-child(2) > div").textContent; // Mengambil teks dari kolom "Nama"
                const form = hapusModal.querySelector("form");
                // const inputId = form.querySelector("input[name='id']");
                const buttonHapus = hapusModal.querySelector("button[type='button']");
                const url = "{{ route('admin.prodi.destroy', ':id') }}";
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
    });
</script>

@endpush
