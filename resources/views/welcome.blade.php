<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{ url('assets/media/favicons/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ url('assets/media/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('assets/media/favicons/apple-touch-icon-180x180.png') }}">
    <!-- END Icons -->


    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ url('assets/js/plugins/slick-carousel/slick.css') }}">
    <link rel="stylesheet" href="{{ url('assets/js/plugins/slick-carousel/slick-theme.css') }}">

    <!-- Stylesheets -->

    <!-- Fonts and Codebase framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&display=swap">
    <link rel="stylesheet" id="css-main" href="{{ url('assets/css/codebase.min.css') }}">
</head>

<body>
    <div id="page-container" class="page-header-fixed page-header-glass main-content-boxed">
        <!-- Header -->
        {{-- <header id="page-header">
            <!-- Header Content -->
            <div class="content-header">
                <!-- Left Section -->
                <div class="space-x-1">
                    <div>
                        <span class="smini-visible fw-bold tracking-wide fs-lg">
                            c<span class="text-primary">b</span>
                        </span>
                        <a class="link-fx fw-bold tracking-wide mx-auto" href="/">
                            <span class="smini-hidden">
                                <i class="fa fa-fire text-primary"></i>
                                <span class="fs-4 text-dual">code</span><span class="fs-4 text-primary">base</span>
                            </span>
                        </a>
                    </div>
                </div>
                <!-- END Left Section -->

                <!-- Right Section -->
                <div class="space-x-1">
                    <div class="dropdown d-inline-block">
                        @if (Route::has('login'))
                            <div class="sm:fixed sm:top-0 sm:right-0 text-right z-10">
                                @auth
                                    <a href="{{ url('/dashboard') }}"
                                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                                @else
                                    <button type="button" class="btn btn-sm btn-alt-secondary"
                                        id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="fa fa-user d-sm-none"></i>
                                        <span class="d-none d-sm-inline-block fw-semibold">Login / Register</span>
                                        <i class="fa fa-angle-down opacity-50 ms-1"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                        aria-labelledby="page-header-user-dropdown">
                                        <div class="p-2">
                                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                href="{{ route('login') }}">
                                                <span>Login</span>
                                                <i class="si si-login text-info opacity-75"></i>
                                            </a>
                                            @if (Route::has('register'))
                                                <a href="{{ route('register') }}"
                                                    class="dropdown-item d-flex align-items-center justify-content-between space-x-1">
                                                    <span>Register</span>
                                                    <i class="si si-user-follow text-success opacity-75"></i>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                @endauth
                            </div>
                        @endif
                    </div>
                    <!-- END Right Section -->
                </div>
                <!-- END Header Content -->

                <!-- Header Search -->
                <div id="page-header-search" class="overlay-header bg-body-extra-light">
                    <div class="content-header">
                        <form class="w-100" action="be_pages_generic_search.html" method="POST">
                            <div class="input-group">
                                <!-- Close Search Section -->
                                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                <button type="button" class="btn btn-secondary" data-toggle="layout"
                                    data-action="header_search_off">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                                <!-- END Close Search Section -->
                                <input type="text" class="form-control" placeholder="Search or hit ESC.."
                                    id="page-header-search-input" name="page-header-search-input">
                                <button type="submit" class="btn btn-secondary">
                                    <i class="fa fa-fw fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END Header Search -->

                <!-- Header Loader -->
                <!-- Please check out the Activity page under Elements category to see examples of showing/hiding it -->
                <div id="page-header-loader" class="overlay-header bg-primary">
                    <div class="content-header">
                        <div class="w-100 text-center">
                            <i class="far fa-sun fa-spin text-white"></i>
                        </div>
                    </div>
                </div>
                <!-- END Header Loader -->
            </div>
        </header>
        <!-- END Header --> --}}

        <!-- Header -->
        <header id="page-header">
            <!-- Header Content -->
            <div class="content-header">
                <!-- Left Section -->
                <div class="space-x-1 d-flex align-items-center space-x-2">
                    <!-- Logo -->
                    <a class="link-fx fw-bold" href="/">
                        <i class="fa fa-building text-primary"></i>
                        <span class="fs-4 text-dual">bedah</span><span class="fs-4 text-primary">Rumah</span>
                    </a>
                    <!-- END Logo -->

                    <!-- Version -->
                    <span
                        class="d-inline-block fs-xs fw-medium bg-primary-dark text-white rounded-pill py-1 px-2">1.0</span>
                    <!-- END Version -->
                </div>
                <!-- END Left Section -->

                <!-- Right Section -->
                <div class="space-x-1">
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <a class="btn btn-alt-secondary px-3" data-toggle="layout" data-action="dark_mode_toggle"
                        href="javascript:void(0)">
                        <i class="fa fa-burn"></i>
                    </a>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/') }}"
                                class="btn btn-alt-secondary px-3 d-none d-sm-inline-block">Dashboard</a>
                        @else
                            <a class="btn btn-alt-primary px-3" href="{{ route('login') }}">
                                <i class="fa fa-user opacity-50"></i>
                                <span class="ms-1 d-none d-sm-inline-block">Login</span>
                            </a>
                            {{-- @if (Route::has('register'))
                                <a class="btn btn-alt-primary px-3" href="{{ route('register') }}">
                                    <i class="fa fa-user opacity-50"></i>
                                    <span class="ms-1 d-none d-sm-inline-block">Register</span>
                                </a>
                            @endif --}}
                        @endauth
                    @endif
                </div>
                <!-- END Right Section -->
            </div>
            <!-- END Header Content -->
        </header>
        <!-- END Header -->
        <!-- Main Container -->
        <main id="main-container">
            <!-- Page Content -->
            <div class="bg-body-extra-light hero-bubbles">
                <span class="hero-bubble hero-bubble-lg bg-warning" style="top: 20%; left: 10%;"></span>
                <span class="hero-bubble bg-success" style="top: 20%; left: 80%;"></span>
                <span class="hero-bubble hero-bubble-sm bg-corporate" style="top: 40%; left: 25%;"></span>
                <span class="hero-bubble hero-bubble-lg bg-earth" style="top: 10%; left: 20%;"></span>
                <span class="hero-bubble hero-bubble-lg bg-pulse" style="top: 30%; left: 90%;"></span>
                <span class="hero-bubble hero-bubble-lg bg-danger" style="top: 35%; left: 20%;"></span>
                <span class="hero-bubble hero-bubble-lg bg-warning" style="top: 60%; left: 35%;"></span>
                <span class="hero-bubble bg-info" style="top: 60%; left: 80%;"></span>
                <span class="hero-bubble hero-bubble-lg bg-flat" style="top: 75%; left: 70%;"></span>
                <span class="hero-bubble hero-bubble-lg bg-earth" style="top: 75%; left: 10%;"></span>
                <span class="hero-bubble bg-elegance" style="top: 90%; left: 90%;"></span>
                <div class="position-relative d-flex align-items-center">
                    <div class="content content-full">
                        <div class="row g-6 w-100 py-7 overflow-hidden">
                            <div
                                class="col-md-7 order-md-last py-4 d-md-flex align-items-md-center justify-content-md-end">
                                <img class="img-fluid" src="{{ asset('assets/media/photos/foto.jpg') }}"
                                    alt="Hero Promo">
                            </div>
                            <div class="col-md-5 py-4 d-flex align-items-center">
                                <div class="text-center text-md-start">
                                    <h1 class="fw-bold fs-2 mb-3">
                                        Sistem Aplikasi Pengajuan Bedah Rumah
                                    </h1>
                                    <p class="text-muted fw-medium mb-4">
                                        Sistem ini adalah sebuah platform atau perangkat lunak yang dirancang untuk memudahkan proses pengajuan dan penilaian permohonan pembenahan atau renovasi rumah. Tujuannya adalah untuk mengoptimalkan efisiensi dan transparansi dalam mengurus permohonan bedah rumah, baik dari pihak pemohon maupun pihak yang bertanggung jawab dalam menilai dan memproses permohonan tersebut. Melalui sistem ini, langkah-langkah dalam proses tersebut dapat disederhanakan dan diotomatisasi, membawa manfaat yang signifikan bagi semua pihak yang terlibat.
                                    </p>
                                    <a class="btn btn-alt-primary py-3 px-4" href="{{ url('/login') }}">
                                        <i class="fa fa-arrow-right opacity-50 me-1"></i> Masuk ke Dashboard
                                    </a>
                                </div>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Hero -->
            <div class="position-relative bg-body-extra-light">
                <div class="position-absolute top-0 end-0 bottom-0 start-0 bg-body-light -skew-y-1"></div>
                <div class="position-relative">
                    <div class="content content-full">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="accordion acc-pi acc-pi-pl" id="produkLayanan">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTwo">
                                            <button class="accordion-button d-flex " type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                aria-expanded="false" aria-controls="collapseTwo">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-file-text me-3">
                                                    <path
                                                        d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z">
                                                    </path>
                                                    <polyline points="14 2 14 8 20 8"></polyline>
                                                    <line x1="16" y1="13" x2="8"
                                                        y2="13">
                                                    </line>
                                                    <line x1="16" y1="17" x2="8"
                                                        y2="17">
                                                    </line>
                                                    <polyline points="10 9 9 9 8 9"></polyline>
                                                </svg>
                                                <span>Persyaratan</span>
                                            </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse show"
                                            aria-labelledby="headingTwo" data-bs-parent="#produkLayanan">
                                            <div class="accordion-body px-md-5">
                                                <ol class="mb-0">
                                                    <li>Surat keterangan kepemilikan tanah, baik tanah bersetifikat atau
                                                        tanah Desa Adat</li>
                                                    <li>Fotocopy KTP dan KK</li>
                                                    <li>Foto Rumah yang dibedah</li>
                                                    <li>Proposal Pengajuan dari Desa</li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingThree">
                                            <button class="accordion-button d-flex" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                aria-expanded="false" aria-controls="collapseThree">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-git-pull-request me-3">
                                                    <circle cx="18" cy="18" r="3"></circle>
                                                    <circle cx="6" cy="6" r="3"></circle>
                                                    <path d="M13 6h3a2 2 0 0 1 2 2v7"></path>
                                                    <line x1="6" y1="9" x2="6"
                                                        y2="21">
                                                    </line>
                                                </svg>
                                                <span>Sistem, Mekanisme dan Prosedur</span>
                                            </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse show"
                                            aria-labelledby="headingThree" data-bs-parent="#produkLayanan">
                                            <div class="accordion-body px-md-5">
                                                {{-- <div class="text-center">
                                                    <img src="https://sippn.menpan.go.id/images/article/large/prosedur-bedah-20230519123425.JPG"
                                                        alt="" style="max-width: 100%;">
                                                </div> --}}
                                                <ol class="mb-0">
                                                    <li>Pemohon dari perorangan/kelompok/Desa/Kelurahan mengajukan
                                                        permohonan sesuai dengan persyaratan </li>
                                                    <li>Permohonan diverifikasi
                                                        • Jika permohonan tidak layak, pemohon diberikan informasi
                                                        • Jika permohonan layak, permohonan dibuatkan rekomendasi
                                                    </li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingFour">
                                            <button class="accordion-button d-flex" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                                aria-expanded="false" aria-controls="collapseFour">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-clock me-3">
                                                    <circle cx="12" cy="12" r="10"></circle>
                                                    <polyline points="12 6 12 12 16 14"></polyline>
                                                </svg>
                                                <span>Waktu Penyelesaian</span>
                                            </button>
                                        </h2>
                                        <div id="collapseFour" class="accordion-collapse collapse show"
                                            aria-labelledby="headingFour" data-bs-parent="#produkLayanan">
                                            <div class="accordion-body px-md-5">
                                                Jangka Waktu berdasarkan dari verifikasi hingga persetujuan dari Kepala Dinas.
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingFive">
                                            <button class="accordion-button d-flex" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseFive"
                                                aria-expanded="false" aria-controls="collapseFive">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-info me-3">
                                                    <circle cx="12" cy="12" r="10"></circle>
                                                    <line x1="12" y1="16" x2="12"
                                                        y2="12">
                                                    </line>
                                                    <line x1="12" y1="8" x2="12.01"
                                                        y2="8">
                                                    </line>
                                                </svg>
                                                <span>Biaya / Tarif</span>
                                            </button>
                                        </h2>
                                        <div id="collapseFive" class="accordion-collapse collapse show"
                                            aria-labelledby="headingFive" data-bs-parent="#produkLayanan">
                                            <div class="accordion-body px-md-5">
                                                <p>Tidak dipungut biaya</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingSix">
                                            <button class="accordion-button d-flex" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseSix"
                                                aria-expanded="false" aria-controls="collapseSix">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-tag me-3">
                                                    <path
                                                        d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z">
                                                    </path>
                                                    <line x1="7" y1="7" x2="7.01"
                                                        y2="7">
                                                    </line>
                                                </svg>
                                                <span>Produk Pelayanan</span>
                                            </button>
                                        </h2>
                                        <div id="collapseSix" class="accordion-collapse collapse show"
                                            aria-labelledby="headingSix" data-bs-parent="#produkLayanan">
                                            <div class="accordion-body px-md-5">
                                                <p>Rumah Layak Huni</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- END Main Container -->

        <!-- Footer -->
        <footer id="page-footer">
            <div class="content py-3">
                <div class="row fs-sm">
                    <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-end">
                        @2023 by <a class="fw-semibold" href="javascript:void()" target="_blank">TewollArt - Software
                            Engineer</a>
                    </div>
                    <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-start">
                        <a class="fw-semibold" href="javascript:void()" target="_blank">bedahRumah 1.0</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- END Footer -->
    </div>
    <!-- END Page Container -->

    <!--
        Codebase JS

        Core libraries and functionality
        webpack is putting everything together at assets/_js/main/app.js
    -->
    <script src="{{ url('assets/js/codebase.app.min.js') }}"></script>

    <!-- jQuery (required for Select2 + jQuery Validation plugins) -->
    <script src="{{ url('assets/js/lib/jquery.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ url('assets/js/plugins/slick-carousel/slick.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ url('assets/js/pages/be_comp_onboarding.min.js') }}"></script>
</body>

</html>
