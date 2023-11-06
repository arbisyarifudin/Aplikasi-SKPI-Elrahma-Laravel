@extends('admin.layout')
@section('title', 'Dokumen SKPI - ')

@section('content')
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
                        <a href="{{ route('admin.dokumen.create') }}" class="btn btn-sm btn-primary"><i
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
                                <th scope="col">No. Dok</th>
                                <th scope="col">Tgl. Dok</th>
                                <th scope="col">File</th>
                                <th scope="col">Nama Mahasiswa</th>
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
                                <td>{{ $d->nomor }}</td>
                                <td>{{ $d->tanggal }}</td>
                                <td>
                                    <a href="{{ asset('storage/dokumen/' . $d->file) }}" target="_blank"
                                        class="btn btn-sm btn-light"><i class="bi bi-file-earmark"></i> Lihat</a>
                                </td>
                                <td>
                                    <div>{{ $d->nama_mahasiswa }}</div>
                                    <div class="fst-italic small text-secondary">NIM: {{ $d->nim_mahasiswa }}</div>
                                </td>
                                <td>
                                    <div>{{ $d->nama_prodi }}</div>
                                    <div class="fst-italic small text-secondary">{{ $d->nama_prodi_en }}</div>
                                </td>
                                <td>{{ $d->tahun_lulus }}</td>
                                <td>{{ $d->dibuat_pada }}</td>
                                <td>
                                    <a title="Detail" href="#" class="btn btn-sm btn-light"><i class="bi bi-search"></i>
                                        Detail</a>
                                    <button title="Hapus" type="button" class="btn btn-sm btn-light text-danger"
                                        data-bs-toggle="modal" data-bs-target="#hapusModal" data-id="{{ $d->id }}">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                    {{-- <a title="Ubah" href="{{ route('admin.dokumen.edit', ['id' => $d->id]) }}" class="btn btn-sm btn-light text-primary"><i
                                            class="bi bi-pencil"></i></a> --}}
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
            const namaItem = row.querySelector("td:nth-child(2) > div").textContent; // Mengambil teks dari kolom "Nama"
            const form = hapusModal.querySelector("form");
            // const inputId = form.querySelector("input[name='id']");
            const buttonHapus = hapusModal.querySelector("button[type='button']");
            const url = "{{ route('admin.dokumen.destroy', ':id') }}";
            const urlDelete = url.replace(":id", dataId);

            // Setel URL form hapus
            form.setAttribute("action", urlDelete);

            // Setel data dinamis dalam form
            // inputId.value = dataId;

            // Setel data dinamis dalam modal
            // modalTitle.textContent = "Konfirmasi Hapus Dokumen SKPI #" + dataId;
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
