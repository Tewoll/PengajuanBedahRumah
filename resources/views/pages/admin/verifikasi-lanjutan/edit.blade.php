@extends('pages.admin.layouts.main')

@section('title', 'Data Verifikasi Lapangan')

@section('content')
        <!-- Page Content -->
        <div class="content">
            <nav class="breadcrumb push bg-transparent rounded push px-4 py-2">
                <a class="breadcrumb-item" href="{{ route('verifikasi-lanjutan.index') }}"><i class="fas fa-home me-1"></i>Data
                    Verifikasi Lanjutan</a>
                <span class="breadcrumb-item active">Verifikasi Lanjutan</span>
            </nav>
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">
                        Verifikasi Lanjutan <small></small>
                    </h3>
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
                    <div class="block block-bordered block-rounded mb-2 overflow-hidden">
                        <div class="block-header">
                            <div class="block-title">
                                <a class="fw-semibold fs-4">{{ $dataVerifikasiLanjutan->user->dataDiri->nama }}
                                </a>
                                <p class="fs-sm fw-medium text-muted">
                                    <cite>{{ $dataVerifikasiLanjutan->user->dataDiri->alamat }},
                                        RT.{{ $dataVerifikasiLanjutan->user->dataDiri->rt }}
                                        RW.{{ $dataVerifikasiLanjutan->user->dataDiri->rt }}, Kel.
                                        {{ $dataVerifikasiLanjutan->user->dataDiri->village->name }}, Kec.
                                        {{ $dataVerifikasiLanjutan->user->dataDiri->district->name }}, Kab.
                                        {{ $dataVerifikasiLanjutan->user->dataDiri->regency->name }}, Prov.
                                        {{ $dataVerifikasiLanjutan->user->dataDiri->province->name }}
                                        {{ $dataVerifikasiLanjutan->user->dataDiri->kode_pos }}
                                    </cite>
                                </p>
                            </div>
                        </div>
                        {{-- <form id="verifikasi-form"
                            action="{{ route('verifikasi-lanjutan.update', $dataVerifikasiLanjutan->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="block-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label class="form-label" for="example-flatpickr-custom">Jadwal Verifikasi
                                                Lapangan</label>
                                            <input type="text" class="js-flatpickr form-control form-control-sm"
                                                name="tanggal" placeholder="d-m-Y" data-date-format="d-m-Y">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label" for="verifikator">Pilih
                                                Verifikator</label>
                                            <select class="js-select2 form-select form-select-sm" id="verifikator"
                                                name="verifikator" style="width: 100%;" data-placeholder="Choose one..">
                                                <option disabled selected></option>
                                                @foreach ($verifikator as $v)
                                                    <option value="{{ $v->id }}">{{ $v->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-content block-content-full block-content-sm bg-body-light text-end">
                                <button type="reset" class="btn btn-alt-secondary">
                                    <i class="fa fa-sync-alt opacity-50 me-1"></i> Reset
                                </button>
                                <button id="submit-button" class="btn btn-alt-primary">
                                    <i class="fa fa-check opacity-50 me-1"></i> Submit
                                </button>
                            </div>
                        </form> --}}
                        <form id="verifikasi-form"
                            action="{{ route('verifikasi-lanjut.update', $dataVerifikasiLanjutan->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="block-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label class="form-label" for="example-flatpickr-custom">Jadwal Verifikasi
                                                Lapangan</label>
                                            <input type="text" class="js-flatpickr form-control form-control-sm"
                                                name="tanggal" placeholder="d-m-Y" data-date-format="d-m-Y">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label" for="verifikator">Pilih
                                                Verifikator</label>
                                            <select class="js-select2 form-select form-select-sm" id="verifikator"
                                                name="verifikator" style="width: 100%;" data-placeholder="Choose one..">
                                                <option disabled selected></option>
                                                @foreach ($verifikator as $v)
                                                    <option value="{{ $v->id }}">{{ $v->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-content block-content-full block-content-sm bg-body-light text-end">
                                <button type="reset" class="btn btn-alt-secondary">
                                    <i class="fa fa-sync-alt opacity-50 me-1"></i> Reset
                                </button>
                                <button type="button" id="submit-button" class="btn btn-alt-primary">
                                    <i class="fa fa-check opacity-50 me-1"></i> Submit
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- END Page Content -->
@endsection
@push('custom-script')
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const submitButton = document.getElementById('submit-button');
            const verifikasiForm = document.getElementById('verifikasi-form');

            submitButton.addEventListener('click', function() {
                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Apakah Anda yakin ingin menyimpan data verifikasi?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Tidak',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Kirim data ke controller melalui AJAX
                        $.ajax({
                            type: 'PUT',
                            url: verifikasiForm.action,
                            data: verifikasiForm.serialize(),
                            success: function(response) {
                                Swal.fire({
                                    title: 'Sukses',
                                    text: response.message,
                                    icon: 'success',
                                });
                            },
                            error: function(xhr, status, error) {
                                Swal.fire({
                                    title: 'Gagal',
                                    text: 'Terjadi kesalahan saat memproses data.',
                                    icon: 'error',
                                });
                            }
                        });
                    }
                });
            });
        });
    </script> --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    const submitButton = document.getElementById('submit-button');
    const verifikasiForm = document.getElementById('verifikasi-form');

    submitButton.addEventListener('click', function() {
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Apakah Anda yakin ingin melanjutkan?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak',
        }).then((result) => {
            if (result.isConfirmed) {
                // Mengumpulkan data formulir secara manual
                const formData = new FormData(verifikasiForm);

                // Kirim data ke controller melalui AJAX
                fetch(verifikasiForm.action, {
                        method: 'POST', // Ganti dengan method yang sesuai
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.message) {
                            Swal.fire({
                                title: 'Sukses',
                                text: data.message,
                                icon: 'success',
                            }).then((result) => {
                                // Ganti URL tanpa menambahkan entri baru ke dalam riwayat penjelajahan
                                window.location.replace('{{ route('verifikasi-lanjut.index') }}');
                            });
                        } else {
                            Swal.fire({
                                title: 'Gagal',
                                text: 'Terjadi kesalahan saat memproses data',
                                icon: 'error',
                            });
                        }
                    })
                    .catch(error => {
                        Swal.fire({
                            title: 'Gagal',
                            text: 'Terjadi kesalahan saat memproses data',
                            icon: 'error',
                        });
                    });
            }
        });
    });
});

    </script>
@endpush
