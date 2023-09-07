@extends('pages.verifikator.layouts.main')

@section('title', 'Form Verifikasi Pengajuan')

@push('custom-css')
    <style>
        .inp {
            border: none;
            border-bottom: 1px solid #000000;
            padding: 5px 10px;
            outline: none;
        }
    </style>
@endpush

@section('content')
    <!-- Page Content -->
    <div class="content">
        <nav class="breadcrumb push bg-transparent rounded push px-4 py-2">
            <a class="breadcrumb-item" href="{{ route('verifikasi-lanjutan.index') }}"><i class="fas fa-home me-1"></i>Verifikasi Lapangan</a>
            <span class="breadcrumb-item active">Form Verifikasi Lapangan</span>
        </nav>
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Form Isian Verifikasi Lapangan <small></small>
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
            <form action="{{ route('verifikasi-lanjutan.store') }}" method="POST" enctype="multipart/form-data"
                id="simpan-form">
                @csrf
                <input type="hidden" name="id" value="{{ $dataVerifikasiLapangan->dataPengajuan->id }}">
                <input type="hidden" name="verifikasi_id" value="{{ $dataVerifikasiLapangan->id }}">
                <div class="block-content">
                    <table class="table table-bordered">
                        @foreach ($kategori as $k)
                            <tbody class="fs-xs">
                                <tr>
                                    <td class="text-left bg-black-25" colspan="3">
                                        <strong>{{ $k->nama }}</strong>
                                    </td>
                                </tr>
                                @foreach ($k->subKategori as $sk)
                                    <tr>
                                        <td class="text-center" style="width: 3%;">{{ $loop->iteration }}</td>
                                        <td style="width: 30%;">{{ $sk->nama }}</td>
                                        <td>
                                            <div class="space-x-2">
                                                @switch($sk->id)
                                                    @case(1)
                                                        <div class="row g-3">
                                                            <div class="col-md-12">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        value="Lokal Tradisional" id="skid_1" name="skid_1" required>
                                                                    <label class="form-check-label" for="skid_1">Lokal /
                                                                        Tradisional</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        value="Non Lokal" id="skid_1" name="skid_1" required>
                                                                    <label class="form-check-label" for="skid_1">Non
                                                                        Lokal</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @break

                                                    @case(2)
                                                        <div class="row g-3">
                                                            <div class="col-md-12">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        value="tembok" id="skid_2" name="skid_2" required>
                                                                    <label class="form-check-label"
                                                                        for="skid_2">Tembok</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        value="tembok_panggung" id="skid_2" name="skid_2" required>
                                                                    <label class="form-check-label" for="skid_2">Tembok –
                                                                        Panggung</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        value="kayu_tapak" id="skid_2" name="skid_2" required>
                                                                    <label class="form-check-label" for="skid_2">Kayu
                                                                        Tapak</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        value="setengah_tembok" id="skid_2" name="skid_2" required>
                                                                    <label class="form-check-label" for="skid_2">Setengah
                                                                        Tembok</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        value="kayu_panggung" id="skid_2" name="skid_2" required>
                                                                    <label class="form-check-label" for="skid_2">Kayu –
                                                                        Panggung</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @break

                                                    @case(3)
                                                        <div class="row g-3">
                                                            <div class="col-md-12">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="skid_3" name="skid_3" required value="Ada">
                                                                    <label class="form-check-label" for="skid_3">Ada
                                                                    </label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="skid_3" name="skid_3" required value="Tidak Ada">
                                                                    <label class="form-check-label" for="skid_3">Tidak
                                                                        Ada</label>
                                                                </div>
                                                                <div class="form form-check-inline">
                                                                    <input type="file" accept="image/*"
                                                                        class="form-control form-control-sm"
                                                                        id="photo-input-3" name="photo_3">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @break

                                                    @case(4)
                                                        <div class="row g-3">
                                                            <div class="col-md-12">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="skid_4" name="skid_4" required value="Ada">
                                                                    <label class="form-check-label" for="skid_4">Ada
                                                                    </label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="radio4-2" name="skid_4" required value="Tidak Ada">
                                                                    <label class="form-check-label" for="skid_4">Tidak
                                                                        Ada</label>
                                                                </div>
                                                                <div class="form form-check-inline">
                                                                    <input type="file" accept="image/*"
                                                                        class="form-control form-control-sm"
                                                                        id="photo-input-4" name="photo_4">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @break

                                                    @case(5)
                                                        <div class="row g-3">
                                                            <div class="col-md-12">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="skid_5" name="skid_5" required value="Ada">
                                                                    <label class="form-check-label" for="skid_5">Ada
                                                                    </label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="skid_5" name="skid_5" required value="Tidak Ada">
                                                                    <label class="form-check-label" for="skid_5">Tidak
                                                                        Ada</label>
                                                                </div>
                                                                <div class="form form-check-inline">
                                                                    <input type="file" accept="image/*"
                                                                        class="form-control form-control-sm"
                                                                        id="photo-input-5" name="photo_5">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @break

                                                    @case(6)
                                                        <div class="row g-3">
                                                            <div class="col-md-12">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="skid_6" name="skid_6" required value="Ada">
                                                                    <label class="form-check-label" for="skid_6">Ada
                                                                    </label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="skid_6" name="skid_6" required value="Tidak Ada">
                                                                    <label class="form-check-label" for="skid_6">Tidak
                                                                        Ada</label>
                                                                </div>
                                                                <div class="form form-check-inline">
                                                                    <input type="file" accept="image/*"
                                                                        class="form-control form-control-sm"
                                                                        id="photo-input-6" name="photo_6">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @break

                                                    @case(7)
                                                        <div class="row g-3">
                                                            <div class="col-md-12">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="skid_7" name="skid_7" required value="Ada">
                                                                    <label class="form-check-label" for="skid_7">Ada
                                                                    </label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="skid_7" name="skid_7" required value="Tidak Ada">
                                                                    <label class="form-check-label" for="skid_7">Tidak
                                                                        Ada</label>
                                                                </div>
                                                                <div class="form form-check-inline mb-2">
                                                                    <input type="file" accept="image/*"
                                                                        class="form-control form-control-sm"
                                                                        id="photo-input-7" name="photo_7" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @break

                                                    @case(8)
                                                        <div class="row g-3">
                                                            <div class="col-md-12">
                                                                <div class="form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="genteng" name="skid_8" required value="Genteng">
                                                                    <label class="form-check-label"
                                                                        for="genteng">Genteng</label>
                                                                </div>
                                                                <div class="form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="jerami" name="skid_8" required value="Jerami">
                                                                    <label class="form-check-label"
                                                                        for="jerami">Jerami</label>
                                                                </div>
                                                                <div class="form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="rumbia" name="skid_8" required value="Rumbia">
                                                                    <label class="form-check-label"
                                                                        for="rumbia">Rumbia</label>
                                                                </div>
                                                                <div class="form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="fiber-cement" name="skid_8" required
                                                                        value="Fiber Cement">
                                                                    <label class="form-check-label" for="fiber-cement">Fiber
                                                                        cement</label>
                                                                </div>
                                                                <div class="form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="asbes" name="skid_8" required value="Asbes">
                                                                    <label class="form-check-label"
                                                                        for="asbes">Asbes</label>
                                                                </div>
                                                                <div class="form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="ijuk" name="skid_8" required value="Ijuk">
                                                                    <label class="form-check-label"
                                                                        for="ijuk">Ijuk</label>
                                                                </div>
                                                                <div class="form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="seng" name="skid_8" required value="Seng">
                                                                    <label class="form-check-label"
                                                                        for="seng">Seng</label>
                                                                </div>
                                                                <div class="form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="daun-daun" name="skid_8" required value="Daun-daun">
                                                                    <label class="form-check-label"
                                                                        for="daun-daun">Daun-daun</label>
                                                                </div>
                                                                <div class="form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="lainnya" name="skid_8" required value="Lainnya">
                                                                    <label class="form-check-label"
                                                                        for="lainnya">Lainnya</label>
                                                                </div>
                                                                <div class="form-check-inline my-1">
                                                                    <input class="form-control form-control-sm inp"
                                                                        type="text" id="lainnya-input" name="det_skid_8"
                                                                        placeholder="lainnya">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @break

                                                    @case(9)
                                                        <div class="row g-3">
                                                            <div class="col-md-12">
                                                                <div class="form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="tembok-plesteran" name="skid_9"
                                                                        value="Tembok Plesteran" required>
                                                                    <label class="form-check-label"
                                                                        for="tembok-plesteran">Tembok
                                                                        Plesteran</label>
                                                                </div>
                                                                <div class="form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="tembok-tanpa-plesteran" name="skid_9"
                                                                        value="Tembok Tanpa Plesteran" required>
                                                                    <label class="form-check-label"
                                                                        for="tembok-tanpa-plesteran">Tembok Tanpa
                                                                        Plesteran</label>
                                                                </div>
                                                                <div class="form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="anyaman-bambu" name="skid_9" required
                                                                        value="Anyaman Bambu">
                                                                    <label class="form-check-label"
                                                                        for="anyaman-bambu">Anyaman
                                                                        Bambu</label>
                                                                </div>
                                                                <div class="form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="grc-asbes" name="skid_9" required value="GRC / Asbes">
                                                                    <label class="form-check-label" for="grc-asbes">GRC /
                                                                        Asbes</label>
                                                                </div>
                                                                <div class="form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="kayu-papan" name="skid_9" required value="Kayu / Papan">
                                                                    <label class="form-check-label" for="kayu-papan">Kayu /
                                                                        Papan</label>
                                                                </div>
                                                                <div class="form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="lainnya" name="skid_9" required value="Lainnya">
                                                                    <label class="form-check-label"
                                                                        for="lainnya">Lainnya</label>
                                                                </div>
                                                                <div class="form-check-inline my-1">
                                                                    <input class="form-control form-control-sm inp"
                                                                        type="text" id="lainnya-input" name="det_skid_9"
                                                                        placeholder="lainnya">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @break

                                                    @case(10)
                                                        <div class="row g-3">
                                                            <div class="col-md-12">
                                                                <div class="form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="marmer-granit" name="skid_10" required
                                                                        value="Marmer/Granit">
                                                                    <label class="form-check-label"
                                                                        for="marmer-granit">Marmer/Granit</label>
                                                                </div>
                                                                <div class="form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="plesteran" name="skid_10" required value="Plesteran">
                                                                    <label class="form-check-label"
                                                                        for="plesteran">Plesteran</label>
                                                                </div>
                                                                <div class="form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="tanah" name="skid_10" required value="Tanah">
                                                                    <label class="form-check-label"
                                                                        for="tanah">Tanah</label>
                                                                </div>
                                                                <div class="form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="keramik" name="skid_10" required value="Keramik">
                                                                    <label class="form-check-label"
                                                                        for="keramik">Keramik</label>
                                                                </div>
                                                                <div class="form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="ubin-tegel" name="skid_10" required value="Ubin / Tegel">
                                                                    <label class="form-check-label" for="ubin-tegel">Ubin /
                                                                        Tegel</label>
                                                                </div>
                                                                <div class="form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="bambu" name="skid_10" required value="Bambu">
                                                                    <label class="form-check-label"
                                                                        for="bambu">Bambu</label>
                                                                </div>
                                                                <div class="form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="kayu" name="skid_10" required value="Kayu">
                                                                    <label class="form-check-label"
                                                                        for="kayu">Kayu</label>
                                                                </div>
                                                                <div class="form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="lainnya" name="skid_10" required value="Lainnya">
                                                                    <label class="form-check-label"
                                                                        for="lainnya">Lainnya</label>
                                                                </div>
                                                                <div class="form-check-inline my-1">
                                                                    <input class="form-control form-control-sm inp"
                                                                        type="text" id="lainnya-input" name="det_skid_10"
                                                                        placeholder="lainnya">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @break

                                                    @case(11)
                                                        <div class="row g-3">
                                                            <div class="col-md-4">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="skid_11" value="Ada" name="skid_11" required>
                                                                    <label class="form-check-label" for="skid_11">Ada</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="skid_11" value="Tidak Ada" name="skid_11" required>
                                                                    <label class="form-check-label" for="skid_11">Tidak
                                                                        Ada</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="det_skid_11" id="Cukup" value="cukup">
                                                                    <label class="form-check-label"
                                                                        for="det_skid_11">Cukup</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="det_skid_11" id="tidakmencukupi"
                                                                        value="Tidak Mencukupi">
                                                                    <label class="form-check-label" for="det_skid_11">Tidak
                                                                        Mencukupi</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @break

                                                    @case(12)
                                                        <div class="row g-3">
                                                            <div class="col-md-4">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="skid_12" value="Ada" name="skid_12" required>
                                                                    <label class="form-check-label" for="skid_12">Ada</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="skid_12" value="Tidak Ada" name="skid_12" required>
                                                                    <label class="form-check-label" for="skid_12">Tidak
                                                                        Ada</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="det_skid_12" id="Cukup" value="cukup">
                                                                    <label class="form-check-label"
                                                                        for="det_skid_12">Cukup</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="det_skid_12" id="tidakmencukupi"
                                                                        value="Tidak Mencukupi">
                                                                    <label class="form-check-label" for="det_skid_12">Tidak
                                                                        Mencukupi</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @break

                                                    @case(13)
                                                        <div class="row g-3">
                                                            <div class="col-md-4">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="skid_13" value="Ada" name="skid_13" required>
                                                                    <label class="form-check-label" for="skid_13">Ada</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="skid_13" value="Tidak Ada" name="skid_13" required>
                                                                    <label class="form-check-label" for="skid_13">Tidak
                                                                        Ada</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="det_skid_13" id="cukup" value="Baik">
                                                                    <label class="form-check-label" for="inlineRadio1">Baik
                                                                    </label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="det_skid_13" id="tidakmencukupi"
                                                                        value="Rusak
                                                                        Sedang">
                                                                    <label class="form-check-label" for="inlineRadio2">Rusak
                                                                        Sedang</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="det_skid_13" id="tidakmencukupi"
                                                                        value="Rusak
                                                                        Ringan">
                                                                    <label class="form-check-label" for="inlineRadio2">Rusak
                                                                        Ringan</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="det_skid_13" id="tidakmencukupi"
                                                                        value="Rusak
                                                                        Berat">
                                                                    <label class="form-check-label" for="inlineRadio2">Rusak
                                                                        Berat</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="det_skid_13" id="tidakmencukupi"
                                                                        value="Rusak
                                                                        Total">
                                                                    <label class="form-check-label" for="inlineRadio2">Rusak
                                                                        Total</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @break

                                                    @case(14)
                                                        <div class="row g-3">
                                                            <div class="col-md-4">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="skid_14" value="Ada" name="skid_14" required>
                                                                    <label class="form-check-label" for="skid_14">Ada</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="skid_14" value="Tidak Ada" name="skid_14" required>
                                                                    <label class="form-check-label" for="skid_14">Tidak
                                                                        Ada</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="det_skid_14"
                                                                        id="> 10 m dari sumber air"
                                                                        value="> 10 m dari sumber air">
                                                                    <label class="form-check-label" for="inlineRadio1"> > 10 m
                                                                        dari
                                                                        sumber
                                                                        air </label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="det_skid_14" id="tidakmencukupi"
                                                                        value="< 10 m dari sumber air">
                                                                    <label class="form-check-label" for="inlineRadio2">
                                                                        < 10 m dari sumber air</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="det_skid_14" id="tidakmencukupi"
                                                                        value="tidak tahu">
                                                                    <label class="form-check-label" for="inlineRadio2">Tidak
                                                                        Tahu
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @break

                                                    @case(15)
                                                        <div class="row g-3">
                                                            <div class="col-md-12">
                                                                <input class="form-control form-control-sm inp" type="text"
                                                                    name="skid_15" placeholder="...... orang"
                                                                    aria-label=".form-control-sm example" required>
                                                            </div>
                                                        </div>
                                                    @break

                                                    @case(16)
                                                        <div class="row g-3">
                                                            <div class="col-md-6">
                                                                <input class="form-control form-control-sm mb-1 inp"
                                                                    type="text" placeholder="Ukuran   : _____m x ______m"
                                                                    name="ukuran_skid_16" required>
                                                                <input class="form-control form-control-sm inp" type="text"
                                                                    placeholder="Luas        : __________m2"
                                                                    name="luas_skid_16" required>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="det_skid_16" id="cukup" value="cukup">
                                                                    <label class="form-check-label" for="inlineRadio1"> Cukup
                                                                    </label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="det_skid_16" id="tidakmencukupi"
                                                                        value="tidak mencukupi">
                                                                    <label class="form-check-label" for="inlineRadio2"> Tidak
                                                                        Mencukupi</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @break

                                                    @case(17)
                                                        <div class="row g-3">
                                                            <div class="col-md-12">
                                                                <input class="form-control form-control-sm inp" type="text"
                                                                    placeholder="...... kamar" name="skid_17" required>
                                                            </div>
                                                        </div>
                                                    @break

                                                    @case(18)
                                                        <div class="row g-3">
                                                            <div class="col-md-6">
                                                                <input class="form-control form-control-sm mb-1 inp"
                                                                    type="text" placeholder="Ukuran   : _____m x ______m"
                                                                    name="ukuran_skid_18" required>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input class="form-control form-control-sm inp" type="text"
                                                                    placeholder="Luas        : __________m2"
                                                                    name="luas_skid_18" required>
                                                            </div>
                                                        </div>
                                                    @break

                                                    @case(19)
                                                        <div class="row g-3">
                                                            <div class="col-md-4">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="skid_19" value="Ada" name="skid_19" required>
                                                                    <label class="form-check-label"
                                                                        for="inlineradio1">Ada</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="skid_19" value="Tidak ada" name="skid_19" required>
                                                                    <label class="form-check-label"
                                                                        for="inlineCheckbox2">Tidak
                                                                        Ada</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="det_skid_19" id="cukup" value="PDAM">
                                                                    <label class="form-check-label"
                                                                        for="inlineRadio1">PDAM</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="det_skid_19" value="Sumur">
                                                                    <label class="form-check-label" for="inlineRadio2">Sumur
                                                                    </label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="det_skid_19" value="Lainnya">
                                                                    <label class="form-check-label"
                                                                        for="inlineRadio2">Lainnya</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @break

                                                    @case(20)
                                                        <div class="row g-3">
                                                            <div class="col-md-4">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="skid_20" value="Ada" name="skid_20" required>
                                                                    <label class="form-check-label"
                                                                        for="inlineradio1">Ada</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="skid_20" value="Tidak ada" name="skid_20" required>
                                                                    <label class="form-check-label"
                                                                        for="inlineCheckbox2">Tidak
                                                                        Ada</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="det_skid_20" id="cukup" value="PLN">
                                                                    <label class="form-check-label" for="skid">PLN</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="det_skid_20" id="tidakmencukupi"
                                                                        value="Lainnya">
                                                                    <label class="form-check-label"
                                                                        for="skid">Lainnya</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @break

                                                    @case(21)
                                                        <div class="row g-3">
                                                            <div class="col-md-12">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="skid_21" value="Ada" name="skid_21" required>
                                                                    <label class="form-check-label" for="skid">Ada</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="skid_21" value="Tidak ada" name="skid_21" required>
                                                                    <label class="form-check-label" for="skid">Tidak
                                                                        Ada</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @break

                                                    @case(22)
                                                        <div class="row g-3">
                                                            <div class="col-md-12">
                                                                <div class="input-group-sm form-check-inline mb-2">
                                                                    <label for="" class="form-label">
                                                                        Tampak Depan dan Perspektif<cite class="text-danger">*Foto dapat lebih dari 1</cite>
                                                                    </label>
                                                                    <input type="file" accept="image/*"
                                                                        class="form-control form-control-sm"
                                                                        id="photo-input-8" name="photo_8[]" required multiple>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @break

                                                    @default
                                                @endswitch
                                            </div>
                                        </td>
                                    </tr>
                                    @foreach ($sk->detailSubKategori as $dsk)
                                        @if ($dsk->kategori_id == $k->id)
                                            <tr>
                                                <td class="text-center" style="width: 3%;"></td>
                                                <td style="width: 30%;">{{ $dsk->nama }}</td>
                                                <td>
                                                    <div class="space-x-2">
                                                        @switch($dsk->kategori_id)
                                                            @case(2)
                                                                @if ($dsk->id == 6)
                                                                    <div class="row g-3">
                                                                        <div class="col-md-12">
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input" type="radio"
                                                                                    name="dskid_2_6" required id="menerus2-6"
                                                                                    value="Menerus">
                                                                                <label class="form-check-label"
                                                                                    for="menerus">Menerus</label>
                                                                            </div>
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input" type="radio"
                                                                                    name="dskid_2_6" required id="setempat2-6"
                                                                                    value="Setempat">
                                                                                <label class="form-check-label"
                                                                                    for="setempat">Setempat</label>
                                                                            </div>
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input" type="radio"
                                                                                    name="dskid_2_6" required id="rolag2-6"
                                                                                    value="Rolag">
                                                                                <label class="form-check-label"
                                                                                    for="rolag">Rolag</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @elseif ($dsk->id == 7)
                                                                    <div class="row g-3">
                                                                        <div class="col-md-12">
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input" type="radio"
                                                                                    name="dskid_2_7" required id="beton2-7"
                                                                                    value="Beton" required>
                                                                                <label class="form-check-label"
                                                                                    for="beton">Beton</label>
                                                                            </div>
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input" type="radio"
                                                                                    name="dskid_2_7" required id="kayu2-7"
                                                                                    value="Kayu" required>
                                                                                <label class="form-check-label"
                                                                                    for="kayu">Kayu</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @elseif ($dsk->id == 8)
                                                                    <div class="row g-3">
                                                                        <div class="col-md-12">
                                                                            <div class="form-check-inline">
                                                                                <input type="text"
                                                                                    class="form-control form-control-sm mb-2"
                                                                                    id="panjang2-8" name="dskid_2_8_1"
                                                                                    placeholder="Panjang (satuan m)" required>
                                                                                <div class="input-group input-group-sm">
                                                                                    <input type="text"
                                                                                        class="form-control form-control-sm"
                                                                                        id="dimensi_lebar2-8"
                                                                                        name="dskid_2_8_2"
                                                                                        placeholder="Lebar (satuan cm)"
                                                                                        required>
                                                                                    <span
                                                                                        class="input-group-text form-control-sm">x</span>
                                                                                    <input type="text"
                                                                                        class="form-control form-control-sm"
                                                                                        id="dimensi_tinggi2-8"
                                                                                        name="dskid_2_8_3"
                                                                                        placeholder="Tinggi (satuan cm)"
                                                                                        required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @elseif ($dsk->id == 9)
                                                                    <div class="row g-3">
                                                                        <div class="col-md-12">
                                                                            <div class="form-check-inline">
                                                                                <input type="text"
                                                                                    class="form-control form-control-sm mb-2 "
                                                                                    id="panjang2-9" name="dskid_2_9"
                                                                                    placeholder="         m" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @elseif ($dsk->id == 10)
                                                                    <div class="row g-3">
                                                                        <div class="col-md-12">
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input" type="radio"
                                                                                    name="dskid_2_10" id="rusak_ringan2-10"
                                                                                    value="Baik" required>
                                                                                <label class="form-check-label"
                                                                                    for="rusak_ringan">
                                                                                    Baik</label>
                                                                            </div>
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input" type="radio"
                                                                                    name="dskid_2_10" id="rusak_ringan2-10"
                                                                                    value="Rusak Ringan" required>
                                                                                <label class="form-check-label"
                                                                                    for="rusak_ringan">
                                                                                    Rusak Ringan</label>
                                                                            </div>
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input" type="radio"
                                                                                    name="dskid_2_10" id="rusak_sedang2-10"
                                                                                    value="Rusak Sedang" required>
                                                                                <label class="form-check-label"
                                                                                    for="rusak_sedang">
                                                                                    Rusak Sedang</label>
                                                                            </div>
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input" type="radio"
                                                                                    name="dskid_2_10" id="rusak_berat2-10"
                                                                                    value="Rusak Berat" required>
                                                                                <label class="form-check-label"
                                                                                    for="rusak_berat">
                                                                                    Rusak Berat</label>
                                                                            </div>
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input" type="radio"
                                                                                    name="dskid_2_10" id="rusak_total2-10"
                                                                                    value="Rusak Total" required>
                                                                                <label class="form-check-label"
                                                                                    for="rusak_total">
                                                                                    Rusak Total</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @elseif ($dsk->id == 11)
                                                                    <div class="row g-3">
                                                                        <div class="col-md-12">
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input" type="radio"
                                                                                    name="dskid_2_11" id="beton2-11"
                                                                                    value="Beton" required>
                                                                                <label class="form-check-label"
                                                                                    for="beton">Beton</label>
                                                                            </div>
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input" type="radio"
                                                                                    name="dskid_2_11" id="kayu2-11"
                                                                                    value="Kayu" required>
                                                                                <label class="form-check-label"
                                                                                    for="kayu">Kayu</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @elseif ($dsk->id == 12)
                                                                    <div class="row g-3">
                                                                        <div class="col-md-12">
                                                                            <div class="form-check-inline">
                                                                                <input type="text"
                                                                                    class="form-control form-control-sm mb-2"
                                                                                    id="panjang2-8" name="dskid_2_12_1"
                                                                                    placeholder="Panjang (satuan m)" required>
                                                                                <div class="input-group input-group-sm">
                                                                                    <input type="text"
                                                                                        class="form-control form-control-sm"
                                                                                        id="dimensi_lebar2-8"
                                                                                        name="dskid_2_12_2"
                                                                                        placeholder="Lebar (satuan cm)"
                                                                                        required>
                                                                                    <span
                                                                                        class="input-group-text form-control-sm">x</span>
                                                                                    <input type="text"
                                                                                        class="form-control form-control-sm"
                                                                                        id="dimensi_tinggi2-8"
                                                                                        name="dskid_2_12_3"
                                                                                        placeholder="Tinggi (satuan cm)"
                                                                                        required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @elseif ($dsk->id == 13)
                                                                    <div class="row g-3">
                                                                        <div class="col-md-12">
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input" type="radio"
                                                                                    name="dskid_2_13" id="ada2-13"
                                                                                    value="Ada" required>
                                                                                <label class="form-check-label"
                                                                                    for="ada">Ada</label>
                                                                            </div>
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input" type="radio"
                                                                                    name="dskid_2_13" id="tidak-ada2-13"
                                                                                    value="Tidak Ada" required>
                                                                                <label class="form-check-label"
                                                                                    for="tidak-ada">Tidak
                                                                                    Ada</label>
                                                                            </div>
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input" type="radio"
                                                                                    name="dskid_2_13" id="sebagian-ada2-13"
                                                                                    value="Sebagian Ada" required>
                                                                                <label class="form-check-label"
                                                                                    for="sebagian-ada">Sebagian
                                                                                    Ada</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @elseif ($dsk->id == 14)
                                                                    <div class="row g-3">
                                                                        <div class="col-md-12">
                                                                            <div class="form-check-inline">
                                                                                <input type="text"
                                                                                    class="form-control form-control-sm mb-2 "
                                                                                    id="panjang2-14" name="dskid_2_14"
                                                                                    placeholder="         m" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @elseif ($dsk->id == 15)
                                                                    <div class="row g-3">
                                                                        <div class="col-md-12">
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input" type="radio"
                                                                                    name="dskid_2_15" id="rusak_ringan2-10"
                                                                                    value="Baik" required>
                                                                                <label class="form-check-label">
                                                                                    Baik</label>
                                                                            </div>
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input" type="radio"
                                                                                    name="dskid_2_15" id="rusak_ringan2-15"
                                                                                    value="Rusak Ringan" required>
                                                                                <label class="form-check-label"
                                                                                    for="rusak_ringan">
                                                                                    Rusak Ringan</label>
                                                                            </div>
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input" type="radio"
                                                                                    name="dskid_2_15" id="rusak_sedang2-15"
                                                                                    value="Rusak Sedang" required>
                                                                                <label class="form-check-label"
                                                                                    for="rusak_sedang">
                                                                                    Rusak Sedang</label>
                                                                            </div>
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input" type="radio"
                                                                                    name="dskid_2_15" id="rusak_berat2-15"
                                                                                    value="Rusak Berat" required>
                                                                                <label class="form-check-label"
                                                                                    for="rusak_berat">
                                                                                    Rusak Berat</label>
                                                                            </div>
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input" type="radio"
                                                                                    name="dskid_2_15" id="rusak_total2-15"
                                                                                    value="Rusak Total" required>
                                                                                <label class="form-check-label"
                                                                                    for="rusak_total">
                                                                                    Rusak Total</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @elseif ($dsk->id == 28)
                                                                    <div class="row g-3">
                                                                        <div class="col-md-12">
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input" type="radio"
                                                                                    name="dskid_2_28" id="beton2-28"
                                                                                    value="Beton" required>
                                                                                <label class="form-check-label"
                                                                                    for="beton">Beton</label>
                                                                            </div>
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input" type="radio"
                                                                                    name="dskid_2_28" id="kayu2-28"
                                                                                    value="Kayu" required>
                                                                                <label class="form-check-label"
                                                                                    for="kayu">Kayu</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @elseif ($dsk->id == 29)
                                                                    <div class="row g-3">
                                                                        <div class="col-md-12">
                                                                            <div class="form-check-inline">
                                                                                <input type="text"
                                                                                    class="form-control form-control-sm mb-2"
                                                                                    id="panjang2-8" name="dskid_2_29_1"
                                                                                    placeholder="Panjang (satuan m)" required>
                                                                                <div class="input-group input-group-sm">
                                                                                    <input type="text"
                                                                                        class="form-control form-control-sm"
                                                                                        id="dimensi_lebar2-8"
                                                                                        name="dskid_2_29_2"
                                                                                        placeholder="Lebar (satuan cm)"
                                                                                        required>
                                                                                    <span
                                                                                        class="input-group-text form-control-sm">x</span>
                                                                                    <input type="text"
                                                                                        class="form-control form-control-sm"
                                                                                        id="dimensi_tinggi2-8"
                                                                                        name="dskid_2_29_3"
                                                                                        placeholder="Tinggi (satuan cm)"
                                                                                        required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @elseif ($dsk->id == 30)
                                                                    <div class="row g-3">
                                                                        <div class="col-md-12">
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input" type="radio"
                                                                                    name="dskid_2_30" id="ada2-30"
                                                                                    value="Ada" required>
                                                                                <label class="form-check-label"
                                                                                    for="ada">Ada</label>
                                                                            </div>
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="dskid_2_30"
                                                                                    id="tidak-ada2-30" value="Tidak Ada"
                                                                                    required>
                                                                                <label class="form-check-label"
                                                                                    for="tidak-ada">Tidak
                                                                                    Ada</label>
                                                                            </div>
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="dskid_2_30"
                                                                                    id="sebagian-ada2-30"
                                                                                    value="Sebagian Ada" required>
                                                                                <label class="form-check-label"
                                                                                    for="sebagian-ada">Sebagian
                                                                                    Ada</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @elseif ($dsk->id == 31)
                                                                    <div class="row g-3">
                                                                        <div class="col-md-12">
                                                                            <div class="form-check-inline">
                                                                                <input type="text"
                                                                                    class="form-control form-control-sm mb-2 "
                                                                                    id="panjang2-31" name="dskid_2_31"
                                                                                    placeholder="         m" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @elseif ($dsk->id == 32)
                                                                    <div class="row g-3">
                                                                        <div class="col-md-12">
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="dskid_2_32"
                                                                                    id="rusak_ringan2-10" value="Baik"
                                                                                    required>
                                                                                <label class="form-check-label"
                                                                                    for="rusak_ringan">
                                                                                    Baik</label>
                                                                            </div>
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="dskid_2_32"
                                                                                    id="rusak_ringan2-32"
                                                                                    value="Rusak Ringan" required>
                                                                                <label class="form-check-label"
                                                                                    for="rusak_ringan">
                                                                                    Rusak Ringan</label>
                                                                            </div>
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="dskid_2_32"
                                                                                    id="rusak_sedang2-32"
                                                                                    value="Rusak Sedang" required>
                                                                                <label class="form-check-label"
                                                                                    for="rusak_sedang">
                                                                                    Rusak Sedang</label>
                                                                            </div>
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="dskid_2_32"
                                                                                    id="rusak_berat2-32" value="Rusak Berat"
                                                                                    required>
                                                                                <label class="form-check-label"
                                                                                    for="rusak_berat">
                                                                                    Rusak Berat</label>
                                                                            </div>
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="dskid_2_32"
                                                                                    id="rusak_total2-32" value="Rusak Total"
                                                                                    required>
                                                                                <label class="form-check-label"
                                                                                    for="rusak_total">
                                                                                    Rusak Total</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @elseif ($dsk->id == 16)
                                                                    <div class="row g-3">
                                                                        <div class="col-md-12">
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="dskid_2_16"
                                                                                    id="beton2-16" value="Beton" required>
                                                                                <label class="form-check-label"
                                                                                    for="beton">Beton</label>
                                                                            </div>
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="dskid_2_16"
                                                                                    id="kayu2-16" value="Kayu" required>
                                                                                <label class="form-check-label"
                                                                                    for="kayu">Kayu</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @elseif ($dsk->id == 17)
                                                                    <div class="row g-3">
                                                                        <div class="col-md-12">
                                                                            <div class="form-check-inline">
                                                                                <input type="text"
                                                                                    class="form-control form-control-sm mb-2"
                                                                                    id="panjang2-8" name="dskid_2_17_1"
                                                                                    placeholder="Panjang (satuan m)" required>
                                                                                <div class="input-group input-group-sm">
                                                                                    <input type="text"
                                                                                        class="form-control form-control-sm"
                                                                                        id="dimensi_lebar2-8"
                                                                                        name="dskid_2_17_2"
                                                                                        placeholder="Lebar (satuan cm)"
                                                                                        required>
                                                                                    <span
                                                                                        class="input-group-text form-control-sm">x</span>
                                                                                    <input type="text"
                                                                                        class="form-control form-control-sm"
                                                                                        id="dimensi_tinggi2-8"
                                                                                        name="dskid_2_17_3"
                                                                                        placeholder="Tinggi (satuan cm)"
                                                                                        required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @elseif ($dsk->id == 18)
                                                                    <div class="row g-3">
                                                                        <div class="col-md-12">
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="dskid_2_18"
                                                                                    id="ada2-18" value="Ada" required>
                                                                                <label class="form-check-label"
                                                                                    for="ada">Ada</label>
                                                                            </div>
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="dskid_2_18"
                                                                                    id="tidak-ada2-18" value="Tidak Ada"
                                                                                    required>
                                                                                <label class="form-check-label"
                                                                                    for="tidak-ada">Tidak
                                                                                    Ada</label>
                                                                            </div>
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="dskid_2_18"
                                                                                    id="sebagian-ada2-18"
                                                                                    value="Sebagian Ada" required>
                                                                                <label class="form-check-label"
                                                                                    for="sebagian-ada">Sebagian
                                                                                    Ada</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @elseif ($dsk->id == 19)
                                                                    <div class="row g-3">
                                                                        <div class="col-md-12">
                                                                            <div class="form-check-inline">
                                                                                <input type="text"
                                                                                    class="form-control form-control-sm mb-2 "
                                                                                    id="panjang2-19" name="dskid_2_19"
                                                                                    placeholder="         m" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @elseif ($dsk->id == 20)
                                                                    <div class="row g-3">
                                                                        <div class="col-md-12">
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="dskid_2_20"
                                                                                    id="rusak_ringan2-10" value="Baik"
                                                                                    required>
                                                                                <label class="form-check-label"
                                                                                    for="rusak_ringan">
                                                                                    Baik</label>
                                                                            </div>
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="dskid_2_20"
                                                                                    id="rusak_ringan2-20"
                                                                                    value="Rusak Ringan" required>
                                                                                <label class="form-check-label"
                                                                                    for="rusak_ringan">
                                                                                    Rusak Ringan</label>
                                                                            </div>
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="dskid_2_20"
                                                                                    id="rusak_sedang2-20"
                                                                                    value="Rusak Sedang" required>
                                                                                <label class="form-check-label"
                                                                                    for="rusak_sedang">
                                                                                    Rusak Sedang</label>
                                                                            </div>
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="dskid_2_20"
                                                                                    id="rusak_berat2-20" value="Rusak Berat"
                                                                                    required>
                                                                                <label class="form-check-label"
                                                                                    for="rusak_berat">
                                                                                    Rusak Berat</label>
                                                                            </div>
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="dskid_2_20"
                                                                                    id="rusak_total2-20" value="Rusak Total"
                                                                                    required>
                                                                                <label class="form-check-label"
                                                                                    for="rusak_total">
                                                                                    Rusak Total</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @elseif ($dsk->id == 21)
                                                                    <div class="row g-3">
                                                                        <div class="col-md-12">
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="dskid_2_21"
                                                                                    id="beton2-21" value="Beton" required>
                                                                                <label class="form-check-label"
                                                                                    for="beton">Beton</label>
                                                                            </div>
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="dskid_2_21"
                                                                                    id="kayu2-21" value="Kayu" required>
                                                                                <label class="form-check-label"
                                                                                    for="kayu">Kayu</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @elseif ($dsk->id == 22)
                                                                    <div class="row g-3">
                                                                        <div class="col-md-12">
                                                                            <div class="form-check-inline">
                                                                                <input type="text"
                                                                                    class="form-control form-control-sm mb-2"
                                                                                    id="panjang2-8" name="dskid_2_22_1"
                                                                                    placeholder="Panjang (satuan m)" required>
                                                                                <div class="input-group input-group-sm">
                                                                                    <input type="text"
                                                                                        class="form-control form-control-sm"
                                                                                        id="dimensi_lebar2-8"
                                                                                        name="dskid_2_22_2"
                                                                                        placeholder="Lebar (satuan cm)"
                                                                                        required>
                                                                                    <span
                                                                                        class="input-group-text form-control-sm">x</span>
                                                                                    <input type="text"
                                                                                        class="form-control form-control-sm"
                                                                                        id="dimensi_tinggi2-8"
                                                                                        name="dskid_2_22_3"
                                                                                        placeholder="Tinggi (satuan cm)"
                                                                                        required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @elseif ($dsk->id == 23)
                                                                    <div class="row g-3">
                                                                        <div class="col-md-12">
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="dskid_2_23"
                                                                                    id="ada2-23" value="Ada" required>
                                                                                <label class="form-check-label"
                                                                                    for="ada">Ada</label>
                                                                            </div>
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="dskid_2_23"
                                                                                    id="tidak-ada2-23" value="Tidak Ada"
                                                                                    required>
                                                                                <label class="form-check-label"
                                                                                    for="tidak-ada">Tidak
                                                                                    Ada</label>
                                                                            </div>
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="dskid_2_23"
                                                                                    id="sebagian-ada2-23"
                                                                                    value="Sebagian Ada" required>
                                                                                <label class="form-check-label"
                                                                                    for="sebagian-ada">Sebagian
                                                                                    Ada</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @elseif ($dsk->id == 24)
                                                                    <div class="row g-3">
                                                                        <div class="col-md-12">
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="dskid_2_24"
                                                                                    id="rusak_ringan2-10" value="Baik"
                                                                                    required>
                                                                                <label class="form-check-label"
                                                                                    for="rusak_ringan">
                                                                                    Baik</label>
                                                                            </div>
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="dskid_2_24"
                                                                                    id="rusak_ringan2-24"
                                                                                    value="Rusak Ringan" required>
                                                                                <label class="form-check-label"
                                                                                    for="rusak_ringan">
                                                                                    Rusak Ringan</label>
                                                                            </div>
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="dskid_2_24"
                                                                                    id="rusak_sedang2-24"
                                                                                    value="Rusak Sedang" required>
                                                                                <label class="form-check-label"
                                                                                    for="rusak_sedang">
                                                                                    Rusak Sedang</label>
                                                                            </div>
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="dskid_2_24"
                                                                                    id="rusak_berat2-24" value="Rusak Berat"
                                                                                    required>
                                                                                <label class="form-check-label"
                                                                                    for="rusak_berat">
                                                                                    Rusak Berat</label>
                                                                            </div>
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="dskid_2_24"
                                                                                    id="rusak_total2-24" value="Rusak Total"
                                                                                    required>
                                                                                <label class="form-check-label"
                                                                                    for="rusak_total">
                                                                                    Rusak Total</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @break

                                                            @case(3)
                                                                @if ($dsk->id == 25)
                                                                    <div class="row g-3">
                                                                        <div class="col-md-12">
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="dskid_3_25"
                                                                                    id="rusak_ringan2-10" value="Baik"
                                                                                    required>
                                                                                <label class="form-check-label"
                                                                                    for="rusak_ringan">
                                                                                    Baik</label>
                                                                            </div>
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="dskid_3_25"
                                                                                    id="rusak_ringan2-24"
                                                                                    value="Rusak Ringan" required>
                                                                                <label class="form-check-label"
                                                                                    for="rusak_ringan">
                                                                                    Rusak Ringan</label>
                                                                            </div>
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="dskid_3_25"
                                                                                    id="rusak_sedang2-24"
                                                                                    value="Rusak Sedang" required>
                                                                                <label class="form-check-label"
                                                                                    for="rusak_sedang">
                                                                                    Rusak Sedang</label>
                                                                            </div>
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="dskid_3_25"
                                                                                    id="rusak_berat2-24" value="Rusak Berat"
                                                                                    required>
                                                                                <label class="form-check-label"
                                                                                    for="rusak_berat">
                                                                                    Rusak Berat</label>
                                                                            </div>
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="dskid_3_25"
                                                                                    id="rusak_total2-24" value="Rusak Total"
                                                                                    required>
                                                                                <label class="form-check-label"
                                                                                    for="rusak_total">
                                                                                    Rusak Total</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @elseif($dsk->id == 26)
                                                                    <div class="row g-3">
                                                                        <div class="col-md-12">
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="dskid_3_26"
                                                                                    id="rusak_ringan2-10" value="Baik"
                                                                                    required>
                                                                                <label class="form-check-label"
                                                                                    for="rusak_ringan">
                                                                                    Baik</label>
                                                                            </div>
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="dskid_3_26"
                                                                                    id="rusak_ringan2-24"
                                                                                    value="Rusak Ringan" required>
                                                                                <label class="form-check-label"
                                                                                    for="rusak_ringan">
                                                                                    Rusak Ringan</label>
                                                                            </div>
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="dskid_3_26"
                                                                                    id="rusak_sedang2-24"
                                                                                    value="Rusak Sedang" required>
                                                                                <label class="form-check-label"
                                                                                    for="rusak_sedang">
                                                                                    Rusak Sedang</label>
                                                                            </div>
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="dskid_3_26"
                                                                                    id="rusak_berat2-24" value="Rusak Berat"
                                                                                    required>
                                                                                <label class="form-check-label"
                                                                                    for="rusak_berat">
                                                                                    Rusak Berat</label>
                                                                            </div>
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="dskid_3_26"
                                                                                    id="rusak_total2-24" value="Rusak Total"
                                                                                    required>
                                                                                <label class="form-check-label"
                                                                                    for="rusak_total">
                                                                                    Rusak Total</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @elseif($dsk->id == 27)
                                                                    <div class="row g-3">
                                                                        <div class="col-md-12">
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="dskid_3_27"
                                                                                    id="rusak_ringan2-10" value="Baik"
                                                                                    required>
                                                                                <label class="form-check-label"
                                                                                    for="rusak_ringan">
                                                                                    Baik</label>
                                                                            </div>
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="dskid_3_27"
                                                                                    id="rusak_ringan2-24"
                                                                                    value="Rusak Ringan" required>
                                                                                <label class="form-check-label"
                                                                                    for="rusak_ringan">
                                                                                    Rusak Ringan</label>
                                                                            </div>
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="dskid_3_27"
                                                                                    id="rusak_sedang2-24"
                                                                                    value="Rusak Sedang" required>
                                                                                <label class="form-check-label"
                                                                                    for="rusak_sedang">
                                                                                    Rusak Sedang</label>
                                                                            </div>
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="dskid_3_27"
                                                                                    id="rusak_berat2-24" value="Rusak Berat"
                                                                                    required>
                                                                                <label class="form-check-label"
                                                                                    for="rusak_berat">
                                                                                    Rusak Berat</label>
                                                                            </div>
                                                                            <div class="form-check-inline">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="dskid_3_27"
                                                                                    id="rusak_total2-24" value="Rusak Total"
                                                                                    required>
                                                                                <label class="form-check-label"
                                                                                    for="rusak_total">
                                                                                    Rusak Total</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @default
                                                        @endswitch
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endforeach
                            </tbody>
                        @endforeach
                    </table>
                </div>
                <div class="block-footer p-4">
                    <a id="show-confirm-button" class="btn btn-sm btn-success w-100"><i
                            class="fa-solid fa-floppy-disk me-2"></i>Simpan Data</a>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('custom-script')
    <script>
        document.getElementById('show-confirm-button').addEventListener('click', function() {
            // Perform validation here
            var isValid = validateForm(); // Call the validation function
            
            if (isValid) {
                Swal.fire({
                    title: 'Konfirmasi Simpan',
                    text: 'Apakah Anda yakin ingin menyimpan data?',
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
            }
        });

        // Validation function
        function validateForm() {
            var isValid = true;

            // Get all form elements with the "required" attribute
            var requiredFields = document.querySelectorAll('[required]');

            // Loop through each required field and check if it's empty
            for (var i = 0; i < requiredFields.length; i++) {
                if (!requiredFields[i].value) {
                    isValid = false;
                    break; // Terminate the loop if an empty required field is found
                }
            }

            return isValid;
        }

    </script>
@endpush
