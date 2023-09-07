@extends('pages.user.layouts.main')

@section('title', 'Data Permohonan')

@push('custom-css')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/jquery.magnific-popup/1.0.0/magnific-popup.css">
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
    </style>
@endpush

@section('content')
        <!-- Page Content -->
        <div class="content">
            <nav class="breadcrumb push bg-transparent rounded push px-4 py-2">
                <a class="breadcrumb-item" href="{{ route('data-pengajuan.index') }}"><i class="fas fa-home me-1"></i>Data Pengajuan</a>
                <span class="breadcrumb-item active">Detail</span>
            </nav>
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">
                        Detail Data Permohonan <small>Masyarakat</small>
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
                    <ul class="timeline pull-t">
                        <!-- Data Diri -->
                        <li class="timeline-event">
                            <div class="timeline-event-time fs-lg fw-semibold">Data Diri</div>
                            <i class="timeline-event-icon fas fa-id-card bg-info"></i>
                            <div class="timeline-event-block">
                                <table class="table table-borderless table-vcenter fs-sm table-sm">
                                    <tbody>
                                        <tr>
                                            <th style="width: 30%">Nama :</th>
                                            <td>{{ $dataDiri->nama }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30%">NIK :</th>
                                            <td>{{ $dataDiri->nik }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30%">Tempat Lahir :</th>
                                            <td>{{ $dataDiri->tempat_lahir }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30%">Tanggal Lahir :</th>
                                            <td>{{ \Carbon\Carbon::parse($dataDiri->tanggal_lahir)->isoFormat('D MMMM Y') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30%">Jenis Kelamin :</th>
                                            <td>{{ $dataDiri->jenis_kelamin }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30%">Agama :</th>
                                            <td>{{ $dataDiri->agama }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30%">Status Perkawinan :</th>
                                            <td>{{ $dataDiri->status_perkawinan }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30%">Kewarganegaraan :</th>
                                            <td>{{ $dataDiri->negara }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30%">Alamat :</th>
                                            <td>{{ $dataDiri->nik }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30%">RT :</th>
                                            <td>{{ $dataDiri->rt }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30%">RW :</th>
                                            <td>{{ $dataDiri->rw }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30%">Kelurahan / Desa :</th>
                                            <td>{{ $dataDiri->village->name }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30%">Kecamatan :</th>
                                            <td>{{ $dataDiri->district->name }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30%">Kabupaten / Kota :</th>
                                            <td>{{ $dataDiri->regency->name }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30%">Provinsi :</th>
                                            <td>{{ $dataDiri->province->name }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30%">Kode POS :</th>
                                            <td>{{ $dataDiri->kode_pos }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30%">Pendidikan Terakhir :</th>
                                            <td>{{ $dataDiri->pendidikan_terakhir }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30%">Pekerjaan :</th>
                                            <td>{{ $dataDiri->pekerjaan }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30%">No Handphone :</th>
                                            <td>{{ $dataDiri->phone }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30%">No Whatsapp :</th>
                                            <td>{{ $dataDiri->whatsapp }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </li>
                        <!-- END Data Diri -->

                        <!-- Data Lampiran -->
                        <li class="timeline-event">
                            <div class="timeline-event-time fs-lg fw-semibold">Data Lampiran</div>
                            <i class="timeline-event-icon fas fa-file-lines bg-danger"></i>
                            <div class="timeline-event-block">
                                <div class="fw-semibold">KTP</div>
                                <div>
                                    @if ($ktp != null)
                                        <a class="fs-sm" target="_blank"
                                            href="{{ asset('storage/uploaded/') }}/{{ $ktp->file }}"><i
                                                class="fa-solid fa-link me-2"></i>{{ $ktp->file }}
                                        </a>
                                    @endif
                                </div>
                                <div class="fs-xs text-muted mt-1"><cite>Upload at :
                                        {{ \Carbon\Carbon::parse($ktp->updated_at)->isoFormat('D MMMM Y') }}</cite>
                                </div>
                            </div>
                            <div class="timeline-event-block">
                                <div class="fw-semibold">Kartu Keluarga</div>
                                <div>
                                    @if ($ktp != null)
                                        <a class="fs-sm" target="_blank"
                                            href="{{ asset('storage/uploaded/') }}/{{ $kk->file }}"><i
                                                class="fa-solid fa-link me-2"></i>{{ $kk->file }}
                                        </a>
                                    @endif
                                </div>
                                <div class="fs-xs text-muted mt-1"><cite>Upload at :
                                        {{ \Carbon\Carbon::parse($kk->updated_at)->isoFormat('D MMMM Y') }}</cite>
                                </div>
                            </div>
                            <div class="timeline-event-block">
                                <div class="fw-semibold">Surat Keterangan Domisili</div>
                                <div>
                                    @if ($ktp != null)
                                        <a class="fs-sm" target="_blank"
                                            href="{{ asset('storage/uploaded/') }}/{{ $domisili->file }}"><i
                                                class="fa-solid fa-link me-2"></i>{{ $domisili->file }}
                                        </a>
                                    @endif
                                </div>
                                <div class="fs-xs text-muted mt-1"><cite>Upload at :
                                        {{ \Carbon\Carbon::parse($domisili->updated_at)->isoFormat('D MMMM Y') }}</cite>
                                </div>
                            </div>
                            <div class="timeline-event-block">
                                <div class="fw-semibold">Surat Pengantar Kelurahan</div>
                                <div>
                                    @if ($ktp != null)
                                        <a class="fs-sm" target="_blank"
                                            href="{{ asset('storage/uploaded/') }}/{{ $suratPengantar->file }}"><i
                                                class="fa-solid fa-link me-2"></i>{{ $suratPengantar->file }}
                                        </a>
                                    @endif
                                </div>
                                <div class="fs-xs text-muted mt-1"><cite>Upload at :
                                        {{ \Carbon\Carbon::parse($suratPengantar->updated_at)->isoFormat('D MMMM Y') }}</cite>
                                </div>
                            </div>
                            <div class="timeline-event-block">
                                <div class="fw-semibold">Surat Keterangan Kurang Mampu</div>
                                <div>
                                    @if ($ktp != null)
                                        <a class="fs-sm" target="_blank"
                                            href="{{ asset('storage/uploaded/') }}/{{ $skkm->file }}"><i
                                                class="fa-solid fa-link me-2"></i>{{ $skkm->file }}
                                        </a>
                                    @endif
                                </div>
                                <div class="fs-xs text-muted mt-1"><cite>Upload at :
                                        {{ \Carbon\Carbon::parse($skkm->updated_at)->isoFormat('D MMMM Y') }}</cite>
                                </div>
                            </div>
                            <div class="timeline-event-block">
                                <div class="fw-semibold">Sertifikat Kepemilikan Tanah</div>
                                <div>
                                    @if ($ktp != null)
                                        <a class="fs-sm" target="_blank"
                                            href="{{ asset('storage/uploaded/') }}/{{ $sertifikat->file }}"><i
                                                class="fa-solid fa-link me-2"></i>{{ $sertifikat->file }}
                                        </a>
                                    @endif
                                </div>
                                <div class="fs-xs text-muted mt-1 mb-4"><cite>Upload at :
                                        {{ \Carbon\Carbon::parse($sertifikat->updated_at)->isoFormat('D MMMM Y') }}</cite>
                                </div>
                            </div>
                        </li>
                        <!-- END Data Lampiran -->

                        <!-- Data Foto Rumah -->
                        <li class="timeline-event">
                            <div class="timeline-event-time fs-lg fw-semibold">Data Foto Rumah</div>
                            <i class="timeline-event-icon fa fa-camera bg-elegance"></i>
                            <div class="timeline-event-block">
                                <div class="popup-gallery">
                                    <div class="row js-gallery img-fluid-100 g-sm">
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
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- END Data Foto Rumah -->

                        <!-- License Agreement -->
                        <li class="timeline-event">
                            <div class="timeline-event-time fs-lg fw-semibold">Data Persetujuan</div>
                            <i class="timeline-event-icon fas fa-check bg-default"></i>
                            <div class="timeline-event-block">
                                <div class="alert alert-success d-flex align-items-center justify-content-between mb-3"
                                    role="alert">
                                    <div class="flex-fill me-2">
                                        <p class="mb-0">
                                            <cite>Bersungguh-sungguh mengikuti Program BSPS.</cite>
                                        </p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <i
                                            class="fa fa-fw fa-2x {{ $dataPengajuan->detail->bersungguh_sungguh == true ? 'fa-check-circle' : 'fa-exclamation-circle' }}"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="timeline-event-block">
                                <div class="alert alert-success d-flex align-items-center justify-content-between mb-3"
                                    role="alert">
                                    <div class="flex-fill me-2">
                                        <p class="mb-0">
                                            <cite>
                                                Belum pernah memperoleh BSPS atau bantuan pemerintah untuk program
                                                perumahan.</cite>
                                        </p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <i
                                            class="fa fa-fw fa-2x {{ $dataPengajuan->detail->belum_menerima_bantuan == true ? 'fa-check-circle' : 'fa-exclamation-circle' }}"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="timeline-event-block">
                                <div class="alert alert-success d-flex align-items-center justify-content-between mb-3"
                                    role="alert">
                                    <div class="flex-fill me-2">
                                        <p class="mb-0">
                                            <cite>
                                                Berpenghasilan paling banyak sebesar upah minimum daerah provinsi.</cite>
                                        </p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <i
                                            class="fa fa-fw fa-2x {{ $dataPengajuan->detail->upah_minimum == true ? 'fa-check-circle' : 'fa-exclamation-circle' }}"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="timeline-event-block">
                                <div class="alert alert-success d-flex align-items-center justify-content-between mb-3"
                                    role="alert">
                                    <div class="flex-fill me-2">
                                        <p class="mb-0">
                                            <cite>
                                                Dapat bekerja secara berkelompok / berswadaya.</cite>
                                        </p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <i
                                            class="fa fa-fw fa-2x {{ $dataPengajuan->detail->bekerja_berkelompok == true ? 'fa-check-circle' : 'fa-exclamation-circle' }}"></i>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- END License Agreement -->
                    </ul>
                </div>
            </div>
        </div>
        <!-- END Page Content -->
@endsection
@push('custom-script')
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
