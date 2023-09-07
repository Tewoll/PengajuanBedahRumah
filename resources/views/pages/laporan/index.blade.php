@extends($layouts)

@section('title', 'Detail Laporan Pengajuan')

@push('custom-css')
@endpush
@section('content')
    <!-- Page Content -->

    <div class="content">
        <nav class="breadcrumb push bg-transparent rounded push px-4 py-2">
            <a class="breadcrumb-item" href="{{ url('/') }}"><i class="fas fa-home me-1"></i>Home</a>
            <span class="breadcrumb-item active">Data Laporan
                Pengajuan </span>
        </nav>
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Data Laporan
                Pengajuan<small></small>
                </h3>
                <div class="block-options">
                    <button type="button" class="btn-block-option"id="print-button">
                        <i class="fas fa-print"></i>
                    </button>
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
                            <th style="width: 15%;">Hasil</th>
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
                                    <span class="badge bg-info">{{ $data->status_proses }}</span><br>
                                    <span>
                                        {{ \Carbon\Carbon::parse($data->completed_at)->isoFormat('D MMMM Y') }}
                                    </span>
                                </td>
                                <td>
                                    <span
                                        class="badge {{ $data->status_pengajuan == 'Disetujui' ? 'bg-success' : 'bg-danger' }}">{{ $data->status_pengajuan }}</span><br>
                                    <b>Kepala Dinas</b><br>
                                    <span>
                                        {{ \Carbon\Carbon::parse($data->approved_at)->isoFormat('D MMMM Y') }}
                                    </span>
                                </td>
                                <td><b>{{ $data->admin->name }} </b><br>
                                    <span>
                                        {{ \Carbon\Carbon::parse($data->processed_at)->isoFormat('D MMMM Y') }}
                                    </span>
                                </td>
                                <td>
                                    <b>{{ $data->verifikasi->user->name }} </b> <br>
                                    <span class="badge bg-success">Sudah Di
                                        Verifikasi</span><br>
                                    <span>
                                        {{ \Carbon\Carbon::parse($data->verifikasi->updated_at)->isoFormat('D MMMM Y') }}
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
                                            <a href="{{ route('laporan.show', $data->verifikasi->id) }}"
                                                class="btn btn-sm btn-info js-bs-tooltip-enabled" data-bs-toggle="tooltip"
                                                title="" data-bs-original-title="Detail">
                                                <i class="fas fa-eye"></i>
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
