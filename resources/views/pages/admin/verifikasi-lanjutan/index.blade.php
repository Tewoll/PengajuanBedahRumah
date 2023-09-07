@extends('pages.admin.layouts.main')

@section('title', 'Data Verifikasi Lapangan')

@section('content')
        <!-- Page Content -->
        <div class="content">
            <nav class="breadcrumb push bg-transparent rounded push px-4 py-2">
                <a class="breadcrumb-item" href="{{ url('/') }}"><i class="fas fa-home me-1"></i>Home</a>
                <span class="breadcrumb-item active">Data Verifikasi Lanjutan</span>
            </nav>
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">
                        Data Verifikasi Lanjutan <small></small>
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
                                <th style="width: 10%;">Kel.</th>
                                <th style="width: 10%;">Kec.</th>
                                <th style="width: 10%;">Kab.</th>
                                <th style="width: 10%;">Status</th>
                                <th style="width: 15%;">Proses</th>
                                <th>Jadwal</th>
                                <th class="text-center" style="width: 5%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataVerifikasiLanjutan as $data)
                                <tr class="text-center fs-xs">
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
                                        <span class="badge bg-info">{{ $data->status_proses }}</span>
                                    </td>
                                    @if ($data->verifikasi !== null && $data->verifikasi->count() == 1)
                                        <td>
                                            {{ \Carbon\Carbon::parse($data->verifikasi->jadwal_kunjungan)->isoFormat('D MMMM Y') }}<br>
                                            verifikator : <b>{{ $data->verifikasi->user->name }} </b>
                                        </td>
                                        <td>
                                            -
                                        </td>
                                    @else
                                        <td>
                                            -
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('verifikasi-lanjut.edit', $data->id) }}"
                                                    class="btn btn-sm btn-secondary js-bs-tooltip-enabled"
                                                    data-bs-toggle="tooltip" title=""
                                                    data-bs-original-title="Verifikasi">
                                                    <i class="fa fa-pencil-alt"></i>
                                                </a>
                                            </div>
                                        </td>
                                    @endif
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
