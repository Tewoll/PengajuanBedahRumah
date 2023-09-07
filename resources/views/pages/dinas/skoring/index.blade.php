@extends('pages.dinas.layouts.main')

@section('title', 'Skoring')
@push('custom-css')
@endpush
@section('content')
    <!-- Page Content -->

    <div class="content">
        <nav class="breadcrumb push bg-transparent rounded push px-4 py-2">
            <a class="breadcrumb-item" href="{{ url('/') }}"><i class="fas fa-home me-1"></i>Home</a>
            <span class="breadcrumb-item active">Data Verifikasi Lapangan</span>
        </nav>
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Data Verifikasi Lapangan <small></small>
                </h3>
                <div class="block-options">
                    <button type="button" class="btn-block-option" data-toggle="block-option"
                        data-action="fullscreen_toggle"></button>
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle"
                        data-action-mode="demo">
                        <i class="si si-refresh"></i>
                    </button>
                    <button type="button" class="btn-block-option" data-toggle="block-option"
                        data-action="content_toggle"></button>
                </div>
            </div>
            <div class="block-content block-content-full">
                <table class="table table-striped table-vcenter js-dataTable-responsive">
                    <thead>
                        <tr class="text-center">
                            <th>Tanggal</th>
                            <th>Nama</th>
                            <th style="width: 10%;">Status</th>
                            <th style="width: 15%;">Proses</th>
                            <th>Admin</th>
                            <th>Verifikator</th>
                            <th class="text-center" style="width: 15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataPengajuan as $data)
                            <tr class="text-center fs-xs">
                                <td>
                                    {{ \Carbon\Carbon::parse($data->submitted_at)->isoFormat('D MMMM Y') }}
                                </td>
                                <td class="fw-semibold">{{ $data->user->dataDiri->nama }}</td>
                                <td>
                                    <span class="badge bg-info">{{ $data->status_data }}</span>
                                </td>
                                <td>
                                    <span class="badge bg-info">{{ $data->status_proses }}</span>
                                </td>
                                <td>
                                {{-- {{ \Carbon\Carbon::parse($data->verifikasi->jadwal_kunjungan)->isoFormat('D MMMM Y') }}
                                <br> --}}<b>{{ $data->admin->name }} </b>
                                </td>
                                <td>
                                    {{-- {{ \Carbon\Carbon::parse($data->verifikasi->jadwal_kunjungan)->isoFormat('D MMMM Y') }}
                                    <br> --}}<b>{{ $data->verifikasi->user->name }} </b> <br>
                                        <span class="badge bg-success">Sudah Di Verifikasi</span><br>
                                        <span>
                                            {{ \Carbon\Carbon::parse($data->updated_at)->isoFormat('D MMMM Y') }}
                                        </span>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        @if (!empty($data->verifikasi->status == true))
                                            {{-- <a href="{{ route('verifikasi-lanjutan.create', $data->id) }}"
                                                class="btn btn-sm btn-secondary js-bs-tooltip-enabled"
                                                data-bs-toggle="tooltip" title="" data-bs-original-title="Verifikasi">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a> --}}
                                            <a href="{{ route('verifikasi-lanjutan.show', $data->verifikasi->id) }}"
                                                class="btn btn-sm btn-success js-bs-tooltip-enabled" data-bs-toggle="tooltip"
                                                title="" data-bs-original-title="Penilaian">
                                                <i class="fas fa-pencil-square"></i>
                                            </a>
                                        @else
                                            -
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
@push('custom-script')
@endpush
