@extends('pages.user.layouts.main')

@section('title', 'Data Pengajuan')

@push('custom-css')
    <style>

    </style>
@endpush

@section('content')
    <main id="main-container" style="padding-top: 1em;">
        <div class="content">
            <nav class="breadcrumb push bg-body-extra-light rounded push px-4 py-2">
                <a class="breadcrumb-item" href="{{ url('/') }}"><i class="fas fa-home me-1"></i>Home</a>
                <span class="breadcrumb-item active">Data Pengajuan</span>
            </nav>
            <div class="block block-rounded push">
                <div class="row text-center">
                    <div class="col-6 py-4">
                        <div class="fs-1 fw-bold">{{ $dataPengajuan->where('status_proses', '<>', 'Selesai')->count() }}
                        </div>
                        <div class="fw-semibold text-muted text-uppercase">Diproses</div>
                    </div>
                    <div class="col-6 py-4">
                        <div class="fs-1 fw-bold">{{ $dataPengajuan->where('status_proses', '=', 'Selesai')->count() }}
                        </div>
                        <div class="fw-semibold text-muted text-uppercase">Selesai</div>
                    </div>
                </div>
            </div>
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Data Pengajuan</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option"
                            data-action="fullscreen_toggle"></button>
                        <button type="button" class="btn-block-option" data-toggle="block-option"
                            data-action="state_toggle" data-action-mode="demo">
                            <i class="si si-refresh"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <div class="content-heading d-flex justify-content-between align-items-center">
                        <span></span>
                        <a href="{{ route('data-pengajuan.create') }}" class="btn btn-outline-success btn-sm me-1 mb-1">
                            <i class="si si-plus opacity-50 me-1"></i> Pengajuan Baru
                        </a>
                    </div>
                    <div class="block block-rounded overflow-hidden">
                        <div id="accordion" role="tablist" aria-multiselectable="true">
                            @forelse ($dataPengajuan as $data)
                                <div class="block block-bordered block-rounded mb-2 overflow-hidden">
                                    <div class="block-header" role="tab" id="accordion_h1">
                                        <div class="block-title">
                                            <a class="fw-semibold collapsed" data-bs-toggle="collapse"
                                                data-bs-parent="#accordion" href="#accordion_q{{ $loop->iteration }}"
                                                aria-expanded="false"
                                                aria-controls="accordion_q{{ $loop->iteration }}">Pengajuan
                                                {{ $loop->iteration }}</a>
                                            <div class="fw-medium text-muted">
                                                {{ \Carbon\Carbon::parse($data->submitted_at)->isoFormat('D MMMM Y') }}
                                            </div>
                                            {{-- <a class="fs-sm fw-medium text-info" data-bs-toggle="collapse"
                                                data-bs-parent="#accordion" href="#accordion_q{{ $loop->iteration }}"
                                                aria-expanded="false" aria-controls="accordion_q{{ $loop->iteration }}">
                                                <cite>click to detail <i class="fa fa-info-circle text-info"></i></cite>
                                            </a> --}}
                                        </div>
                                        <div class="block-options">
                                            @if ($data->status_data == 'Data Perlu Perbaikan')
                                                {{-- <button type="button" class="btn-block-option" data-toggle="block-option"
                                                    data-action="state_toggle" data-action-mode="demo">
                                                    <i class="fas fa-edit"></i>
                                                </button> --}}
                                                <a class="btn-border btn-block-option m-1" href="{{ route('data-pengajuan.edit', $data->id) }}">
                                                    <i class="fas fa-pencil-alt me-1"></i> Edit
                                                </a>
                                            @endif
                                            <a href="{{ route('data-pengajuan.show', $data->id) }}" class="btn-block-option">
                                                <i class="fas fa-eye me-1"></i> Detail
                                            </a>
                                        </div>
                                    </div>
                                    {{-- <div id="accordion_q{{ $loop->iteration }}" class="collapse" role="tabpanel"
                                        aria-labelledby="accordion_h{{ $loop->iteration }}" data-bs-parent="#accordion"
                                        style=""> --}}
                                        <div class="block-content">
                                            <div class="fs-sm fw-medium mb-0">
                                                Status : 
                                                <cite class="{{ $data->status_data == 'Data Perlu Perbaikan' ? 'text-danger' : 'text-muted' }}">
                                                    {{ $data->status_data }}
                                                </cite>
                                                @if ($data->status_data == 'Data Perlu Perbaikan')
                                                    <br><p class="text-muted"><small>Keterangan :

                                                        {{ $data->keterangan }}</small></p>
                                                @endif
                                                   
                                            </div>
                                            @if ($data->status_data != 'Data Pengajuan Baru')
                                                <div class="fs-sm text-muted">
                                                    <strong class="fw-semibold">by Admin:</strong> <a
                                                        href="javascript:void(0)">{{ $data->admin->name }}</a> -
                                                    <cite class="fs-sm">Data diproses :
                                                        {{ \Carbon\Carbon::parse($data->processed_at)->isoFormat('D MMMM Y') }}
                                                    </cite>
                                                    @if ($data->status_data != 'Data Perlu Perbaikan')
                                                        <br><p class="text-muted"><small>Keterangan :

                                                            {{ $data->keterangan }}</small></p>
                                                        <strong class="fw-semibold">Verifikator :</strong>
                                                        {{ $data->verifikasi->user->name }} -
                                                        <cite class="fs-sm">Jadwal Kunjungan :
                                                            {{ \Carbon\Carbon::parse($data->verifikasi->jadwal_kunjungan)->isoFormat('D MMMM Y') }}
                                                        </cite>
                                                    @endif
                                                </div>
                                            @endif
                                            <div class="fs-sm fw-medium text-muted mb-0">Status Proses :
                                                {{ $data->status_proses }}
                                            </div>
                                            <div class="fs-sm fw-medium text-muted mb-3">Status Pengajuan:
                                                @if ($data->status_pengajuan == 'Disetujui')
                                                    <i class="fa fa-check-circle text-success me-1"></i>Disetujui -
                                                    <cite class="fs-sm text-muted">
                                                        {{ \Carbon\Carbon::parse($data->completed_at)->isoFormat('D MMMM Y') }}
                                                    </cite><br><br>
                                                    <p class="text-muted"><small>Keterangan :
                                                            {{ $data->keterangan }}</small></p>
                                                @elseif ($data->status_pengajuan == 'Ditolak')
                                                    <i class="fa fa-times-circle text-danger me-1"> </i>Ditolak -
                                                    <cite class="fs-sm text-muted">
                                                        {{ \Carbon\Carbon::parse($data->completed_at)->isoFormat('D MMMM Y') }}
                                                    </cite><br>
                                                    <p class="text-muted"><small>Keterangan :
                                                            {{ $data->keterangan }}</small></p>
                                                @else
                                                    -
                                                @endif
                                            </div>
                                        </div>
                                    {{-- </div> --}}
                                </div>
                            @empty
                                <div class="block block-bordered block-rounded mb-2 overflow-hidden">
                                    <div class="block-content" role="tab" id="accordion_h_empty">
                                        <p class="text-center">
                                            Tidak ada data pengajuan saat ini.
                                        </p>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@push('custom-script')
@endpush
