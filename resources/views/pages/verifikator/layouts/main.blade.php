<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>App BedahRumah - @yield('title')</title>

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{ asset('assets/media/favicons/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/media/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ asset('assets/media/favicons/apple-touch-icon-180x180.png') }}">
    <!-- END Icons -->

    <!-- Stylesheets -->

    <!-- Fonts and Codebase framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&display=swap">
    <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/codebase.min.css') }}">

    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/ion-rangeslider/css/ion.rangeSlider.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/dropzone/min/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/flatpickr/flatpickr.min.css') }}">
    @livewireStyles
    @stack('custom-css')
</head>

<body>
    @include('sweetalert::alert')
    <div id="page-container"
        class="enable-page-overlay side-scroll page-header-fixed page-header-modern main-content-boxed side-trans-enabled">
        {{-- <div id="page-container"
            class="sidebar-o enable-page-overlay side-scroll page-header-fixed page-header-modern main-content-boxed side-trans-enabled"> --}}

            <!-- Sidebar -->
            @include('pages.verifikator.layouts.sidebar')
            <!-- END Sidebar -->

            <!-- Header -->
            @include('pages.verifikator.layouts.header')
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                @yield('content')
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->

            <!-- Footer -->
            <footer id="page-footer">
                <div class="content py-3">
                    <div class="row fs-sm">
                        <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-end">
                            @2023 by <a class="fw-semibold" href="javascript:void()" target="_blank">TewollArt - Software
                                Engineer</a>
                        </div>
                        <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-start">
                            <a class="fw-semibold" href="javascript:void()" target="_blank">bedahRumah 1.0</a>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Page Container -->

        <!-- Page JS Plugins -->
        <script src="{{ asset('assets/js/codebase.app.min.js') }}"></script>
        <script src="{{ asset('assets/js/lib/jquery.min.js') }}"></script>

        <!-- jQuery (required for DataTables plugin) -->
        <script src="{{ asset('assets/js/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/datatables-buttons-jszip/jszip.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/datatables-buttons-pdfmake/pdfmake.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/datatables-buttons-pdfmake/vfs_fonts.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/datatables-buttons/buttons.print.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/datatables-buttons/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/pwstrength-bootstrap/pwstrength-bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/select2/js/select2.full.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/masked-inputs/jquery.maskedinput.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/dropzone/min/dropzone.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/flatpickr/flatpickr.min.js') }}"></script>
        <!-- Page JS Code -->
        <script src="{{ asset('assets/js/pages/be_tables_datatables.min.js') }}"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Codebase.helpersOnLoad([
                    'js-flatpickr',
                    'jq-datepicker',
                    'jq-colorpicker',
                    'jq-maxlength',
                    'jq-select2',
                    'jq-rangeslider',
                    'jq-masked-inputs',
                    'jq-pw-strength',
                    'jq-notify',
                    'cb-table-tools-checkable',
                    'cb-table-tools-sections',
                ]);
            });
        </script>
        @stack('custom-script')
</body>

</html>
