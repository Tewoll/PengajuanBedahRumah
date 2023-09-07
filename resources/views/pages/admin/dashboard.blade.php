{{-- @extends('pages.admin.layouts.main')

@section('title', 'Admin Dashboard')

@section('content')
@endsection --}}
@extends('pages.admin.layouts.main')

@section('title', 'Admin Dashboard')

@section('content')
    <!-- Page Content -->
    <div class="content">
        {{-- <div class="row g-sm mb-4">
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded block-bordered block-link-shadow text-center" href="javascript:void(0)">
                        <div class="block-content">
                            <p class="mt-1">
                                <i class="si si-badge fa-4x"></i>
                            </p>
                            <p class="fw-medium">Badges</p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded block-bordered block-link-shadow text-center" href="javascript:void(0)">
                        <div class="block-content">
                            <p class="mt-1">
                                <i class="si si-envelope fa-4x text-success"></i>
                            </p>
                            <p class="fw-medium">Inbox</p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded block-bordered block-link-shadow text-center" href="javascript:void(0)">
                        <div class="block-content">
                            <p class="mt-1">
                                <i class="si si-bag fa-4x text-danger"></i>
                            </p>
                            <p class="fw-medium">Cart</p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded block-bordered block-link-shadow text-center" href="javascript:void(0)">
                        <div class="block-content">
                            <p class="mt-1">
                                <i class="si si-bar-chart fa-4x text-corporate"></i>
                            </p>
                            <p class="fw-medium">Live Stats</p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded block-bordered block-link-shadow text-center" href="javascript:void(0)">
                        <div class="block-content">
                            <p class="mt-1">
                                <i class="si si-cloud-upload fa-4x text-flat"></i>
                            </p>
                            <p class="fw-medium">~ 7.5 MB/s</p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded block-bordered block-link-shadow text-center" href="javascript:void(0)">
                        <div class="block-content">
                            <p class="mt-1">
                                <i class="si si-chemistry fa-4x text-elegance"></i>
                            </p>
                            <p class="fw-medium">Lab</p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded block-bordered block-link-shadow text-center" href="javascript:void(0)">
                        <div class="block-content">
                            <p class="mt-1">
                                <i class="si si-diamond fa-4x text-info"></i>
                            </p>
                            <p class="fw-medium">Minecraft</p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded block-bordered block-link-shadow text-center" href="javascript:void(0)">
                        <div class="block-content">
                            <p class="mt-1">
                                <i class="si si-camera fa-4x text-muted"></i>
                            </p>
                            <p class="fw-medium">Videos</p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded block-bordered block-link-shadow text-center" href="javascript:void(0)">
                        <div class="block-content">
                            <p class="mt-1">
                                <i class="si si-support fa-4x text-warning"></i>
                            </p>
                            <p class="fw-medium">Support</p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded block-bordered block-link-shadow text-center" href="javascript:void(0)">
                        <div class="block-content">
                            <p class="mt-1">
                                <i class="si si-bubbles fa-4x text-pulse"></i>
                            </p>
                            <p class="fw-medium">Chat</p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded block-bordered block-link-shadow text-center" href="javascript:void(0)">
                        <div class="block-content">
                            <p class="mt-1">
                                <i class="si si-compass fa-4x text-earth"></i>
                            </p>
                            <p class="fw-medium">Locating..</p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded block-bordered block-link-shadow text-center" href="javascript:void(0)">
                        <div class="block-content">
                            <p class="mt-1">
                                <i class="si si-globe fa-4x"></i>
                            </p>
                            <p class="fw-medium">World Live</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Blank <small>Get Started</small></h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option"
                            data-action="fullscreen_toggle"></button>
                        <button type="button" class="btn-block-option" data-toggle="block-option"
                            data-action="pinned_toggle">
                            <i class="si si-pin"></i>
                        </button>
                        <button type="button" class="btn-block-option" data-toggle="block-option"
                            data-action="state_toggle" data-action-mode="demo">
                            <i class="si si-refresh"></i>
                        </button>
                        <button type="button" class="btn-block-option" data-toggle="block-option"
                            data-action="content_toggle"></button>
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <p>Create your own awesome project!</p>
                </div>
            </div> --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="block block-rounded text-end px-4">
                    <div class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                        <div class="text-start">
                            <h5 class="card-title text-primary display-6">Halo,
                                {{ ucwords(auth()->user()->name) }}!
                            </h5>
                            <p class="mb-4">
                                {{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM YYYY') }}
                            </p>
                            <h5>Selamat datang di Dashboard Sistem Pengajuan Bedah Rumah!</h5>
                            <cite class="text-muted"><small>Ini adalah halaman utama dashboard setelah Anda berhasil
                                    login.</small></cite>
                        </div>
                        <div class="d-none d-sm-block">
                            <i class="fa fa-laptop-code fa-6x opacity-25"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Donut</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option"
                                data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full text-center">
                        <!-- Donut Chart Container -->
                        <canvas id="js-chartjs-donut"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <!-- Bars Chart -->
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Bars</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option"
                                data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full text-center">
                        <!-- Bars Chart Container -->
                        <canvas id="js-chartjs-bars"></canvas>
                    </div>
                </div>
                <!-- END Bars Chart -->
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
