@extends('pages.user.layouts.main')

@section('title', 'User Dashboard')

@section('content')

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
            <div class="col-lg-12">
                @if ($dataPengajuan->where('status_pengajuan', 'Selesai')->count() > 0)
                    <div class="alert alert-warning" role="alert">
                        <p class="mb-0 text-center">
                            <small>
                                Saat ini Anda memiliki {{ $dataPengajuan->where('status_pengajuan', 'Selesai')->count() }}
                                pengajuan yang masih dalam proses
                                dari total {{ $dataPengajuan->count() }} pengajuan! <a class="alert-link"
                                    href="{{ route('data-pengajuan.index') }}">Lihat</a>
                            </small>
                        </p>
                    </div>
                @endif
                <a class="block block-rounded block-link-pop" href="javascript:void(0)">
                    <div class="block-content block-header-default">
                        <h5 class="fw-semibold mb-2">Anda dapat melakukan berbagai tindakan pada dashboard ini:</h5>
                        <ul>
                            <li class=" mb-1">Ajukan permohonan bedah rumah.</li>
                            <li class=" mb-1">Verifikasi status permohonan Anda.</li>
                            <li class=" mb-1">Periksa hasil verifikasi lapangan.</li>
                            <li class=" mb-1">Ubah informasi profil Anda.</li>
                            <li class=" mb-1">Keluar dari akun Anda.</li>
                        </ul>
                    </div>
                </a>
            </div>
        </div>

        <div class="alert alert-success text-center">
            <p>Terima kasih telah menggunakan Aplikasi Pengajuan Bedah Rumah. Jika Anda memiliki pertanyaan, hubungi tim
                kami.</p>
        </div>
    </div>
@endsection
