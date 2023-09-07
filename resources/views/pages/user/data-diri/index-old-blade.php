@extends('layouts.main')

@section('title', 'Data Diri')

@push('custom-css')
@endpush

@section('content')
    <main id="main-container" style="padding-top: 1em;">
        <!-- Page Content -->
        <!-- Main Content -->
        <div class="content">
            <!-- User Profile -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">
                        <i class="fa fa-user-circle me-1 text-muted"></i> Data Diri
                    </h3>
                </div>
                <div class="block-content">
                    @if ($isPersonalDataNull->data_diri == null)
                        <form action="{{ route('data-diri.store') }}" id="simpan-form" method="POST"
                            enctype="multipart/form-data">
                        @else
                            <form id="simpan-form"
                                action="{{ route('data-diri.update', $isPersonalDataNull->data_diri->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @method('PUT')
                    @endif
                    @csrf
                    <div class="row mb-2">
                        <div class="col-md-12 mb-2">
                            <label for="nama" class="form-label">Nama <span class="text-danger">*</span></label>
                            <input id="nama" type="text" name="nama"
                                class="form-control form-control-sm @error('nama') is-invalid @enderror""
                                value="{{ $isPersonalDataNull->data_diri == null ? old('nama') : $isPersonalDataNull->data_diri->nama }}"
                                placeholder="Masukkan Nama Lengkap">
                            @error('nama')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6 mb-2">
                            <label for="tempat_lahir" class="form-label">Tempat Lahir <span
                                    class="text-danger">*</span></label>
                            <input id="tempat_lahir" type="text" name="tempat_lahir"
                                class="form-control form-control-sm @error('tempat_lahir') is-invalid @enderror"
                                value="{{ $isPersonalDataNull->data_diri == null ? old('tempat_lahir') : $isPersonalDataNull->data_diri->tempat_lahir }}"
                                placeholder="Masukkan Tempat Lahir">
                            @error('tempat_lahir')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir <span
                                    class="text-danger">*</span></label>
                            <input type="text"
                                class="js-flatpickr form-control form-control-sm @error('tanggal_lahir') is-invalid @enderror"
                                id="tanggal_lahir" name="tanggal_lahir" placeholder="d-m-Y" data-date-format="d-m-Y"
                                value="{{ $isPersonalDataNull->data_diri == null ? old('tanggal_lahir') : $isPersonalDataNull->data_diri->tanggal_lahir }}">
                            @error('tanggal_lahir')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-3 mb-2">
                            <label for="agama" class="form-label">Agama <span class="text-danger">*</span></label>
                            <select name="agama" id="agama"
                                class="form-control form-select-sm @error('agama') is-invalid @enderror">
                                <option value="" disabled="" selected="">-- Pilih Agama --</option>
                                <option value="Islam"
                                    {{ ($isPersonalDataNull->data_diri == null ? (old('agama') == 'Islam' ? 'selected' : '') : $isPersonalDataNull->data_diri->agama == 'Islam') ? 'selected' : '' }}>
                                    Islam</option>
                                <option value="Kristen"
                                    {{ ($isPersonalDataNull->data_diri == null ? (old('agama') == 'Kristen' ? 'selected' : '') : $isPersonalDataNull->data_diri->agama == 'Kristen') ? 'selected' : '' }}>
                                    Kristen</option>
                                <option value="Katholik"
                                    {{ ($isPersonalDataNull->data_diri == null ? (old('agama') == 'Katholik' ? 'selected' : '') : $isPersonalDataNull->data_diri->agama == 'Katholik') ? 'selected' : '' }}>
                                    Kristen</option>
                                <option value="Hindu"
                                    {{ ($isPersonalDataNull->data_diri == null ? (old('agama') == 'Hindu' ? 'selected' : '') : $isPersonalDataNull->data_diri->agama == 'Hindu') ? 'selected' : '' }}>
                                    Hindu</option>
                                <option value="Budha"
                                    {{ ($isPersonalDataNull->data_diri == null ? (old('agama') == 'Budha' ? 'selected' : '') : $isPersonalDataNull->data_diri->agama == 'Budha') ? 'selected' : '' }}>
                                    Budha</option>
                                <option value="Khonghucu"
                                    {{ ($isPersonalDataNull->data_diri == null ? (old('agama') == 'Khonghucu' ? 'selected' : '') : $isPersonalDataNull->data_diri->agama == 'Khonghucu') ? 'selected' : '' }}>
                                    Khonghucu</option>
                            </select>
                            @error('agama')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        <div class="col-sm-3 mb-2">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin <span
                                    class="text-danger">*</span></label>
                            <select name="jenis_kelamin" id="jenis_kelamin"
                                class="form-control form-select-sm @error('jenis_kelamin') is-invalid @enderror">
                                <option value="" disabled="" selected="">-- Pilih Jenis Kelamin --</option>
                                <option value="L"
                                    {{ ($isPersonalDataNull->data_diri == null ? (old('jenis_kelamin') == 'L' ? 'selected' : '') : $isPersonalDataNull->data_diri->jenis_kelamin == 'L') ? 'selected' : '' }}>
                                    Pria</option>
                                <option value="P"
                                    {{ ($isPersonalDataNull->data_diri == null ? (old('jenis_kelamin') == 'P' ? 'selected' : '') : $isPersonalDataNull->data_diri->jenis_kelamin == 'P') ? 'selected' : '' }}>
                                    Wanita</option>
                            </select>
                            @error('jenis_kelamin')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror

                        </div>
                        <div class="col-sm-3 mb-2">
                            <label for="status_perkawinan" class="form-label">Status Perkawinan<span
                                    class="text-danger">*</span></label>
                            <select name="status_perkawinan" id="status_perkawinan"
                                class="form-control form-select-sm @error('status_perkawinan') is-invalid @enderror"
                                value="">
                                <option value="" disabled="" selected="">-- Pilih Status --</option>
                                <option value="Belum Kawin"
                                    {{ ($isPersonalDataNull->data_diri == null ? (old('status_perkawinan') == 'Belum kawin' ? 'selected' : '') : $isPersonalDataNull->data_diri->status_perkawinan == 'Belum kawin') ? 'selected' : '' }}>
                                    Belum kawin</option>
                                <option value="Kawin"
                                    {{ ($isPersonalDataNull->data_diri == null ? (old('status_perkawinan') == 'Kawin' ? 'selected' : '') : $isPersonalDataNull->data_diri->status_perkawinan == 'Kawin') ? 'selected' : '' }}>
                                    Kawin</option>
                                <option value="Cerai Hidup"
                                    {{ ($isPersonalDataNull->data_diri == null ? (old('status_perkawinan') == 'Cerai Hidup' ? 'selected' : '') : $isPersonalDataNull->data_diri->status_perkawinan == 'Cerai Hidup') ? 'selected' : '' }}>
                                    Cerai Hidup</option>
                                <option value="Cerai Mati"
                                    {{ ($isPersonalDataNull->data_diri == null ? (old('status_perkawinan') == 'Cerai Mati' ? 'selected' : '') : $isPersonalDataNull->data_diri->status_perkawinan == 'Cerai Mati') ? 'selected' : '' }}>
                                    Cerai Mati</option>
                            </select>
                            @error('status_perkawinan')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        <div class="col-sm-3 mb-2">
                            <label for="Kewarganegaraan" class="form-label">Kewarganegaraan <span
                                    class="text-danger">*</span></label>
                            <input id="Kewarganegaraan" type="text" name="Kewarganegaraan"
                                class="form-control form-control-sm @error('Kewarganegaraan') is-invalid @enderror"
                                value="{{ $isPersonalDataNull->data_diri == null ? old('Kewarganegaraan') : $isPersonalDataNull->data_diri->negara }}"
                                placeholder="Masukkan Kewarganegaraan">
                            @error('Kewarganegaraan')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-12 mb-2">
                            <label for="nik" class="form-label">Nomor KTP <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text input-group-text-alt">
                                    <i class="fa fa-male"></i>
                                </span>
                                <input id="nik" type="text" data-inputmask="'mask': '9999 9999 9999 9999'"
                                    value="{{ $isPersonalDataNull->data_diri == null ? old('nik') : $isPersonalDataNull->data_diri->nik }}"
                                    name="nik" class="form-control form-control-sm @error('nik') is-invalid @enderror"
                                    placeholder="Masukkan NIK KTP" />
                                @error('nik')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <label for="alamat" class="form-label">Alamat <span class="text-danger">*</span></label>
                            <textarea name="alamat" id="alamat" rows="3"
                                class="form-control form-control-sm @error('alamat') is-invalid @enderror">{{ $isPersonalDataNull->data_diri == null ? old('alamat') : $isPersonalDataNull->data_diri->tanggal_lahir }}</textarea>
                            @error('alamat')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-3 mb-2">
                            <label class="form-label" for="provinsi">Provinsi <span class="text-danger">*</span></label>
                            <select id="provinsi" name="provinsi" style="width: 100%;"
                                class="js-select2 form-select form-select-sm @error('provinsi') is-invalid @enderror">
                                <option value="" selected>Pilih Provinsi</option>
                                @foreach ($lib_prov as $province)
                                    <option value="{{ $province->id }}"
                                        {{ old('provinsi') == $province->id || (isset($dataDiri) && $dataDiri->province_id == $province->id) ? 'selected' : '' }}>
                                        {{ $province->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('provinsi')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        <div class="col-sm-3 mb-2">
                            <label class="form-label" for="kabupaten">Kabupaten / Kota <span
                                    class="text-danger">*</span></label>
                            <select id="kabupaten" name="kabupaten" style="width: 100%;"
                                class="js-select2 form-select form-select-sm @error('kabupaten') is-invalid @enderror">
                                <option value="" selected></option>
                            </select>
                            @error('kabupaten')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        <div class="col-sm-3 mb-2">
                            <label class="form-label" for="kecamatan">Kecamatan <span
                                    class="text-danger">*</span></label>
                            <select id="kecamatan" name="kecamatan" style="width: 100%;"
                                class="js-select2 form-select form-select-sm @error('kecamatan') is-invalid @enderror">
                                <option value="" selected></option>
                            </select>
                            @error('kecamatan')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        <div class="col-sm-3 mb-2">
                            <label class="form-label" for="kelurahan">Desa <span class="text-danger">*</span></label>
                            <select id="kelurahan" name="kelurahan" style="width: 100%;"
                                class="js-select2 form-select form-select-sm @error('kelurahan') is-invalid @enderror">
                                <option value="" selected></option>
                            </select>
                            @error('kelurahan')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-4 mb-2">
                            <label class="form-label" for="rt">RT <span class="text-danger">*</span></label>
                            <input id="rt" type="text" name="rt"
                                class="form-control form-control-sm @error('rt') is-invalid @enderror"
                                value="{{ $isPersonalDataNull->data_diri == null ? old('rt') : $isPersonalDataNull->data_diri->rt }}"
                                placeholder="Masukkan RT" data-inputmask="'mask': '999'">
                            @error('rt')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        <div class="col-sm-4 mb-2">
                            <label class="form-label" for="rw">RW <span class="text-danger">*</span></label>
                            <input id="rw" type="text" name="rw"
                                class="form-control form-control-sm @error('rw') is-invalid @enderror"
                                value="{{ $isPersonalDataNull->data_diri == null ? old('rw') : $isPersonalDataNull->data_diri->rw }}"
                                placeholder="Masukkan RW" data-inputmask="'mask': '999'">
                            @error('rw')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="kode_pos" class="form-label">Kode Pos KTP <span
                                    class="text-danger">*</span></label>
                            <input id="kode_pos" type="text" name="kode_pos"
                                class="form-control form-control-sm @error('kode_pos') is-invalid @enderror"
                                value="{{ $isPersonalDataNull->data_diri == null ? old('kode_pos') : $isPersonalDataNull->data_diri->kode_pos }}"
                                placeholder="Masukkan Kode Pos KTP" data-inputmask="'mask': '99999'">
                            @error('kode_pos')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6 mb-2">
                            <label for="phone" class="form-label">Nomor Handphone <span
                                    class="text-danger">*</span></label>
                            <input id="phone" type="text" name="phone"
                                class="form-control form-control-sm @error('phone') is-invalid @enderror"
                                value="{{ $isPersonalDataNull->data_diri == null ? old('phone') : $isPersonalDataNull->data_diri->phone }}"
                                placeholder="08XXXXXXXXXX" data-inputmask="'mask': '9999 9999 99999'">
                            @error('phone')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="phone" class="form-label">Nomor Whatsaap <span
                                    class="text-danger">*</span></label>
                            <input id="whatsapp" type="text" name="whatsapp"
                                class="form-control form-control-sm @error('whatsapp') is-invalid @enderror"
                                value="{{ $isPersonalDataNull->data_diri == null ? old('whatsapp') : $isPersonalDataNull->data_diri->whatsapp }}"
                                placeholder="08XXXXXXXXXX" data-inputmask="'mask': '9999 9999 99999'">
                            @error('whatsapp')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6 mb-2">
                            <label for="pendidikan_terakhir" class="form-label">Pendidikan Terakhir <span
                                    class="text-danger">*</span></label>
                            <select name="pendidikan_terakhir" id="pendidikan_terakhir"
                                class="form-control form-select-sm @error('pendidikan_terakhir') is-invalid @enderror"
                                placeholder=>
                                <option value="" disabled="" selected="">-- Pilih Pendidikan terakhir --
                                </option>
                                <option value="Tidak Sekolah"
                                    {{ ($isPersonalDataNull->data_diri == null ? (old('pendidikan_terakhir') == 'Tidak Sekolah' ? 'selected' : '') : $isPersonalDataNull->data_diri->pendidikan_terakhir == 'Tidak Sekolah') ? 'selected' : '' }}>
                                    Tidak Sekolah</option>
                                <option value="SD"
                                    {{ ($isPersonalDataNull->data_diri == null ? (old('pendidikan_terakhir') == 'SD' ? 'selected' : '') : $isPersonalDataNull->data_diri->pendidikan_terakhir == 'SD') ? 'selected' : '' }}>
                                    SD</option>
                                <option value="SMP"
                                    {{ ($isPersonalDataNull->data_diri == null ? (old('pendidikan_terakhir') == 'SMP' ? 'selected' : '') : $isPersonalDataNull->data_diri->pendidikan_terakhir == 'SMP') ? 'selected' : '' }}>
                                    SMP</option>
                                <option value="SMA"
                                    {{ ($isPersonalDataNull->data_diri == null ? (old('pendidikan_terakhir') == 'SMA' ? 'selected' : '') : $isPersonalDataNull->data_diri->pendidikan_terakhir == 'SMA') ? 'selected' : '' }}>
                                    SMA</option>
                                <option value="D1"
                                    {{ ($isPersonalDataNull->data_diri == null ? (old('pendidikan_terakhir') == 'D1' ? 'selected' : '') : $isPersonalDataNull->data_diri->pendidikan_terakhir == 'D1') ? 'selected' : '' }}>
                                    D1</option>
                                <option value="D2"
                                    {{ ($isPersonalDataNull->data_diri == null ? (old('pendidikan_terakhir') == 'D2' ? 'selected' : '') : $isPersonalDataNull->data_diri->pendidikan_terakhir == 'D2') ? 'selected' : '' }}>
                                    D2</option>
                                <option value="D3"
                                    {{ ($isPersonalDataNull->data_diri == null ? (old('pendidikan_terakhir') == 'D3' ? 'selected' : '') : $isPersonalDataNull->data_diri->pendidikan_terakhir == 'D3') ? 'selected' : '' }}>
                                    D3</option>
                                <option value="D4"
                                    {{ ($isPersonalDataNull->data_diri == null ? (old('pendidikan_terakhir') == 'D4' ? 'selected' : '') : $isPersonalDataNull->data_diri->pendidikan_terakhir == 'D4') ? 'selected' : '' }}>
                                    D4</option>
                                <option value="S1"
                                    {{ ($isPersonalDataNull->data_diri == null ? (old('pendidikan_terakhir') == 'S1' ? 'selected' : '') : $isPersonalDataNull->data_diri->pendidikan_terakhir == 'S1') ? 'selected' : '' }}>
                                    S1</option>
                                <option value="S2"
                                    {{ ($isPersonalDataNull->data_diri == null ? (old('pendidikan_terakhir') == 'S2' ? 'selected' : '') : $isPersonalDataNull->data_diri->pendidikan_terakhir == 'S2') ? 'selected' : '' }}>
                                    S2</option>
                            </select>
                            @error('pendidikan_terakhir')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="pekerjaan" class="form-label">Pekerjaan<span class="text-danger">*</span></label>
                            <input id="pekerjaan" type="text" name="pekerjaan"
                                class="form-control form-control-sm @error('pekerjaan') is-invalid @enderror"
                                value="{{ $isPersonalDataNull->data_diri == null ? old('pekerjaan') : $isPersonalDataNull->data_diri->pekerjaan }}"
                                placeholder="Masukkan Pekerjaan anda saat ini">
                            @error('pekerjaan')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-md-12">
                            <a id="show-confirm-button" class="btn btn-sm btn-success w-100"><i
                                    class="fa-solid fa-floppy-disk me-2"></i>Simpan Data</a>
                        </div>
                    </div>
                    @php
dd(old());
@endphp
                    </form>
                </div>
            </div>
            <!-- END User Profile -->
        </div>
    </main>
@endsection

@push('custom-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js"></script>
    <script>
        $(document).ready(function() {
            // Menonaktifkan dropdown Kota, Kecamatan, dan Desa saat halaman pertama kali dimuat
            $('#kabupaten').prop('disabled', true);
            $('#kecamatan').prop('disabled', true);
            $('#kelurahan').prop('disabled', true);

            // Event handler untuk dropdown Provinsi
            $('#provinsi').on('change', function() {
                var provinceId = $(this).val();
                if (provinceId) {
                    $.ajax({
                        url: '/get-cities/' + provinceId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#kabupaten').empty();
                            $('#kecamatan').empty();
                            $('#kelurahan').empty();
                            $('#kabupaten').append(
                                '<option value="" selected>Pilih Kota</option>');
                            $.each(data, function(key, value) {
                                $('#kabupaten').append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
                            });
                            $('#kabupaten').prop('disabled', false);
                            $('#kecamatan').prop('disabled', true);
                            $('#kelurahan').prop('disabled', true);
                        }
                    });
                } else {
                    $('#kabupaten').empty();
                    $('#kecamatan').empty();
                    $('#kelurahan').empty();
                    $('#kabupaten').append('<option value="" selected>Pilih Kota</option>');
                    $('#kabupaten').prop('disabled', true);
                    $('#kecamatan').prop('disabled', true);
                    $('#kelurahan').prop('disabled', true);
                }
            });

            // Event handler untuk dropdown Kota
            $('#kabupaten').on('change', function() {
                var cityId = $(this).val();
                if (cityId) {
                    $.ajax({
                        url: '/get-districts/' + cityId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#kecamatan').empty();
                            $('#kelurahan').empty();
                            $('#kecamatan').append(
                                '<option value="" selected>Pilih Kecamatan</option>');
                            $.each(data, function(key, value) {
                                $('#kecamatan').append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
                            });
                            $('#kecamatan').prop('disabled', false);
                            $('#kelurahan').prop('disabled', true);
                        }
                    });
                } else {
                    $('#kecamatan').empty();
                    $('#kelurahan').empty();
                    $('#kecamatan').append('<option value="" selected>Pilih Kecamatan</option>');
                    $('#kecamatan').prop('disabled', true);
                    $('#kelurahan').prop('disabled', true);
                }
            });

            // Event handler untuk dropdown Kecamatan
            $('#kecamatan').on('change', function() {
                var districtId = $(this).val();
                if (districtId) {
                    $.ajax({
                        url: '/get-villages/' + districtId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#kelurahan').empty();
                            $('#kelurahan').append(
                                '<option value="" selected>Pilih Desa</option>');
                            $.each(data, function(key, value) {
                                $('#kelurahan').append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
                            });
                            $('#kelurahan').prop('disabled', false);
                        }
                    });
                } else {
                    $('#kelurahan').empty();
                    $('#kelurahan').append('<option value="" selected>Pilih Desa</option>');
                    $('#kelurahan').prop('disabled', true);
                }
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#nik').inputmask();
            $('#phone').inputmask();
            $('#whatsapp').inputmask();
            $('#rt').inputmask();
            $('#rw').inputmask();
            $('#kode_pos').inputmask();
        });
    </script>
    <script>
        document.getElementById('show-confirm-button').addEventListener('click', function() {
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin ingin melanjutkan?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak',
            }).then((result) => {
                if (result.isConfirmed) {
                    // If confirmed, submit the form
                    document.getElementById('simpan-form').submit();
                }
            });
        });
    </script>
@endpush
