@extends('mahasiswa.layout')
@section('title', 'Dashboard - ')

@section('content')

<?php
$namaAplikasi = \App\Utils\Skpi::getSettingByName('nama_aplikasi');
$namaInstitusiSingkat = \App\Utils\Skpi::getSettingByName('nama_institusi_singkat');
$teleponInstitusi = \App\Utils\Skpi::getSettingByName('telepon_institusi');
$alamatInstitusi = \App\Utils\Skpi::getSettingByName('alamat_institusi');
$emailInstitusi = \App\Utils\Skpi::getSettingByName('email_institusi');
$hpInstitusi = \App\Utils\Skpi::getSettingByName('hp_institusi');

// format and clear $hpInstitusi from non-numeric characters
$hpInsititusiNumber = trim($hpInstitusi);
$hpInsititusiNumber = preg_replace('/[^0-9]/', '', $hpInsititusiNumber);

?>
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            {{-- <li class="breadcrumb-item"><a href="#">Dashboard</a></li> --}}
            {{-- <li class="breadcrumb-item active"></li> --}}
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
            <div class="card info-card">
                <div class="card-body">
                    <h3 class="card-title">Selamat Datang, <strong>{{ Auth::user()->name }}</strong>!</h3>
                    <p class="card-text">Selamat datang di {{ $namaAplikasi }}. Silahkan pilih menu <i class="bi bi-list text-primary"></i> yang tersedia untuk
                        memulai.</p>

                    <p class="card-text">
                        <strong>Perhatian: </strong> Silahkan lengkapi data diri anda terlebih dahulu sebelum memulai
                        pengajuan SKPI.
                    </p>

                    <a href="{{ route('mahasiswa.profile.index') }}" class="btn btn-primary">Lengkapi Data Diri</a>

                    <br />
                    <br />

                    <hr />
                    <div class="text-start">
                        <h5>
                            <i class="bi bi-building"></i>
                            <strong>{{ $namaInstitusiSingkat }}</strong>
                        </h5>
                        <h5>
                            <strong>Informasi </strong>
                        </h5>
                        <p class="card-text">
                            <strong>Alamat: </strong> {{ $alamatInstitusi }}
                        </p>
                        <p class="card-text">
                            <strong>Telepon: </strong> {{ $teleponInstitusi }}
                        </p>
                        <p class="card-text">
                            <strong>No. HP / WA: </strong> <a class="text-primary" href="https://wa.me/{{ $hpInsititusiNumber }}"
                                target="_blank">{{ $hpInstitusi }}</a>
                        </p>
                        <p class="card-text">
                            <strong>Email: </strong> <a class="text-primary" href="mailto:{{ $emailInstitusi }}">{{ $emailInstitusi }}</a>
                        </p>
                    </div>
                </div>
            </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4 col-12 d-none">

            <!-- Recent Activity -->
            <div class="card">
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

                <div class="card-body">
                    <h5 class="card-title">Recent Activity <span>| Today</span></h5>

                    <div class="activity">

                        <div class="activity-item d-flex">
                            <div class="activite-label">32 min</div>
                            <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                            <div class="activity-content">
                                Quia quae rerum <a href="#" class="fw-bold text-dark">explicabo officiis</a> beatae
                            </div>
                        </div><!-- End activity item-->

                        <div class="activity-item d-flex">
                            <div class="activite-label">56 min</div>
                            <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                            <div class="activity-content">
                                Voluptatem blanditiis blanditiis eveniet
                            </div>
                        </div><!-- End activity item-->

                        <div class="activity-item d-flex">
                            <div class="activite-label">2 hrs</div>
                            <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                            <div class="activity-content">
                                Voluptates corrupti molestias voluptatem
                            </div>
                        </div><!-- End activity item-->

                        <div class="activity-item d-flex">
                            <div class="activite-label">1 day</div>
                            <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                            <div class="activity-content">
                                Tempore autem saepe <a href="#" class="fw-bold text-dark">occaecati voluptatem</a>
                                tempore
                            </div>
                        </div><!-- End activity item-->

                        <div class="activity-item d-flex">
                            <div class="activite-label">2 days</div>
                            <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                            <div class="activity-content">
                                Est sit eum reiciendis exercitationem
                            </div>
                        </div><!-- End activity item-->

                        <div class="activity-item d-flex">
                            <div class="activite-label">4 weeks</div>
                            <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                            <div class="activity-content">
                                Dicta dolorem harum nulla eius. Ut quidem quidem sit quas
                            </div>
                        </div><!-- End activity item-->

                    </div>

                </div>
            </div><!-- End Recent Activity -->

        </div><!-- End Right side columns -->

    </div>
</section>
@endsection
