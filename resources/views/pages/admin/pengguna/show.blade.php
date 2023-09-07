@extends('pages.admin.layouts.main')

@section('title', 'Detail Data Pengguna')

@section('content')
    <div class="content">
        <nav class="breadcrumb push bg-transparent rounded push px-4 py-2">
            <a class="breadcrumb-item" href="{{ route('pengguna.index') }}"><i class="fas fa-home me-1"></i>Data Pengguna</a>
            <span class="breadcrumb-item active">Detail Data</span>
        </nav>
        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex justify-content-between align-items-center">
                <h3 class="block-title">
                    Detail Data Pengguna <small>System</small>
                </h3>
            </div>

            @if ($user->email_verifivied_at == null)
                <div class="block-content">
                    <div class="alert alert-warning d-flex align-items-center" role="alert">
                        <i class="fa fa-fw fa-exclamation-triangle me-3 ms-2"></i>
                        <cite class="mb-0">
                            Harap verifikasi melalui email yang terdaftar agar dapat digunakan untuk login kedalam sistem!
                            <br>
                            <small>Untuk password general sistem = "password", di harapkan untuk mengubah password setelah
                                dapat login kedalam sistem.</small>
                        </cite>
                    </div>

                </div>
            @endif
            <div class="block-content">
                <div class="row items-push p-4">
                    <div class="col-md-12 text-center">
                        <div class="block block-rounded text-center">
                            <div class="block-content block-content-full">
                                <img class="img-avatar img-avatar96 img-avatar-thumb" src="{{ asset('assets/media/avatars/avatar6.jpg') }}"
                                    alt="">
                            </div>
                            <div class="block-content block-content-full block-content-sm bg-body-light">
                                <div class="fw-semibold mb-1">{{ $user->name }}</div>
                                <div class="fs-sm fw-medium text-muted">{{ implode(', ', $roles) }}</div>
                                <cite class="fs-sm fw-medium text-muted">username : {{ $user->username }} ||
                                    {{ $user->email }}</cite>
                            </div>
                            <div class="block-content block-content-full">
                                <a class="btn btn-sm btn-alt-primary" href="javascript:void(0)">
                                    <i class="fa fa-plus opacity-50 me-1"></i> Add
                                </a>
                                <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)">
                                    <i class="fa fa-user-circle opacity-50 me-1"></i>Profile
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
