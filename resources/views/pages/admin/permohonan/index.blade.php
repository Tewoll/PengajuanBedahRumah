@extends('pages.admin.layouts.main')

@section('title', 'Data Permohonan')

@section('content')
        <!-- Page Content -->
        <div class="content">
            <nav class="breadcrumb push bg-transparent rounded push px-4 py-2">
                <a class="breadcrumb-item" href="{{ url('/') }}"><i class="fas fa-home me-1"></i>Home</a>
                <span class="breadcrumb-item active">Data Permohonan</span>
            </nav>
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">
                        Data Permohonan <small>Masyarakat</small>
                    </h3>
                    <!-- <a href="{{ route('pengguna.create') }}" class="btn btn-outline-primary btn-sm me-1 mb-1">
                                            <i class="si si-plus opacity-50 me-1"></i> Add User
                                        </a> -->
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option"
                            data-action="fullscreen_toggle"></button>
                        <button type="button" class="btn-block-option" data-toggle="block-option"
                            data-action="state_toggle" data-action-mode="demo">
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
                                <th>Kelurahan</th>
                                <th>Kecamatan</th>
                                <th>Kabupaten</th>
                                <th style="width: 15%;">Status Data</th>
                                <th class="text-center" style="width: 10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataPengajuan as $data)
                                <tr class="text-center fs-sm">
                                    <td>
                                        {{ \Carbon\Carbon::parse($data->submitted_at)->isoFormat('D MMMM Y') }}
                                    </td>
                                    <td class="fw-semibold">{{ $data->user->dataDiri->nama }}</td>
                                    <td>
                                        {{ $data->user->dataDiri->village->name }}
                                    </td>
                                    <td>
                                        {{ $data->user->dataDiri->district->name }}
                                    </td>
                                    <td>
                                        {{ $data->user->dataDiri->regency->name }}
                                    <td>
                                        <span class="badge bg-info">{{ $data->status_data }}</span>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('permohonan.show', $data->id) }}" class="btn btn-sm btn-secondary js-bs-tooltip-enabled"
                                                data-bs-toggle="tooltip" title="" data-bs-original-title="Verifikasi">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            {{-- <button type="button" class="btn btn-sm btn-secondary js-bs-tooltip-enabled"
                                                data-bs-toggle="tooltip" title="" data-bs-original-title="Delete">
                                                <i class="fa fa-times"></i>
                                            </button> --}}
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
