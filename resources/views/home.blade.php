<?php

$logoAplikasiUrl = \App\Utils\Skpi::getAssetUrl(\App\Utils\Skpi::getSettingByName('logo_aplikasi'));
$namaAplikasi = \App\Utils\Skpi::getSettingByName('nama_aplikasi');
$namaInstitusiSingkat = \App\Utils\Skpi::getSettingByName('nama_institusi_singkat');

$authUser = auth()->user();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi SKPI</title>

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    {{--
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet"> --}}

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <!-- =======================================================
      * Template Name: NiceAdmin
      * Updated: Sep 18 2023 with Bootstrap v5.3.2
      * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      * Author: BootstrapMade.com
      * License: https://bootstrapmade.com/license/
      ======================================================== -->

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>

    <main>
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    <img src="{{ $logoAplikasiUrl }}" alt="Logo" class="img-fluid">
                                    <span class="d-none d-lg-block">{{ $namaAplikasi }}</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                @if (!$authUser)
                                <div class="card-body">
                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Halaman Login</h5>
                                        <p class="text-center small">Masukkan kredensial Anda untuk login</p>
                                    </div>

                                    <form class="row g-3 needs-validation" novalidate
                                        action="{{ route('auth.post-login') }}" method="POST">
                                        @csrf

                                        @if (session()->has('error'))
                                        <div class="col-12">
                                            <div class="alert alert-danger" role="alert">
                                                {{ session()->get('error') }}
                                            </div>
                                        </div>
                                        @endif
                                        @if (session()->has('success'))
                                        <div class="col-12">
                                            <div class="alert alert-success" role="alert">
                                                {{ session()->get('success') }}
                                            </div>
                                        </div>
                                        @endif

                                        <div class="col-12">
                                            <label for="uid" class="form-label">NIM / User ID</label>
                                            <input type="text" id="uid" name="uid"
                                                class="form-control @error('uid') is-invalid @enderror" required
                                                placeholder="Masukkan NIM / User ID Anda" value="{{ old('uid') }}" />
                                            @error('uid')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <label for="password" class="form-label">Kata Sandi</label>
                                            <input type="password" id="password" name="password"
                                                class="form-control @error('password') is-invalid @enderror" required
                                                autocomplete="new-password" placeholder="Masukkan kata sandi Anda"
                                                value="{{ old('password') }}" />
                                            @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        {{-- <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    value="true" id="rememberMe">
                                                <label class="form-check-label" for="rememberMe">Remember me</label>
                                            </div>
                                        </div> --}}
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Login</button>
                                        </div>
                                        {{-- <div class="col-12">
                                            <p class="small mb-0">Don't have account? <a
                                                    href="pages-register.html">Create an account</a></p>
                                        </div> --}}
                                    </form>

                                </div>
                                @else
                                <div class="card-body" style="padding: 0 75px 35px">
                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Anda sudah Login</h5>
                                        <p class="text-center small">Anda sudah login sebagai
                                            <strong>{{ $authUser->name }}</strong>
                                        </p>
                                        <div class="row">
                                            <div class="col-12">
                                                <a href="{{ route('auth.logout') }}" class="btn btn-danger w-100"
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                                <form id="logout-form" action="{{ route('auth.logout') }}" method="GET"
                                                    class="d-none">
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                @endif

                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
