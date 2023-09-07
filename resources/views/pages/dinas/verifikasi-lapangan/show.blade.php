@extends('pages.dinas.layouts.main')

@section('title', 'Hasil Verifikasi Pengajuan')

@push('custom-css')
    <style>
        .inp {
            border: none;
            border-bottom: 1px solid #000000;
            padding: 5px 10px;
            outline: none;
        }
        @media print {
            #exclude-from-print {
                display: none;
            }
        }
    </style>
@endpush

@section('content')
    <!-- Page Content -->
    <div class="content">
        <nav class="breadcrumb push bg-transparent rounded push px-4 py-2" id="exclude-from-print">
            <a class="breadcrumb-item" href="{{ route('verifikasi-lanjutan.index') }}"><i
                    class="fas fa-home me-1"></i>Verifikasi Lapangan</a>
            <span class="breadcrumb-item active">Hasil Verifikasi Lapangan</span>
        </nav>
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Hasil Verifikasi Lapangan <small></small>
                </h3>
                <div class="block-options">
                    <button type="button" class="btn-block-option"id="print-button">
                        <i class="fas fa-print"></i>
                    </button>
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
            <div class="block-content">
                <table class="table table-bordered">
                    <tbody class="fs-xs">
                        <tr>
                            <td class="text-left bg-black-25" colspan="3">
                                <strong>DATA LOKASI</strong>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center" style="width: 3%;">1</td>
                            <td style="width: 30%;">Provinsi </td>
                            <td>{{ $dataPengajuan->user->dataDiri->province->name }}</td>
                        </tr>
                        <tr>
                            <td class="text-center" style="width: 3%;">2</td>
                            <td style="width: 30%;">Kabupaten/Kota</td>
                            <td>{{ $dataPengajuan->user->dataDiri->regency->name }}</td>
                        </tr>
                        <tr>
                            <td class="text-center" style="width: 3%;">3</td>
                            <td style="width: 30%;">Kecamatan</td>
                            <td>{{ $dataPengajuan->user->dataDiri->district->name }}</td>
                        </tr>
                        <tr>
                            <td class="text-center" style="width: 3%;">4</td>
                            <td style="width: 30%;">Desa/Kelurahan</td>
                            <td>{{ $dataPengajuan->user->dataDiri->village->name }}</td>
                        </tr>
                    </tbody>
                    <tbody class="fs-xs">
                        <tr>
                            <td class="text-left bg-black-25" colspan="3">
                                <strong>IDENTITAS PENGHUNI RUMAH</strong>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center" style="width: 3%;">1</td>
                            <td style="width: 30%;">Nama Lengkap </td>
                            <td>{{ $dataPengajuan->user->dataDiri->nama }}</td>
                        </tr>
                        <tr>
                            <td class="text-center" style="width: 3%;">2</td>
                            <td style="width: 30%;">Usia (Tahun)</td>
                            <td>
                                @php
                                    $tanggal_lahir = new DateTime($dataPengajuan->user->dataDiri->tanggal_lahir);;
                                    $tanggal_sekarang = new DateTime();
                                    $umur = $tanggal_sekarang->diff($tanggal_lahir)->y;
                                @endphp
                                {{ $umur }} tahun
                                {{-- {{ $dataPengajuan->user->dataDiri->tanggal_lahir }} --}}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center" style="width: 3%;">3</td>
                            <td style="width: 30%;">Pendidikan Terakhir</td>
                            <td>{{ $dataPengajuan->user->dataDiri->pendidikan_terakhir }}</td>
                        </tr>
                        <tr>
                            <td class="text-center" style="width: 3%;">4</td>
                            <td style="width: 30%;">Jenis Kelamin</td>
                            <td>{{ $dataPengajuan->user->dataDiri->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                        </tr>
                        <tr>
                            <td class="text-center" style="width: 3%;">5</td>
                            <td style="width: 30%;">Alamat Lengkap</td>
                            <td>{{ $dataPengajuan->user->dataDiri->alamat }}</td>
                        </tr>
                    </tbody>
                    <tbody class="fs-xs">
                        <tr>
                            <td class="text-left bg-black-25" colspan="3">
                                <strong>ADMINISTRASI</strong>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center" style="width: 3%;">1</td>
                            <td style="width: 30%;">
                                NIK 
                            </td>
                            <td>
                                {{ $dataPengajuan->user->dataDiri->nik }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center" style="width: 3%;">2</td>
                            <td style="width: 30%;">
                                KTP 
                            </td>
                            <td>
                                @if ($ktp != NULL)
                                    <span class="form-text text-right"><a
                                            target="_blank"
                                            href="{{ asset('storage/uploaded') }}/{{ $ktp->file }}"><i
                                                class="fa-solid fa-link me-2"></i>Foto</a>
                                    </span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center" style="width: 3%;">3</td>
                            <td style="width: 30%;">
                                Kartu Keluarga 
                            </td>
                            <td>
                                @if ($kk != NULL)
                                    <span class="form-text text-right"><a
                                            target="_blank"
                                            href="{{ asset('storage/uploaded') }}/{{ $kk->file }}"><i
                                                class="fa-solid fa-link me-2"></i>File Pdf</a>
                                    </span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center" style="width: 3%;">4</td>
                            <td style="width: 30%;">
                                Pekerjaan Utama 
                            </td>
                            <td>
                                {{ $dataPengajuan->user->dataDiri->pekerjaan }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center" style="width: 3%;">5</td>
                            <td style="width: 30%;">
                                Surat Domisili 
                            </td>
                            <td>
                                @if ($domisili != NULL)
                                    <span class="form-text text-right"><a
                                            target="_blank"
                                            href="{{ asset('storage/uploaded') }}/{{ $domisili->file }}"><i
                                                class="fa-solid fa-link me-2"></i>File Pdf</a>
                                    </span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center" style="width: 3%;">6</td>
                            <td style="width: 30%;">
                                Surat Keterangan Kurang Mampu 
                            </td>
                            <td>
                                @if ($skkm != NULL)
                                    <span class="form-text text-right"><a
                                            target="_blank"
                                            href="{{ asset('storage/uploaded') }}/{{ $skkm->file }}"><i
                                                class="fa-solid fa-link me-2"></i>File Pdf</a>
                                    </span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center" style="width: 3%;">7</td>
                            <td style="width: 30%;">
                                Surat Pengantar Kelurahan 
                            </td>
                            <td>
                                @if ($surat_pengantar != NULL)
                                    <span class="form-text text-right"><a
                                            target="_blank"
                                            href="{{ asset('storage/uploaded') }}/{{ $surat_pengantar->file }}"><i
                                                class="fa-solid fa-link me-2"></i>File Pdf</a>
                                    </span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center" style="width: 3%;">8</td>
                            <td style="width: 30%;">
                                Sertifikat Tanah
                            </td>
                            <td>
                                @if ($sertifikat != NULL)
                                    <span class="form-text text-right"><a
                                            target="_blank"
                                            href="{{ asset('storage/uploaded') }}/{{ $sertifikat->file }}"><i
                                                class="fa-solid fa-link me-2"></i>File Pdf</a>
                                    </span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                    @foreach ($kategori as $k)
                        <tbody class="fs-xs">
                            <tr>
                                <td class="text-left bg-black-25" colspan="3">
                                    <strong>{{ $k->nama }}</strong>
                                </td>
                            </tr>
                            @foreach ($k->subKategori as $sk)
                                @foreach ($hasilVerifikasi as $hasil)
                                    @if ($hasil->sub_kategori_id == $sk->id)
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
                                                                            value="Lokal Tradisional" id="skid_1"
                                                                            name="skid_1" disabled
                                                                            {{ $hasil->ket == 'Lokal Tradisional' ? 'checked' : '' }}>
                                                                        <label class="form-check-label" for="skid_1">Lokal /
                                                                            Tradisional</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            value="Non Lokal" id="skid_1" name="skid_1"
                                                                            disabled
                                                                            {{ $hasil->ket == 'Non Lokal' ? 'checked' : '' }}>
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
                                                                            value="tembok" id="skid_2" name="skid_2"
                                                                            disabled
                                                                            {{ $hasil->ket == 'tembok' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="skid_2">Tembok</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            value="tembok_panggung" id="skid_2"
                                                                            name="skid_2" disabled
                                                                            {{ $hasil->ket == 'tembok_panggung' ? 'checked' : '' }}>
                                                                        <label class="form-check-label" for="skid_2">Tembok –
                                                                            Panggung</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            value="kayu_tapak" id="skid_2" name="skid_2"
                                                                            disabled
                                                                            {{ $hasil->ket == 'kayu_tapak' ? 'checked' : '' }}>
                                                                        <label class="form-check-label" for="skid_2">Kayu
                                                                            Tapak</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            value="setengah_tembok" id="skid_2"
                                                                            name="skid_2" disabled
                                                                            {{ $hasil->ket == 'setengah_tembok' ? 'checked' : '' }}>
                                                                        <label class="form-check-label" for="skid_2">Setengah
                                                                            Tembok</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            value="kayu_panggung" id="skid_2" name="skid_2"
                                                                            disabled
                                                                            {{ $hasil->ket == 'kayu_panggung' ? 'checked' : '' }}>
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
                                                                            id="skid_3" name="skid_3" disabled
                                                                            {{ $hasil->ket == 'Ada' ? 'checked' : '' }}
                                                                            value="Ada">
                                                                        <label class="form-check-label" for="skid_3">Ada
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            id="skid_3" name="skid_3" disabled
                                                                            {{ $hasil->ket == 'Tidak Ada' ? 'checked' : '' }}
                                                                            value="Tidak Ada">
                                                                        <label class="form-check-label" for="skid_3">Tidak
                                                                            Ada</label>
                                                                    </div>
                                                                    <div class="form form-check-inline">
                                                                        @if ($hasil->det_ket != null)
                                                                            <span id="hasil->det_ket" class="form-text"><a
                                                                                    target="_blank"
                                                                                    href="{{ asset('storage') }}/{{ $hasil->det_ket }}"><i
                                                                                        class="fa-solid fa-link me-2"></i>Foto</a>
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @break

                                                        @case(4)
                                                            <div class="row g-3">
                                                                <div class="col-md-12">
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            id="skid_4" name="skid_4" disabled
                                                                            {{ $hasil->ket == 'Ada' ? 'checked' : '' }}
                                                                            value="Ada">
                                                                        <label class="form-check-label" for="skid_4">Ada
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            id="radio4-2" name="skid_4" disabled
                                                                            {{ $hasil->ket == 'Tidak Ada' ? 'checked' : '' }}
                                                                            value="Tidak Ada">
                                                                        <label class="form-check-label" for="skid_4">Tidak
                                                                            Ada</label>
                                                                    </div>
                                                                    <div class="form form-check-inline">
                                                                        @if ($hasil->det_ket != null)
                                                                            <span id="hasil->det_ket" class="form-text"><a
                                                                                    target="_blank"
                                                                                    href="{{ asset('storage') }}/{{ $hasil->det_ket }}"><i
                                                                                        class="fa-solid fa-link me-2"></i>Foto</a>
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @break

                                                        @case(5)
                                                            <div class="row g-3">
                                                                <div class="col-md-12">
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            id="skid_5" name="skid_5" disabled
                                                                            {{ $hasil->ket == 'Ada' ? 'checked' : '' }}
                                                                            value="Ada">
                                                                        <label class="form-check-label" for="skid_5">Ada
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            id="skid_5" name="skid_5" disabled
                                                                            {{ $hasil->ket == 'Tidak Ada' ? 'checked' : '' }}
                                                                            value="Tidak Ada">
                                                                        <label class="form-check-label" for="skid_5">Tidak
                                                                            Ada</label>
                                                                    </div>
                                                                    <div class="form form-check-inline">
                                                                        @if ($hasil->det_ket != null)
                                                                            <span id="hasil->det_ket" class="form-text"><a
                                                                                    target="_blank"
                                                                                    href="{{ asset('storage') }}/{{ $hasil->det_ket }}"><i
                                                                                        class="fa-solid fa-link me-2"></i>Foto</a>
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @break

                                                        @case(6)
                                                            <div class="row g-3">
                                                                <div class="col-md-12">
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            id="skid_6" name="skid_6" disabled
                                                                            {{ $hasil->ket == 'Ada' ? 'checked' : '' }}
                                                                            value="Ada">
                                                                        <label class="form-check-label" for="skid_6">Ada
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            id="skid_6" name="skid_6" disabled
                                                                            {{ $hasil->ket == 'Tidak Ada' ? 'checked' : '' }}
                                                                            value="Tidak Ada">
                                                                        <label class="form-check-label" for="skid_6">Tidak
                                                                            Ada</label>
                                                                    </div>
                                                                    <div class="form form-check-inline">
                                                                        @if ($hasil->det_ket != null)
                                                                            <span id="hasil->det_ket" class="form-text"><a
                                                                                    target="_blank"
                                                                                    href="{{ asset('storage') }}/{{ $hasil->det_ket }}"><i
                                                                                        class="fa-solid fa-link me-2"></i>Foto</a>
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @break

                                                        @case(7)
                                                            <div class="row g-3">
                                                                <div class="col-md-12">
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            id="skid_7" name="skid_7" disabled
                                                                            {{ $hasil->ket == 'Ada' ? 'checked' : '' }}
                                                                            value="Ada">
                                                                        <label class="form-check-label" for="skid_7">Ada
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            id="skid_7" name="skid_7" disabled
                                                                            {{ $hasil->ket == 'Tidak Ada' ? 'checked' : '' }}
                                                                            value="Tidak Ada">
                                                                        <label class="form-check-label" for="skid_7">Tidak
                                                                            Ada</label>
                                                                    </div>
                                                                    <div class="form form-check-inline mb-2">
                                                                        @if ($hasil->det_ket != null)
                                                                            <span id="hasil->det_ket" class="form-text"><a
                                                                                    target="_blank"
                                                                                    href="{{ asset('storage') }}/{{ $hasil->det_ket }}"><i
                                                                                        class="fa-solid fa-link me-2"></i>Foto</a>
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @break

                                                        @case(8)
                                                            <div class="row g-3">
                                                                <div class="col-md-12">
                                                                    <div class="form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            id="genteng" name="skid_8" disabled
                                                                            {{ $hasil->ket == 'Genteng' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="genteng">Genteng</label>
                                                                    </div>
                                                                    <div class="form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            id="jerami" name="skid_8" disabled
                                                                            {{ $hasil->ket == 'Jerami' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="jerami">Jerami</label>
                                                                    </div>
                                                                    <div class="form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            id="rumbia" name="skid_8" disabled
                                                                            {{ $hasil->ket == 'Rumbia' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="rumbia">Rumbia</label>
                                                                    </div>
                                                                    <div class="form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            id="fiber-cement" name="skid_8" disabled
                                                                            {{ $hasil->ket == 'Fiber Cement' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="fiber-cement">Fiber
                                                                            cement</label>
                                                                    </div>
                                                                    <div class="form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            id="asbes" name="skid_8" disabled
                                                                            {{ $hasil->ket == 'Asbes' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="asbes">Asbes</label>
                                                                    </div>
                                                                    <div class="form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            id="ijuk" name="skid_8" disabled
                                                                            {{ $hasil->ket == 'Ijuk' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="ijuk">Ijuk</label>
                                                                    </div>
                                                                    <div class="form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            id="seng" name="skid_8" disabled
                                                                            {{ $hasil->ket == 'Seng' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="seng">Seng</label>
                                                                    </div>
                                                                    <div class="form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            id="daun-daun" name="skid_8" disabled
                                                                            {{ $hasil->ket == 'Daun-daun' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="daun-daun">Daun-daun</label>
                                                                    </div>
                                                                    <div class="form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            id="lainnya" name="skid_8" disabled
                                                                            {{ $hasil->ket == 'Lainnya' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="lainnya">Lainnya</label>
                                                                    </div>
                                                                    <div class="form-check-inline my-1">
                                                                        @if ($hasil->det_ket != null)
                                                                            <input class="form-control form-control-sm inp"
                                                                                type="text" id="lainnya-input"
                                                                                name="det_skid_8" placeholder="lainnya"
                                                                                disabled value="{{ $hasil->det_ket }}">
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @break

                                                        @case(9)
                                                            <div class="row g-3">
                                                                <div class="col-md-12">
                                                                    <div class="form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            id="tembok-plesteran" name="skid_9" disabled
                                                                            {{ $hasil->ket == 'Tembok Plesteran' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="tembok-plesteran">Tembok
                                                                            Plesteran</label>
                                                                    </div>
                                                                    <div class="form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            id="tembok-tanpa-plesteran" name="skid_9"
                                                                            disabled
                                                                            {{ $hasil->ket == 'Tembok Tanpa Plesteran' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="tembok-tanpa-plesteran">Tembok Tanpa
                                                                            Plesteran</label>
                                                                    </div>
                                                                    <div class="form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            id="anyaman-bambu" name="skid_9" disabled
                                                                            {{ $hasil->ket == 'Anyaman Bambu' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="anyaman-bambu">Anyaman
                                                                            Bambu</label>
                                                                    </div>
                                                                    <div class="form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            id="grc-asbes" name="skid_9" disabled
                                                                            {{ $hasil->ket == 'GRC / Asbes' ? 'checked' : '' }}>
                                                                        <label class="form-check-label" for="grc-asbes">GRC /
                                                                            Asbes</label>
                                                                    </div>
                                                                    <div class="form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            id="kayu-papan" name="skid_9" disabled
                                                                            {{ $hasil->ket == 'Kayu / Papan' ? 'checked' : '' }}>
                                                                        <label class="form-check-label" for="kayu-papan">Kayu
                                                                            /
                                                                            Papan</label>
                                                                    </div>
                                                                    <div class="form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            id="lainnya" name="skid_9" disabled
                                                                            {{ $hasil->ket == 'Lainnya' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="lainnya">Lainnya</label>
                                                                    </div>
                                                                    <div class="form-check-inline my-1">
                                                                        @if ($hasil->det_ket != null)
                                                                            <input class="form-control form-control-sm inp"
                                                                                type="text" id="lainnya-input"
                                                                                name="det_skid_9" placeholder="lainnya"
                                                                                disabled value="{{ $hasil->det_ket }}">
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @break

                                                        @case(10)
                                                            <div class="row g-3">
                                                                <div class="col-md-12">
                                                                    <div class="form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            id="marmer-granit" name="skid_10" disabled
                                                                            {{ $hasil->ket == 'Marmer/Granit' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="marmer-granit">Marmer/Granit</label>
                                                                    </div>
                                                                    <div class="form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            id="plesteran" name="skid_10" disabled
                                                                            {{ $hasil->ket == 'Plesteran' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="plesteran">Plesteran</label>
                                                                    </div>
                                                                    <div class="form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            id="tanah" name="skid_10" disabled
                                                                            {{ $hasil->ket == 'Tanah' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="tanah">Tanah</label>
                                                                    </div>
                                                                    <div class="form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            id="keramik" name="skid_10" disabled
                                                                            {{ $hasil->ket == 'Keramik' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="keramik">Keramik</label>
                                                                    </div>
                                                                    <div class="form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            id="ubin-tegel" name="skid_10" disabled
                                                                            {{ $hasil->ket == 'Ubin / Tegel' ? 'checked' : '' }}>
                                                                        <label class="form-check-label" for="ubin-tegel">Ubin
                                                                            /
                                                                            Tegel</label>
                                                                    </div>
                                                                    <div class="form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            id="bambu" name="skid_10" disabled
                                                                            {{ $hasil->ket == 'Bambu' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="bambu">Bambu</label>
                                                                    </div>
                                                                    <div class="form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            id="kayu" name="skid_10" disabled
                                                                            {{ $hasil->ket == 'Kayu' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="kayu">Kayu</label>
                                                                    </div>
                                                                    <div class="form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            id="lainnya" name="skid_10" disabled
                                                                            {{ $hasil->ket == 'Lainnya' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="lainnya">Lainnya</label>
                                                                    </div>
                                                                    <div class="form-check-inline my-1">
                                                                        @if ($hasil->det_ket != null)
                                                                            <input class="form-control form-control-sm inp"
                                                                                type="text" id="lainnya-input"
                                                                                name="det_skid_10" placeholder="lainnya"
                                                                                disabled value="{{ $hasil->det_ket }}">
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @break

                                                        @case(11)
                                                            <div class="row g-3">
                                                                <div class="col-md-4">
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            id="skid_11" value="Ada" name="skid_11"
                                                                            disabled
                                                                            {{ $hasil->ket == 'Ada' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="skid_11">Ada</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            id="skid_11" value="Tidak Ada" name="skid_11"
                                                                            disabled
                                                                            {{ $hasil->ket == 'Tidak Ada' ? 'checked' : '' }}>
                                                                        <label class="form-check-label" for="skid_11">Tidak
                                                                            Ada</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="ket-skid_11" id="Cukup" value="cukup"
                                                                            disabled
                                                                            {{ $hasil->det_ket == 'cukup' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="ket-skid_11">Cukup</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="ket-skid_11" id="tidakmencukupi"
                                                                            value="Tidak Mencukupi" disabled
                                                                            {{ $hasil->det_ket == 'Tidak Mencukupi' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="ket-skid_11">Tidak
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
                                                                            id="skid_12" value="Ada" name="skid_12"
                                                                            disabled
                                                                            {{ $hasil->ket == 'Ada' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="skid_12">Ada</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            id="skid_12" value="Tidak Ada" name="skid_12"
                                                                            disabled
                                                                            {{ $hasil->ket == 'Tidak Ada' ? 'checked' : '' }}>
                                                                        <label class="form-check-label" for="skid_12">Tidak
                                                                            Ada</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="ket_skid_12" id="Cukup" disabled
                                                                            {{ $hasil->det_ket == 'cukup' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="ket_skid_12">Cukup</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="ket_skid_12" id="tidakmencukupi" disabled
                                                                            {{ $hasil->det_ket == 'Tidak Mencukupi' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="ket_skid_12">Tidak
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
                                                                            id="skid_13" value="Ada" name="skid_13"
                                                                            disabled
                                                                            {{ $hasil->ket == 'Ada' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="skid_13">Ada</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            id="skid_13" value="Tidak Ada" name="skid_13"
                                                                            disabled
                                                                            {{ $hasil->ket == 'Tidak Ada' ? 'checked' : '' }}>
                                                                        <label class="form-check-label" for="skid_13">Tidak
                                                                            Ada</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="ket_skid_13" id="cukup" disabled
                                                                            {{ $hasil->det_ket == 'Baik' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="inlineRadio1">Baik
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="ket_skid_13" id="tidakmencukupi" disabled
                                                                            {{ $hasil->det_ket == 'Rusak Sedang' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="inlineRadio2">Rusak
                                                                            Sedang</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="ket_skid_13" id="tidakmencukupi" disabled
                                                                            {{ $hasil->det_ket == 'Rusak Ringan' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="inlineRadio2">Rusak
                                                                            Ringan</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="ket_skid_13" id="tidakmencukupi" disabled
                                                                            {{ $hasil->det_ket == 'Rusak Berat' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="inlineRadio2">Rusak
                                                                            Berat</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="ket_skid_13" id="tidakmencukupi" disabled
                                                                            {{ $hasil->det_ket == 'Rusak Total' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="inlineRadio2">Rusak
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
                                                                            id="skid_14" value="Ada" name="skid_14"
                                                                            disabled {{ $hasil->ket == 'Ada' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="skid_14">Ada</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            id="skid_14" value="Tidak Ada" name="skid_14"
                                                                            disabled {{ $hasil->ket == 'Tidak Ada' ? 'checked' : '' }}>
                                                                        <label class="form-check-label" for="skid_14">Tidak
                                                                            Ada</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="ket_skid_14"
                                                                            id="> 10 m dari
                                                                        sumber
                                                                        air"
                                                                            value="cukup" disabled {{ $hasil->det_ket == '> 10 m dari
                                                                            sumber
                                                                            air' ? 'checked' : '' }}>
                                                                        <label class="form-check-label" for="inlineRadio1"> >
                                                                            10 m
                                                                            dari
                                                                            sumber
                                                                            air </label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="ket_skid_14" id="tidakmencukupi"
                                                                            value="< 10 m dari sumber air" disabled {{ $hasil->det_ket == '< 10 m dari
                                                                            sumber
                                                                            air' ? 'checked' : '' }}>
                                                                        <label class="form-check-label" for="inlineRadio2">
                                                                            < 10 m dari sumber air</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="ket_skid_14" id="tidakmencukupi"
                                                                            value="tidak tahu" disabled {{ $hasil->det_ket == 'tidak tahu' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="inlineRadio2">Tidak
                                                                            Tahu
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @break

                                                        @case(15)
                                                            <div class="row g-3">
                                                                <div class="col-md-12">
                                                                    <input class="form-control form-control-sm"
                                                                        type="text" name="skid_15"
                                                                        placeholder="...... orang"
                                                                        aria-label=".form-control-sm example" disabled value="{{ $hasil->ket }} orang">
                                                                </div>
                                                            </div>
                                                        @break

                                                        @case(16)
                                                            <div class="row g-3">
                                                                <div class="col-md-6">
                                                                    @php
                                                                        $decodedArray = json_decode($hasil->ket);
                                                                    @endphp
                                                                    <input class="form-control form-control-sm mb-1"
                                                                        type="text"
                                                                        placeholder="Ukuran   : _____m x ______m"
                                                                        name="ukuran_skid_16" disabled value="{{ $decodedArray[0] }} m2">
                                                                    <input class="form-control form-control-sm"
                                                                        type="text"
                                                                        placeholder="Luas        : __________m2"
                                                                        name="luas_skid_16" disabled value="{{ $decodedArray[1] }} m2">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="ket_skid_16" id="cukup" value="cukup" disabled {{ $hasil->det_ket == 'cukup' ? 'checked' : '' }}>
                                                                        <label class="form-check-label" for="inlineRadio1">
                                                                            Cukup
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="ket_skid_16" id="tidakmencukupi"
                                                                            value="tidak mencukupi" disabled {{ $hasil->det_ket == 'tidak mencukupi' ? 'checked' : '' }}>
                                                                        <label class="form-check-label" for="inlineRadio2">
                                                                            Tidak
                                                                            Mencukupi</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @break

                                                        @case(17)
                                                            <div class="row g-3">
                                                                <div class="col-md-12">
                                                                    <input class="form-control form-control-sm"
                                                                        type="text" 
                                                                        name="skid_17" disabled value="{{ $hasil->ket }} kamar">
                                                                </div>
                                                            </div>
                                                        @break

                                                        @case(18)
                                                            @php
                                                                $decodedArray = json_decode($hasil->ket);
                                                            @endphp
                                                            <div class="row g-3">
                                                                <div class="col-md-6">
                                                                    <input class="form-control form-control-sm mb-1"
                                                                        type="text"
                                                                        placeholder="Ukuran   : _____m x ______m"
                                                                        name="ukuran_skid_18" disabled value="{{ $decodedArray[0] }} m2">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input class="form-control form-control-sm"
                                                                        type="text"
                                                                        placeholder="Luas        : __________m2"
                                                                        name="luas_skid_18" disabled value="{{ $decodedArray[1] }} m2">
                                                                </div>
                                                            </div>
                                                        @break

                                                        @case(19)
                                                            <div class="row g-3">
                                                                <div class="col-md-4">
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            id="skid_19" value="Ada" name="skid_19"
                                                                            disabled {{ $hasil->ket == 'Ada' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="inlineradio1">Ada</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            id="skid_19" value="Tidak ada" name="skid_19"
                                                                            disabled {{ $hasil->ket == 'Tidak Ada' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="inlineCheckbox2">Tidak
                                                                            Ada</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="ket_skid_19" id="cukup" disabled {{ $hasil->det_ket == 'PDAM' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="inlineRadio1">PDAM</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="ket_skid_19" disabled {{ $hasil->det_ket == 'Sumur' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="inlineRadio2">Sumur
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="ket_skid_19" disabled {{ $hasil->det_ket == 'Lainnya' ? 'checked' : '' }}>
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
                                                                            id="skid_20" value="Ada" name="skid_20"
                                                                            disabled {{ $hasil->ket == 'Ada' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="inlineradio1">Ada</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            id="skid_20" value="Tidak ada" name="skid_20"
                                                                            disabled {{ $hasil->ket == 'Tidak Ada' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="inlineCheckbox2">Tidak
                                                                            Ada</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="ket_skid_20" id="cukup" disabled {{ $hasil->det_ket == 'PLN' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="skid">PLN</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="ket_skid_20" id="tidakmencukupi"
                                                                            disabled {{ $hasil->det_ket == 'Lainnya' ? 'checked' : '' }}>
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
                                                                            id="skid_21" value="Ada" name="skid_21"
                                                                            disabled {{ $hasil->ket == 'Ada' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="skid">Ada</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            id="skid_21" value="Tidak ada" name="skid_21"
                                                                            disabled {{ $hasil->ket == 'Tidak Ada' ? 'checked' : '' }}>
                                                                        <label class="form-check-label" for="skid">Tidak
                                                                            Ada</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @break

                                                        @case(22)
                                                            @php
                                                                $decodedArray = json_decode($hasil->ket);
                                                                $arrayLength = count($decodedArray);
                                                            @endphp

                                                            <div class="row g-3">
                                                                <div class="col-md-12">
                                                                    <div class="input-group-sm form-check-inline mb-2">
                                                                        <label for="" class="form-label">
                                                                            Tampak Depan dan Perspektif
                                                                            {{-- <cite class="text-danger">*Foto dapat lebih dari 1</cite> --}}
                                                                        </label><br>
                                                                        @if ($hasil->ket != null)
                                                                            @for ($i = 0; $i < $arrayLength; $i++)
                                                                                <div class="form form-check-inline mb-2">
                                                                                    <span id="hasil->det_ket" class="form-text"><a
                                                                                            target="_blank"
                                                                                            href="{{ asset('storage/') }}/{{ $decodedArray[$i] }}"><i
                                                                                                class="fa-solid fa-link me-2"></i>Foto {{ $i+1 }}</a>
                                                                                    </span>
                                                                                </div>
                                                                            @endfor
                                                                        @endif
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
                                                @foreach ($hasilVerifikasiChilds as $hasilChilds)
                                                    @if ($hasilChilds->detail_sub_ktgr_id == $dsk->id)
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
                                                                                                name="dskid_2_6" disabled {{ $hasilChilds->ket == 'Menerus' ? 'checked' : '' }} id="menerus2-6"
                                                                                                value="Menerus">
                                                                                            <label class="form-check-label"
                                                                                                for="menerus">Menerus</label>
                                                                                        </div>
                                                                                        <div class="form-check-inline">
                                                                                            <input class="form-check-input" type="radio"
                                                                                                name="dskid_2_6" disabled {{ $hasilChilds->ket == 'Setempat' ? 'checked' : '' }} id="setempat2-6"
                                                                                                value="Setempat">
                                                                                            <label class="form-check-label"
                                                                                                for="setempat">Setempat</label>
                                                                                        </div>
                                                                                        <div class="form-check-inline">
                                                                                            <input class="form-check-input" type="radio"
                                                                                                name="dskid_2_6" disabled {{ $hasilChilds->ket == 'Rolag' ? 'checked' : '' }} id="rolag2-6"
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
                                                                                                name="dskid_2_7" id="beton2-7"
                                                                                                value="Beton" disabled {{ $hasilChilds->ket == 'Beton' ? 'checked' : '' }}>
                                                                                            <label class="form-check-label"
                                                                                                for="beton">Beton</label>
                                                                                        </div>
                                                                                        <div class="form-check-inline">
                                                                                            <input class="form-check-input" type="radio"
                                                                                                name="dskid_2_7" id="kayu2-7"
                                                                                                value="Kayu" disabled {{ $hasilChilds->ket == 'Kayu' ? 'checked' : '' }}>
                                                                                            <label class="form-check-label"
                                                                                                for="kayu">Kayu</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @elseif ($dsk->id == 8)
                                                                                @php
                                                                                    $decodedArray = json_decode($hasilChilds->ket);
                                                                                @endphp
                                                                                <div class="row g-3">
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-check-inline">
                                                                                            <input type="text"
                                                                                                class="form-control form-control-sm mb-2"
                                                                                                id="panjang2-8" name="dskid_2_8_1"
                                                                                                placeholder="Panjang (satuan m)" disabled value="{{ $decodedArray[0] }} m">
                                                                                            <div class="input-group input-group-sm">
                                                                                                <input type="text"
                                                                                                    class="form-control form-control-sm"
                                                                                                    id="dimensi_lebar2-8"
                                                                                                    name="dskid_2_8_2"
                                                                                                    placeholder="Lebar (satuan cm)"
                                                                                                    disabled value="{{ $decodedArray[1] }} cm">
                                                                                                <span
                                                                                                    class="input-group-text form-control-sm">x</span>
                                                                                                <input type="text"
                                                                                                    class="form-control form-control-sm"
                                                                                                    id="dimensi_tinggi2-8"
                                                                                                    name="dskid_2_8_3"
                                                                                                    placeholder="Tinggi (satuan cm)"
                                                                                                    disabled value="{{ $decodedArray[2] }} cm">
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
                                                                                                placeholder="         m" disabled value="{{ $hasilChilds->ket }} m">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @elseif ($dsk->id == 10)
                                                                                <div class="row g-3">
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-check-inline">
                                                                                            <input class="form-check-input" type="radio"
                                                                                                name="dskid_2_10" id="rusak_ringan2-10"
                                                                                                value="Baik" disabled {{ $hasilChilds->ket == 'Baik' ? 'checked' : '' }}>
                                                                                            <label class="form-check-label"
                                                                                                for="rusak_ringan">
                                                                                                Baik</label>
                                                                                        </div>
                                                                                        <div class="form-check-inline">
                                                                                            <input class="form-check-input" type="radio"
                                                                                                name="dskid_2_10" id="rusak_ringan2-10"
                                                                                                value="Rusak Ringan" disabled {{ $hasilChilds->ket == 'Rusak Ringan' ? 'checked' : '' }}>
                                                                                            <label class="form-check-label"
                                                                                                for="rusak_ringan">
                                                                                                Rusak Ringan</label>
                                                                                        </div>
                                                                                        <div class="form-check-inline">
                                                                                            <input class="form-check-input" type="radio"
                                                                                                name="dskid_2_10" id="rusak_sedang2-10"
                                                                                                value="Rusak Sedang" disabled {{ $hasilChilds->ket == 'Rusak Sedang' ? 'checked' : '' }}>
                                                                                            <label class="form-check-label"
                                                                                                for="rusak_sedang">
                                                                                                Rusak Sedang</label>
                                                                                        </div>
                                                                                        <div class="form-check-inline">
                                                                                            <input class="form-check-input" type="radio"
                                                                                                name="dskid_2_10" id="rusak_berat2-10"
                                                                                                value="Rusak Berat" disabled {{ $hasilChilds->ket == 'Rusak Berat' ? 'checked' : '' }}>
                                                                                            <label class="form-check-label"
                                                                                                for="rusak_berat">
                                                                                                Rusak Berat</label>
                                                                                        </div>
                                                                                        <div class="form-check-inline">
                                                                                            <input class="form-check-input" type="radio"
                                                                                                name="dskid_2_10" id="rusak_total2-10"
                                                                                                value="Rusak Total" disabled {{ $hasilChilds->ket == 'Rusak Total' ? 'checked' : '' }}>
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
                                                                                                value="Beton" disabled {{ $hasilChilds->ket == 'Beton' ? 'checked' : '' }}>
                                                                                            <label class="form-check-label"
                                                                                                for="beton">Beton</label>
                                                                                        </div>
                                                                                        <div class="form-check-inline">
                                                                                            <input class="form-check-input" type="radio"
                                                                                                name="dskid_2_11" id="kayu2-11"
                                                                                                value="Kayu" disabled {{ $hasilChilds->ket == 'Kayu' ? 'checked' : '' }}>
                                                                                            <label class="form-check-label"
                                                                                                for="kayu">Kayu</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @elseif ($dsk->id == 12)
                                                                                @php
                                                                                    $decodedArray = json_decode($hasilChilds->ket);
                                                                                @endphp
                                                                                <div class="row g-3">
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-check-inline">
                                                                                            <input type="text"
                                                                                                class="form-control form-control-sm mb-2"
                                                                                                id="panjang2-8" name="dskid_2_12_1"
                                                                                                placeholder="Panjang (satuan m)" disabled value="{{ $decodedArray[0] }} m">
                                                                                            <div class="input-group input-group-sm">
                                                                                                <input type="text"
                                                                                                    class="form-control form-control-sm"
                                                                                                    id="dimensi_lebar2-8"
                                                                                                    name="dskid_2_12_2"
                                                                                                    placeholder="Lebar (satuan cm)"
                                                                                                    disabled value="{{ $decodedArray[1] }} cm">
                                                                                                <span
                                                                                                    class="input-group-text form-control-sm">x</span>
                                                                                                <input type="text"
                                                                                                    class="form-control form-control-sm"
                                                                                                    id="dimensi_tinggi2-8"
                                                                                                    name="dskid_2_12_3"
                                                                                                    placeholder="Tinggi (satuan cm)"
                                                                                                    disabled value="{{ $decodedArray[2] }} cm">
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
                                                                                                value="Ada" disabled {{ $hasilChilds->ket == 'Ada' ? 'checked' : '' }}>
                                                                                            <label class="form-check-label"
                                                                                                for="ada">Ada</label>
                                                                                        </div>
                                                                                        <div class="form-check-inline">
                                                                                            <input class="form-check-input" type="radio"
                                                                                                name="dskid_2_13" id="tidak-ada2-13"
                                                                                                value="Tidak Ada" disabled {{ $hasilChilds->ket == 'Tidak Ada' ? 'checked' : '' }}>
                                                                                            <label class="form-check-label"
                                                                                                for="tidak-ada">Tidak
                                                                                                Ada</label>
                                                                                        </div>
                                                                                        <div class="form-check-inline">
                                                                                            <input class="form-check-input" type="radio"
                                                                                                name="dskid_2_13" id="sebagian-ada2-13"
                                                                                                value="Sebagian Ada" disabled {{ $hasilChilds->ket == 'Sebagian Ada' ? 'checked' : '' }}>
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
                                                                                                placeholder="         m" disabled value="{{ $hasilChilds->ket }} m">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @elseif ($dsk->id == 15)
                                                                                <div class="row g-3">
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-check-inline">
                                                                                            <input class="form-check-input" type="radio"
                                                                                                name="dskid_2_15" id="rusak_ringan2-10"
                                                                                                value="Baik" disabled {{ $hasilChilds->ket == 'Baik' ? 'checked' : '' }}>
                                                                                            <label class="form-check-label">
                                                                                                Baik</label>
                                                                                        </div>
                                                                                        <div class="form-check-inline">
                                                                                            <input class="form-check-input" type="radio"
                                                                                                name="dskid_2_15" id="rusak_ringan2-15"
                                                                                                value="Rusak Ringan" disabled {{ $hasilChilds->ket == 'Rusak Ringan' ? 'checked' : '' }}>
                                                                                            <label class="form-check-label"
                                                                                                for="rusak_ringan">
                                                                                                Rusak Ringan</label>
                                                                                        </div>
                                                                                        <div class="form-check-inline">
                                                                                            <input class="form-check-input" type="radio"
                                                                                                name="dskid_2_15" id="rusak_sedang2-15"
                                                                                                value="Rusak Sedang" disabled {{ $hasilChilds->ket == 'Rusak Sedang' ? 'checked' : '' }}>
                                                                                            <label class="form-check-label"
                                                                                                for="rusak_sedang">
                                                                                                Rusak Sedang</label>
                                                                                        </div>
                                                                                        <div class="form-check-inline">
                                                                                            <input class="form-check-input" type="radio"
                                                                                                name="dskid_2_15" id="rusak_berat2-15"
                                                                                                value="Rusak Berat" disabled {{ $hasilChilds->ket == 'Rusak Berat' ? 'checked' : '' }}>
                                                                                            <label class="form-check-label"
                                                                                                for="rusak_berat">
                                                                                                Rusak Berat</label>
                                                                                        </div>
                                                                                        <div class="form-check-inline">
                                                                                            <input class="form-check-input" type="radio"
                                                                                                name="dskid_2_15" id="rusak_total2-15"
                                                                                                value="Rusak Total" disabled {{ $hasilChilds->ket == 'Rusak Total' ? 'checked' : '' }}>
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
                                                                                                value="Beton" disabled {{ $hasilChilds->ket == 'Beton' ? 'checked' : '' }}>
                                                                                            <label class="form-check-label"
                                                                                                for="beton">Beton</label>
                                                                                        </div>
                                                                                        <div class="form-check-inline">
                                                                                            <input class="form-check-input" type="radio"
                                                                                                name="dskid_2_28" id="kayu2-28"
                                                                                                value="Kayu" disabled {{ $hasilChilds->ket == 'Kayu' ? 'checked' : '' }}>
                                                                                            <label class="form-check-label"
                                                                                                for="kayu">Kayu</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @elseif ($dsk->id == 29)
                                                                                @php
                                                                                    $decodedArray = json_decode($hasilChilds->ket);
                                                                                @endphp
                                                                                <div class="row g-3">
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-check-inline">
                                                                                            <input type="text"
                                                                                                class="form-control form-control-sm mb-2"
                                                                                                id="panjang2-8" name="dskid_2_29_1"
                                                                                                placeholder="Panjang (satuan m)" disabled value="{{ $decodedArray[0] }} m">
                                                                                            <div class="input-group input-group-sm">
                                                                                                <input type="text"
                                                                                                    class="form-control form-control-sm"
                                                                                                    id="dimensi_lebar2-8"
                                                                                                    name="dskid_2_29_2"
                                                                                                    placeholder="Lebar (satuan cm)"
                                                                                                    disabled value="{{ $decodedArray[1] }} cm">
                                                                                                <span
                                                                                                    class="input-group-text form-control-sm">x</span>
                                                                                                <input type="text"
                                                                                                    class="form-control form-control-sm"
                                                                                                    id="dimensi_tinggi2-8"
                                                                                                    name="dskid_2_29_3"
                                                                                                    placeholder="Tinggi (satuan cm)"
                                                                                                    disabled value="{{ $decodedArray[2] }} cm">
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
                                                                                                value="Ada" disabled {{ $hasilChilds->ket == 'Ada' ? 'checked' : '' }}>
                                                                                            <label class="form-check-label"
                                                                                                for="ada">Ada</label>
                                                                                        </div>
                                                                                        <div class="form-check-inline">
                                                                                            <input class="form-check-input"
                                                                                                type="radio" name="dskid_2_30"
                                                                                                id="tidak-ada2-30" value="Tidak Ada"
                                                                                                disabled {{ $hasilChilds->ket == 'Tidak Ada' ? 'checked' : '' }}>
                                                                                            <label class="form-check-label"
                                                                                                for="tidak-ada">Tidak
                                                                                                Ada</label>
                                                                                        </div>
                                                                                        <div class="form-check-inline">
                                                                                            <input class="form-check-input"
                                                                                                type="radio" name="dskid_2_30"
                                                                                                id="sebagian-ada2-30"
                                                                                                value="Sebagian Ada" disabled {{ $hasilChilds->ket == 'Sebagian Ada' ? 'checked' : '' }}>
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
                                                                                                placeholder="         m" disabled value="{{ $hasilChilds->ket }} m">
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
                                                                                                disabled {{ $hasilChilds->ket == 'Baik' ? 'checked' : '' }}>
                                                                                            <label class="form-check-label"
                                                                                                for="rusak_ringan">
                                                                                                Baik</label>
                                                                                        </div>
                                                                                        <div class="form-check-inline">
                                                                                            <input class="form-check-input"
                                                                                                type="radio" name="dskid_2_32"
                                                                                                id="rusak_ringan2-32"
                                                                                                value="Rusak Ringan" disabled {{ $hasilChilds->ket == 'Rusak Ringan' ? 'checked' : '' }}>
                                                                                            <label class="form-check-label"
                                                                                                for="rusak_ringan">
                                                                                                Rusak Ringan</label>
                                                                                        </div>
                                                                                        <div class="form-check-inline">
                                                                                            <input class="form-check-input"
                                                                                                type="radio" name="dskid_2_32"
                                                                                                id="rusak_sedang2-32"
                                                                                                value="Rusak Sedang" disabled {{ $hasilChilds->ket == 'Rusak Sedang' ? 'checked' : '' }}>
                                                                                            <label class="form-check-label"
                                                                                                for="rusak_sedang">
                                                                                                Rusak Sedang</label>
                                                                                        </div>
                                                                                        <div class="form-check-inline">
                                                                                            <input class="form-check-input"
                                                                                                type="radio" name="dskid_2_32"
                                                                                                id="rusak_berat2-32" value="Rusak Berat"
                                                                                                disabled {{ $hasilChilds->ket == 'Rusak Berat' ? 'checked' : '' }}>
                                                                                            <label class="form-check-label"
                                                                                                for="rusak_berat">
                                                                                                Rusak Berat</label>
                                                                                        </div>
                                                                                        <div class="form-check-inline">
                                                                                            <input class="form-check-input"
                                                                                                type="radio" name="dskid_2_32"
                                                                                                id="rusak_total2-32" value="Rusak Total"
                                                                                                disabled {{ $hasilChilds->ket == 'Rusak Total' ? 'checked' : '' }}>
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
                                                                                                id="beton2-16" value="Beton" disabled {{ $hasilChilds->ket == 'Beton' ? 'checked' : '' }}>
                                                                                            <label class="form-check-label"
                                                                                                for="beton">Beton</label>
                                                                                        </div>
                                                                                        <div class="form-check-inline">
                                                                                            <input class="form-check-input"
                                                                                                type="radio" name="dskid_2_16"
                                                                                                id="kayu2-16" value="Kayu" disabled {{ $hasilChilds->ket == 'Kayu' ? 'checked' : '' }}>
                                                                                            <label class="form-check-label"
                                                                                                for="kayu">Kayu</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @elseif ($dsk->id == 17)
                                                                                @php
                                                                                    $decodedArray = json_decode($hasilChilds->ket);
                                                                                @endphp
                                                                                <div class="row g-3">
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-check-inline">
                                                                                            <input type="text"
                                                                                                class="form-control form-control-sm mb-2"
                                                                                                id="panjang2-8" name="dskid_2_17_1"
                                                                                                placeholder="Panjang (satuan m)" disabled value="{{ $decodedArray[0] }} m">
                                                                                            <div class="input-group input-group-sm">
                                                                                                <input type="text"
                                                                                                    class="form-control form-control-sm"
                                                                                                    id="dimensi_lebar2-8"
                                                                                                    name="dskid_2_17_2"
                                                                                                    placeholder="Lebar (satuan cm)"
                                                                                                    disabled value="{{ $decodedArray[1] }} cm">
                                                                                                <span
                                                                                                    class="input-group-text form-control-sm">x</span>
                                                                                                <input type="text"
                                                                                                    class="form-control form-control-sm"
                                                                                                    id="dimensi_tinggi2-8"
                                                                                                    name="dskid_2_17_3"
                                                                                                    placeholder="Tinggi (satuan cm)"
                                                                                                    disabled value="{{ $decodedArray[2] }} cm">
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
                                                                                                id="ada2-18" value="Ada" disabled {{ $hasilChilds->ket == 'Ada' ? 'checked' : '' }}>
                                                                                            <label class="form-check-label"
                                                                                                for="ada">Ada</label>
                                                                                        </div>
                                                                                        <div class="form-check-inline">
                                                                                            <input class="form-check-input"
                                                                                                type="radio" name="dskid_2_18"
                                                                                                id="tidak-ada2-18" value="Tidak Ada"
                                                                                                disabled {{ $hasilChilds->ket == 'Tidak Ada' ? 'checked' : '' }}>
                                                                                            <label class="form-check-label"
                                                                                                for="tidak-ada">Tidak
                                                                                                Ada</label>
                                                                                        </div>
                                                                                        <div class="form-check-inline">
                                                                                            <input class="form-check-input"
                                                                                                type="radio" name="dskid_2_18"
                                                                                                id="sebagian-ada2-18"
                                                                                                value="Sebagian Ada" disabled {{ $hasilChilds->ket == 'Sebagian Ada' ? 'checked' : '' }}>
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
                                                                                                placeholder="         m" disabled value="{{ $hasilChilds->ket }} m">
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
                                                                                                disabled {{ $hasilChilds->ket == 'Baik' ? 'checked' : '' }}>
                                                                                            <label class="form-check-label"
                                                                                                for="rusak_ringan">
                                                                                                Baik</label>
                                                                                        </div>
                                                                                        <div class="form-check-inline">
                                                                                            <input class="form-check-input"
                                                                                                type="radio" name="dskid_2_20"
                                                                                                id="rusak_ringan2-20"
                                                                                                value="Rusak Ringan" disabled {{ $hasilChilds->ket == 'Rusak Ringan' ? 'checked' : '' }}>
                                                                                            <label class="form-check-label"
                                                                                                for="rusak_ringan">
                                                                                                Rusak Ringan</label>
                                                                                        </div>
                                                                                        <div class="form-check-inline">
                                                                                            <input class="form-check-input"
                                                                                                type="radio" name="dskid_2_20"
                                                                                                id="rusak_sedang2-20"
                                                                                                value="Rusak Sedang" disabled {{ $hasilChilds->ket == 'Rusak Sedang' ? 'checked' : '' }}>
                                                                                            <label class="form-check-label"
                                                                                                for="rusak_sedang">
                                                                                                Rusak Sedang</label>
                                                                                        </div>
                                                                                        <div class="form-check-inline">
                                                                                            <input class="form-check-input"
                                                                                                type="radio" name="dskid_2_20"
                                                                                                id="rusak_berat2-20" value="Rusak Berat"
                                                                                                disabled {{ $hasilChilds->ket == 'Rusak Berat' ? 'checked' : '' }}>
                                                                                            <label class="form-check-label"
                                                                                                for="rusak_berat">
                                                                                                Rusak Berat</label>
                                                                                        </div>
                                                                                        <div class="form-check-inline">
                                                                                            <input class="form-check-input"
                                                                                                type="radio" name="dskid_2_20"
                                                                                                id="rusak_total2-20" value="Rusak Total"
                                                                                                disabled {{ $hasilChilds->ket == 'Rusak Total' ? 'checked' : '' }}>
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
                                                                                                id="beton2-21" value="Beton" disabled {{ $hasilChilds->ket == 'Beton' ? 'checked' : '' }}>
                                                                                            <label class="form-check-label"
                                                                                                for="beton">Beton</label>
                                                                                        </div>
                                                                                        <div class="form-check-inline">
                                                                                            <input class="form-check-input"
                                                                                                type="radio" name="dskid_2_21"
                                                                                                id="kayu2-21" value="Kayu" disabled {{ $hasilChilds->ket == 'Kayu' ? 'checked' : '' }}>
                                                                                            <label class="form-check-label"
                                                                                                for="kayu">Kayu</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @elseif ($dsk->id == 22)
                                                                                @php
                                                                                    $decodedArray = json_decode($hasilChilds->ket);
                                                                                @endphp
                                                                                <div class="row g-3">
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-check-inline">
                                                                                            <input type="text"
                                                                                                class="form-control form-control-sm mb-2"
                                                                                                id="panjang2-8" name="dskid_2_22_1"
                                                                                                placeholder="Panjang (satuan m)" disabled value="{{ $decodedArray[0] }} m">
                                                                                            <div class="input-group input-group-sm">
                                                                                                <input type="text"
                                                                                                    class="form-control form-control-sm"
                                                                                                    id="dimensi_lebar2-8"
                                                                                                    name="dskid_2_22_2"
                                                                                                    placeholder="Lebar (satuan cm)"
                                                                                                    disabled value="{{ $decodedArray[1] }} cm">
                                                                                                <span
                                                                                                    class="input-group-text form-control-sm">x</span>
                                                                                                <input type="text"
                                                                                                    class="form-control form-control-sm"
                                                                                                    id="dimensi_tinggi2-8"
                                                                                                    name="dskid_2_22_3"
                                                                                                    placeholder="Tinggi (satuan cm)"
                                                                                                    disabled value="{{ $decodedArray[2] }} cm">
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
                                                                                                id="ada2-23" value="Ada" disabled {{ $hasilChilds->ket == 'Ada' ? 'checked' : '' }}>
                                                                                            <label class="form-check-label"
                                                                                                for="ada">Ada</label>
                                                                                        </div>
                                                                                        <div class="form-check-inline">
                                                                                            <input class="form-check-input"
                                                                                                type="radio" name="dskid_2_23"
                                                                                                id="tidak-ada2-23" value="Tidak Ada"
                                                                                                disabled {{ $hasilChilds->ket == 'Tidak Ada' ? 'checked' : '' }}>
                                                                                            <label class="form-check-label"
                                                                                                for="tidak-ada">Tidak
                                                                                                Ada</label>
                                                                                        </div>
                                                                                        <div class="form-check-inline">
                                                                                            <input class="form-check-input"
                                                                                                type="radio" name="dskid_2_23"
                                                                                                id="sebagian-ada2-23"
                                                                                                value="Sebagian Ada" disabled {{ $hasilChilds->ket == 'Sebagian Ada' ? 'checked' : '' }}>
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
                                                                                                disabled {{ $hasilChilds->ket == 'Baik' ? 'checked' : '' }}>
                                                                                            <label class="form-check-label"
                                                                                                for="rusak_ringan">
                                                                                                Baik</label>
                                                                                        </div>
                                                                                        <div class="form-check-inline">
                                                                                            <input class="form-check-input"
                                                                                                type="radio" name="dskid_2_24"
                                                                                                id="rusak_ringan2-24"
                                                                                                value="Rusak Ringan" disabled {{ $hasilChilds->ket == 'Rusak Ringan' ? 'checked' : '' }}>
                                                                                            <label class="form-check-label"
                                                                                                for="rusak_ringan">
                                                                                                Rusak Ringan</label>
                                                                                        </div>
                                                                                        <div class="form-check-inline">
                                                                                            <input class="form-check-input"
                                                                                                type="radio" name="dskid_2_24"
                                                                                                id="rusak_sedang2-24"
                                                                                                value="Rusak Sedang" disabled {{ $hasilChilds->ket == 'Rusak Sedang' ? 'checked' : '' }}>
                                                                                            <label class="form-check-label"
                                                                                                for="rusak_sedang">
                                                                                                Rusak Sedang</label>
                                                                                        </div>
                                                                                        <div class="form-check-inline">
                                                                                            <input class="form-check-input"
                                                                                                type="radio" name="dskid_2_24"
                                                                                                id="rusak_berat2-24" value="Rusak Berat"
                                                                                                disabled {{ $hasilChilds->ket == 'Rusak Berat' ? 'checked' : '' }}>
                                                                                            <label class="form-check-label"
                                                                                                for="rusak_berat">
                                                                                                Rusak Berat</label>
                                                                                        </div>
                                                                                        <div class="form-check-inline">
                                                                                            <input class="form-check-input"
                                                                                                type="radio" name="dskid_2_24"
                                                                                                id="rusak_total2-24" value="Rusak Total"
                                                                                                disabled {{ $hasilChilds->ket == 'Rusak Total' ? 'checked' : '' }}>
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
                                                                                                disabled {{ $hasilChilds->ket == 'Baik' ? 'checked' : '' }}>
                                                                                            <label class="form-check-label"
                                                                                                for="rusak_ringan">
                                                                                                Baik</label>
                                                                                        </div>
                                                                                        <div class="form-check-inline">
                                                                                            <input class="form-check-input"
                                                                                                type="radio" name="dskid_3_25"
                                                                                                id="rusak_ringan2-24"
                                                                                                value="Rusak Ringan" disabled {{ $hasilChilds->ket == 'Rusak Ringan' ? 'checked' : '' }}>
                                                                                            <label class="form-check-label"
                                                                                                for="rusak_ringan">
                                                                                                Rusak Ringan</label>
                                                                                        </div>
                                                                                        <div class="form-check-inline">
                                                                                            <input class="form-check-input"
                                                                                                type="radio" name="dskid_3_25"
                                                                                                id="rusak_sedang2-24"
                                                                                                value="Rusak Sedang" disabled {{ $hasilChilds->ket == 'Rusak Sedang' ? 'checked' : '' }}>
                                                                                            <label class="form-check-label"
                                                                                                for="rusak_sedang">
                                                                                                Rusak Sedang</label>
                                                                                        </div>
                                                                                        <div class="form-check-inline">
                                                                                            <input class="form-check-input"
                                                                                                type="radio" name="dskid_3_25"
                                                                                                id="rusak_berat2-24" value="Rusak Berat"
                                                                                                disabled {{ $hasilChilds->ket == 'Rusak Berat' ? 'checked' : '' }}>
                                                                                            <label class="form-check-label"
                                                                                                for="rusak_berat">
                                                                                                Rusak Berat</label>
                                                                                        </div>
                                                                                        <div class="form-check-inline">
                                                                                            <input class="form-check-input"
                                                                                                type="radio" name="dskid_3_25"
                                                                                                id="rusak_total2-24" value="Rusak Total"
                                                                                                disabled {{ $hasilChilds->ket == 'Rusak Total' ? 'checked' : '' }}>
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
                                                                                                disabled {{ $hasilChilds->ket == 'Baik' ? 'checked' : '' }}>
                                                                                            <label class="form-check-label"
                                                                                                for="rusak_ringan">
                                                                                                Baik</label>
                                                                                        </div>
                                                                                        <div class="form-check-inline">
                                                                                            <input class="form-check-input"
                                                                                                type="radio" name="dskid_3_26"
                                                                                                id="rusak_ringan2-24"
                                                                                                value="Rusak Ringan" disabled {{ $hasilChilds->ket == 'Rusak Ringan' ? 'checked' : '' }}>
                                                                                            <label class="form-check-label"
                                                                                                for="rusak_ringan">
                                                                                                Rusak Ringan</label>
                                                                                        </div>
                                                                                        <div class="form-check-inline">
                                                                                            <input class="form-check-input"
                                                                                                type="radio" name="dskid_3_26"
                                                                                                id="rusak_sedang2-24"
                                                                                                value="Rusak Sedang" disabled {{ $hasilChilds->ket == 'Rusak Sedang' ? 'checked' : '' }}>
                                                                                            <label class="form-check-label"
                                                                                                for="rusak_sedang">
                                                                                                Rusak Sedang</label>
                                                                                        </div>
                                                                                        <div class="form-check-inline">
                                                                                            <input class="form-check-input"
                                                                                                type="radio" name="dskid_3_26"
                                                                                                id="rusak_berat2-24" value="Rusak Berat"
                                                                                                disabled {{ $hasilChilds->ket == 'Rusak Berat' ? 'checked' : '' }}>
                                                                                            <label class="form-check-label"
                                                                                                for="rusak_berat">
                                                                                                Rusak Berat</label>
                                                                                        </div>
                                                                                        <div class="form-check-inline">
                                                                                            <input class="form-check-input"
                                                                                                type="radio" name="dskid_3_26"
                                                                                                id="rusak_total2-24" value="Rusak Total"
                                                                                                disabled {{ $hasilChilds->ket == 'Rusak Total' ? 'checked' : '' }}>
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
                                                                                                disabled {{ $hasilChilds->ket == 'Baik' ? 'checked' : '' }}>
                                                                                            <label class="form-check-label"
                                                                                                for="rusak_ringan">
                                                                                                Baik</label>
                                                                                        </div>
                                                                                        <div class="form-check-inline">
                                                                                            <input class="form-check-input"
                                                                                                type="radio" name="dskid_3_27"
                                                                                                id="rusak_ringan2-24"
                                                                                                value="Rusak Ringan" disabled {{ $hasilChilds->ket == 'Rusak Ringan' ? 'checked' : '' }}>
                                                                                            <label class="form-check-label"
                                                                                                for="rusak_ringan">
                                                                                                Rusak Ringan</label>
                                                                                        </div>
                                                                                        <div class="form-check-inline">
                                                                                            <input class="form-check-input"
                                                                                                type="radio" name="dskid_3_27"
                                                                                                id="rusak_sedang2-24"
                                                                                                value="Rusak Sedang" disabled {{ $hasilChilds->ket == 'Rusak Sedang' ? 'checked' : '' }}>
                                                                                            <label class="form-check-label"
                                                                                                for="rusak_sedang">
                                                                                                Rusak Sedang</label>
                                                                                        </div>
                                                                                        <div class="form-check-inline">
                                                                                            <input class="form-check-input"
                                                                                                type="radio" name="dskid_3_27"
                                                                                                id="rusak_berat2-24" value="Rusak Berat"
                                                                                                disabled {{ $hasilChilds->ket == 'Rusak Berat' ? 'checked' : '' }}>
                                                                                            <label class="form-check-label"
                                                                                                for="rusak_berat">
                                                                                                Rusak Berat</label>
                                                                                        </div>
                                                                                        <div class="form-check-inline">
                                                                                            <input class="form-check-input"
                                                                                                type="radio" name="dskid_3_27"
                                                                                                id="rusak_total2-24" value="Rusak Total"
                                                                                                disabled {{ $hasilChilds->ket == 'Rusak Total' ? 'checked' : '' }}>
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
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            @endforeach
                        </tbody>
                    @endforeach
                </table>
            </div>
            <div class="block-footer p-4">
                <div class="row">
                    <div class="col-md-6">
                        <a id="show-tolak-button" class="btn btn-sm btn-danger w-100"><i
                            class="fa-solid fa-floppy-disk me-2"></i>Tolak Pengajuan</a>
                    </div>
                    <div class="col-md-6">
                        <a id="show-setuju-button" class="btn btn-sm btn-success w-100"><i
                                class="fa-solid fa-floppy-disk me-2"></i>Setujui Pengajuan</a>
                    </div>
                    <form id="setuju-form" action="{{ route('verifikasi-lanjutan.update', $dataPengajuan->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="Disetujui">
                    </form>
                    <form id="tolak-form" action="{{ route('verifikasi-lanjutan.update', $dataPengajuan->verifikasi->id) }}" method="POST"
                        style="display: none;">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="Ditolak">
                        <input type="text" name="keterangan" placeholder="Keterangan penolakan" required>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-script')
    <script>
        document.getElementById('print-button').addEventListener('click', function() {
            window.print();
        });
    </script>
    <script>
        document.getElementById('show-setuju-button').addEventListener('click', function() {
            // Perform validation here
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
                    document.getElementById('setuju-form').submit();
                }
            });
        });
    </script>
    <script>
        document.getElementById('show-tolak-button').addEventListener('click', function() {
            Swal.fire({
                title: 'Konfirmasi Penolakan',
                text: 'Apakah Anda yakin ingin menolak pengajuan ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Show the form with rejection reason input
                    Swal.fire({
                        title: 'Masukkan Keterangan Penolakan',
                        html: '<input type="text" id="swal-input1" class="swal2-input" placeholder="Keterangan penolakan">',
                        confirmButtonText: 'Submit',
                        preConfirm: () => {
                            const keteranganPenolakan = Swal.getPopup().querySelector('#swal-input1').value;
                            if (!keteranganPenolakan) {
                                Swal.showValidationMessage('Keterangan penolakan harus diisi');
                            }
                            return keteranganPenolakan;
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const form = document.getElementById('tolak-form');
                            const keteranganInput = document.createElement('input');
                            keteranganInput.type = 'hidden';
                            keteranganInput.name = 'keterangan';
                            keteranganInput.value = result.value;
                            form.appendChild(keteranganInput);
    
                            // Submit the form
                            form.submit();
                        }
                    });
                }
            });
        });
    </script>
@endpush
