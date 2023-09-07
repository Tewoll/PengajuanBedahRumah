@extends('pages.dinas.layouts.main')

@section('title', 'Kepala Dinas Dashboard')
@push('custom-css')
@endpush
@section('content')
    <!-- Page Content -->
    <div class="content">
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
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
@push('custom-script')
@endpush
