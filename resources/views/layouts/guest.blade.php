<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{ asset('assets/media/favicons/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/media/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/media/favicons/apple-touch-icon-180x180.png') }}">
    <!-- END Icons -->

    <!-- Stylesheets -->

    <!-- Fonts and Codebase framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&display=swap">
    <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/codebase.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/sweetalert2/sweetalert2.min.css') }}">
    <!-- END Stylesheets -->
</head>

<body>
    @include('sweetalert::alert')
    <div id="page-container" class="main-content-boxed">
        {{-- @include('flash-message') --}}
        {{ $slot }}

    </div>
    {{-- @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">

            <strong>{{ $message }}</strong>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

        </div>
    @endif --}}
    <script src="{{ asset('assets/js/codebase.app.min.js') }}"></script>

    <!-- jQuery (required for Select2 + jQuery Validation plugins) -->
    <script src="{{ asset('assets/js/lib/jquery.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('assets/js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('assets/js/pages/op_auth_signup.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/op_auth_signin.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/op_auth_reminder.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('assets/js/plugins/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

    <!-- Page JS Helpers (BS Notify Plugin) -->
    
    <!-- Page JS Code -->
    <script src="{{ asset('assets/js/plugins/pwstrength-bootstrap/pwstrength-bootstrap.min.js') }}"></script>


    <!-- Page JS Helpers (Flatpickr + BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Ion Range Slider + Masked Inputs + Password Strength Meter plugins) -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Codebase.helpersOnLoad(['jq-pw-strength'
            ]);
        });
    </script>

</body>

</html>
