@extends('pages.user.layouts.main')

@section('title', 'Data Pengajuan')

@push('custom-css')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <style>
        .images-preview-div img {
            padding: 10px;
            /* max-width: 100px; */
            width: 100px;
            height: 80px;
        }

        .img-thumbnail {
            /* background-color: black; */
            background-color: transparent;
            width: 250px;
            height: 200px;
            display: inline-block;
            overflow: hidden;
            /* hide any overflowing content */
        }

        .img-thumbnail img {
            width: 100%;
            height: auto;
            object-fit: cover;
            /* apply cropping effect */
            object-position: center center;
            /* position the image in the center */
        }

        .resources-category-image {
            position: relative;
        }

        .delete-button {
            position: absolute;
            top: 4px;
            right: 15px;
        }

        .delete-options {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .delete-options-item {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 4px 8px;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
@endpush

@section('content')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/jquery.magnific-popup/1.0.0/magnific-popup.css">
    <main id="main-container" style="padding-top: 1em;">
        <div class="content">
            <nav class="breadcrumb push bg-transparent rounded push px-4 py-2">
                <a class="breadcrumb-item" href="{{ url('/') }}"><i class="fas fa-home me-1"></i>Home</a>
                <span class="breadcrumb-item active">Tambah Data Pengajuan</span>
            </nav>

            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Lengkapi Dokumen Persyaratan</h3>
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
                    <div class="container-fluid py-2 px-3">
                        <form action="{{ route('data-pengajuan.ktp.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row my-3">
                                <div class="col-md-4">
                                    <label for="ktp" class="form-label">KTP <span class="text-danger">*</span></label>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <input type="file" name="ktp" id="ktp"
                                                accept="image/png, image/jpeg, image/jpg"
                                                class="form-control form-control-sm @error('ktp') is-invalid @enderror"
                                                required>
                                            @error('ktp')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div id="file" class="form-text" style="font-size:12px">* Maks Ukuran 2000
                                                kb, jpg / png</div>
                                            @if ($ktp != null)
                                                <div id="ktp" class="form-text"><a target="_blank"
                                                        href="{{ asset('storage/uploaded/') }}/{{ $ktp->file }}"><i
                                                            class="fa-solid fa-link me-2"></i>{{ $ktp->file }}</a> </div>
                                            @endif
                                        </div>
                                        <div class="col-sm-2">
                                            <button class="btn btn-sm btn-success w-100"><i
                                                    class="fa-solid fa-floppy-disk me-1"></i>
                                                @if ($ktp != null)
                                                    Update
                                                @else
                                                    Upload
                                                @endif
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <form action="{{ route('data-pengajuan.kk.store') }}" method="POST" enctype="multipart/form-data">
                            <div class="row my-3">
                                @csrf
                                <div class="col-md-4">
                                    <label for="pasfoto" class="form-label">Kartu Keluarga <span
                                            class="text-danger">*</span></label>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <input type="file" name="kk" id="kk" accept="application/pdf"
                                                class="form-control form-control-sm @error('kk') is-invalid @enderror"
                                                required>
                                            @error('kk')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div id="file" class="form-text" style="font-size:12px">* Maks Ukuran 2000
                                                kb, pdf</div>
                                            @if ($kk != null)
                                                <div id="emailHelp" class="form-text"><a target="_blank"
                                                        href="{{ asset('storage/uploaded/') }}/{{ $kk->file }}"><i
                                                            class="fa-solid fa-link me-2"></i>{{ $kk->file }}</a>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-sm-2">
                                            <button class="btn btn-sm btn-success w-100"><i
                                                    class="fa-solid fa-floppy-disk me-1"></i>
                                                @if ($kk != null)
                                                    Update
                                                @else
                                                    Upload
                                                @endif
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <form action="{{ route('data-pengajuan.domisili.store') }}" method="POST"
                            enctype="multipart/form-data">
                            <div class="row my-3">
                                @csrf
                                <div class="col-md-4">
                                    <label for="SuratKeteranganDomisili" class="form-label">Surat Keterangan Domisili <span
                                            class="text-danger">*</span></label>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <input type="file" name="SuratKeteranganDomisili"
                                                id="SuratKeteranganDomisili" accept="application/pdf"
                                                class="form-control form-control-sm @error('SuratKeteranganDomisili') is-invalid @enderror"
                                                required>
                                            @error('SuratKeteranganDomisili')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div id="file" class="form-text" style="font-size:12px">* Maks Ukuran
                                                2000
                                                kb, pdf</div>
                                            @if ($domisili != null)
                                                <div class="form-text"><a target="_blank"
                                                        href="{{ asset('storage/uploaded/') }}/{{ $domisili->file }}"><i
                                                            class="fa-solid fa-link me-2"></i>{{ $domisili->file }}</a>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-sm-2">
                                            <button class="btn btn-sm btn-success w-100"><i
                                                    class="fa-solid fa-floppy-disk me-1"></i>
                                                @if ($domisili != null)
                                                    Update
                                                @else
                                                    Upload
                                                @endif
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <form action="{{ route('data-pengajuan.skkm.store') }}" method="POST"
                            enctype="multipart/form-data">
                            <div class="row my-3">
                                @csrf
                                <div class="col-md-4">
                                    <label for="pasfoto" class="form-label">Surat Keterangan Kurang Mampu <span
                                            class="text-danger">*</span></label>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <input type="file" name="SuratKeteranganKurangMampu"
                                                id="SuratKeteranganKurangMampu" accept="application/pdf"
                                                class="form-control form-control-sm @error('SuratKeteranganKurangMampu') is-invalid @enderror"
                                                required>
                                            @error('SuratKeteranganKurangMampu')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div id="file" class="form-text" style="font-size:12px">* Maks Ukuran
                                                2000
                                                kb, pdf</div>
                                            @if ($skkm != null)
                                                <div class="form-text"><a target="_blank"
                                                        href="{{ asset('storage/uploaded/') }}/{{ $skkm->file }}"><i
                                                            class="fa-solid fa-link me-2"></i>{{ $skkm->file }}</a>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-sm-2">
                                            <button class="btn btn-sm btn-success w-100"><i
                                                    class="fa-solid fa-floppy-disk me-1"></i>
                                                @if ($skkm != null)
                                                    Update
                                                @else
                                                    Upload
                                                @endif
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <form action="{{ route('data-pengajuan.surat-pengantar.store') }}" method="POST"
                            enctype="multipart/form-data">
                            <div class="row my-3">
                                @csrf
                                <div class="col-md-4">
                                    <label for="SuratPengantarKelurahan" class="form-label">Proposal Pengajuan dari Desa <span
                                            class="text-danger">*</span></label>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <input type="file" name="SuratPengantarKelurahan" id="SuratPengantarKelurahan"
                                                accept="application/pdf"
                                                class="form-control form-control-sm @error('SuratPengantarKelurahan') is-invalid @enderror"
                                                required>
                                            @error('SuratPengantarKelurahan')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div id="file" class="form-text" style="font-size:12px">* Maks Ukuran
                                                1000
                                                kb, pdf</div>
                                            @if ($suratPengantar != null)
                                                <div id="suratPengantar" class="form-text"><a target="_blank"
                                                        href="{{ asset('storage/uploaded/') }}/{{ $suratPengantar->file }}"><i
                                                            class="fa-solid fa-link me-2"></i>{{ $suratPengantar->file }}</a>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-sm-2">
                                            <button class="btn btn-sm btn-success w-100"><i
                                                    class="fa-solid fa-floppy-disk me-1"></i>
                                                @if ($suratPengantar != null)
                                                    Update
                                                @else
                                                    Upload
                                                @endif
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <form action="{{ route('data-pengajuan.sertifikat-tanah.store') }}" method="POST"
                            enctype="multipart/form-data">
                            <div class="row my-3">
                                @csrf
                                <div class="col-md-4">
                                    <label for="sertifikat" class="form-label">Sertifikat Kepemilikan Tanah <span
                                            class="text-danger">*</span></label>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <input type="file" name="sertifikat" id="sertifikat"
                                                accept="application/pdf"
                                                class="form-control form-control-sm @error('sertifikat') is-invalid @enderror"
                                                required>
                                            @error('sertifikat')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div id="file" class="form-text" style="font-size:12px">* Maks Ukuran
                                                2000
                                                kb, pdf</div>
                                            @if ($sertifikat != null)
                                                <div id="emailHelp" class="form-text"><a target="_blank"
                                                        href="{{ asset('storage/uploaded/') }}/{{ $sertifikat->file }}"><i
                                                            class="fa-solid fa-link me-2"></i>{{ $sertifikat->file }}</a>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-sm-2">
                                            <button class="btn btn-sm btn-success w-100"><i
                                                    class="fa-solid fa-floppy-disk me-1"></i>
                                                @if ($sertifikat != null)
                                                    Update
                                                @else
                                                    Upload
                                                @endif
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="block block-rounded">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">Foto Rumah</h3>
                            </div>
                            <div class="block-content block-content-full">
                                <div class="popup-gallery">
                                    <div class="row js-gallery img-fluid-100 g-sm js-gallery-enabled">
                                        @if ($rumah != null)
                                            @foreach ($rumah as $foto)
                                                <div class="col-6 col-lg-3 animated fadeIn">
                                                    <div class="resources-item">
                                                        <div class="resources-category-image position-relative">
                                                            <a href="{{ asset('storage/uploaded/' . $foto->file) }}"
                                                                title="The Image"
                                                                class="img-link img-link-zoom-in img-thumb img-lightbox img-thumbnail">
                                                                <img class="img-fluid mb-2" alt="Image"
                                                                    src="{{ asset('storage/uploaded/' . $foto->file) }}">
                                                            </a>
                                                            <div class="delete-button position-absolute delete-options">
                                                                <form
                                                                    action="{{ route('data-pengajuan.rumah.destroy', $foto->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <button type="submit"
                                                                        class="btn btn-danger btn-sm delete-options-item">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('data-pengajuan.rumah.store') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row my-3">
                                <div class="col-md-4">
                                    <label for="rumah" class="form-label">Upload Rumah <span
                                            class="text-danger">*</span></label>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-10 block-options-item">
                                            <input type="file" name="file[]" id="images"
                                                accept="image/jpeg, image/jpg" multiple
                                                class="form-control form-control-sm @error('rumah') is-invalid @enderror"
                                                required>
                                            @error('rumah')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div id="file" class="form-text" style="font-size:12px">* Maks
                                                Ukuran
                                                2000
                                                kb, format jpg / png, bisa lebih dari 1</div>
                                        </div>
                                        <div class="col-md-2">
                                            <button class="btn btn-sm btn-success w-100"><i
                                                    class="fa-solid fa-floppy-disk me-1"></i> Upload</button>
                                        </div>
                                        <div class="mt-1">
                                            <div class="images-preview-div"> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <form action="{{ route('data-pengajuan.store') }}" method="POST" enctype="multipart/form-data">
                        <div class="row my-5">
                            @csrf
                            <div class="col-md-12">
                                <p class="text-danger"><cite>*Wajib diisi sebagai syarat:</cite></p>
                                <div class="mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="checkbox1"
                                            name="bersungguh_sungguh" required value="1">
                                        <label class="form-check-label" for="checkbox1">
                                            Bersungguh-sungguh mengikuti Program BSPS.</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="checkbox2"
                                            name="belum_menerima_bantuan" required value="1">
                                        <label class="form-check-label" for="checkbox2">
                                            Belum pernah memperoleh BSPS atau bantuan pemerintah untuk program
                                            perumahan.</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="checkbox3"
                                            name="upah_minimum" required value="1">
                                        <label class="form-check-label" for="checkbox3">
                                            Berpenghasilan paling banyak sebesar upah minimum daerah provinsi.</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="checkbox4"
                                            name="bekerja_berkelompok" required value="1">
                                        <label class="form-check-label" for="checkbox4">
                                            Dapat bekerja secara berkelompok / berswadaya.</label>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="checkbox5"
                                            name="data_confirmation" required value="1">
                                        <label class="form-check-label" for="checkbox5">
                                            Saya mengonfirmasi bahwa data yang saya masukkan adalah benar dan
                                            akurat.</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-sm btn-primary w-100">
                                    Ajukan Permohonan
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </main>
@endsection
@push('custom-script')
    <script>
        $(function() {
            // Multiple images preview with JavaScript
            var previewImages = function(input, imgPreviewPlaceholder) {

                if (input.files) {
                    var filesAmount = input.files.length;

                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();

                        reader.onload = function(event) {
                            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(
                                imgPreviewPlaceholder);
                        }

                        reader.readAsDataURL(input.files[i]);
                    }
                }

            };

            $('#images').on('change', function() {
                previewImages(this, 'div.images-preview-div');
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.magnific-popup/1.0.0/jquery.magnific-popup.js">
    </script>
    <script>
        $(document).ready(function() {
            $('.popup-gallery').magnificPopup({
                delegate: 'a',
                type: 'image',
                tLoading: 'Loading image #%curr%...',
                mainClass: 'mfp-img-mobile',
                gallery: {
                    enabled: true,
                    navigateByImgClick: true,
                    preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
                },
                image: {
                    tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                    titleSrc: function(item) {
                        return item.el.attr('title') + '<small>by WebCorpCo</small>';
                    }
                }
            });
        });
    </script>
@endpush
