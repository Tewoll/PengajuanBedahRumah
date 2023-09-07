<x-guest-layout>
    <!--{!! NoCaptcha::renderJs() !!}-->
    <style>
        .ptxt {
            color: #3366cc;
            float: right !important;
            font-size: 15px !important;
            left: auto !important;
            background: transparent !important;
            position: absolute;
            cursor: pointer !important;
            top: 30% !important;
            right: 10px;
        }

        /*bootstrap-float-label.css*/
        .has-float-label {
            display: block;
            position: relative;
            width: 100%;
        }

        .has-float-label label,
        .has-float-label>span {
            position: absolute;
            cursor: text;
            font-size: 75%;
            opacity: 1;
            -webkit-transition: all .2s;
            transition: all .2s;
            top: -.5em;
            left: .75rem;
            z-index: 3;
            line-height: 1;
            padding: 0 3px;
            background: #fff;
            font-weight: normal;
        }

        .has-float-label>span {
            /*For select2-bootstrap dropdown set top,left margin 0*/
            top: 0;
            left: 0;
        }

        .has-float-label label::after,
        .has-float-label>span::after {
            content: " ";
            display: block;
            position: absolute;
            background: #fff;
            height: 2px;
            top: 50%;
            left: -.2em;
            right: -.2em;
            z-index: -1;
        }

        .has-float-label .form-control::-webkit-input-placeholder {
            opacity: 1;
            -webkit-transition: all .2s;
            transition: all .2s;
        }

        .has-float-label .form-control::-moz-placeholder {
            opacity: 1;
            transition: all .2s;
        }

        .has-float-label .form-control:-ms-input-placeholder {
            opacity: 1;
            transition: all .2s;
        }

        .has-float-label .form-control::placeholder {
            opacity: 1;
            -webkit-transition: all .2s;
            transition: all .2s;
        }

        .has-float-label .form-control:placeholder-shown:not(:focus)::-webkit-input-placeholder {
            opacity: 0;
        }

        .has-float-label .form-control:placeholder-shown:not(:focus)::-moz-placeholder {
            opacity: 0;
        }

        .has-float-label .form-control:placeholder-shown:not(:focus):-ms-input-placeholder {
            opacity: 0;
        }

        .has-float-label .form-control:placeholder-shown:not(:focus)::placeholder {
            opacity: 0;
        }

        .has-float-label .form-control:placeholder-shown:not(:focus)+* {
            font-size: 100%;
            color: #6c757d;
            opacity: 1;
            top: .3em;
        }

        .input-group .has-float-label {
            -webkit-box-flex: 1;
            -webkit-flex-grow: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
            margin-bottom: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
        }

        .has-float-label .form-control:placeholder-shown:not(:focus)+* {
            margin-top: 6px;
        }

        /*pass_show*/
        .ptxt {
            color: #3366cc;
            float: right !important;
            font-size: 15px !important;
            left: auto !important;
            background: transparent !important;
            position: absolute;
            cursor: pointer !important;
            top: 30% !important;
            right: 10px;
        }
    </style>
    <!-- Session Status -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="bg-body-dark">
            <div class="row mx-0 justify-content-center">
                <div class="hero-static col-lg-6 col-xl-4">
                    <div class="content content-full overflow-hidden">
                        <!-- Header -->
                        <div class="py-4 text-center">
                            <a class="link-fx fw-bold" href="/">
                                <i class="fa fa-building"></i>
                                <span class="fs-4 text-body-color">bedah</span><span class="fs-4">Rumah</span>
                            </a>
                            <h1 class="h3 fw-bold mt-4 mb-2">Welcome to Your Dashboard</h1>
                        </div>
                        <!-- END Header -->
                        <!-- Sign In Form -->
                        <form method="POST" action="{{ route('login') }}" class="js-validation-signin">
                            @csrf
                            <div class="block block-themed block-rounded block-fx-shadow">
                                <div class="block-header bg-gd-dusk">
                                    <h3 class="block-title">Please Sign In</h3>
                                </div>
                                <div class="block-content">
                                    <div class="row mb-4">
                                        <div class="col-md-12">
                                            @if (session('status'))
                                                <div class="alert alert-success" role="alert">
                                                    {{ session('status') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <x-text-input id="login-username" class="form-control" type="text"
                                            name="username" :value="old('username')" required autofocus
                                            placeholder="Enter your username" />
                                        <label class="form-label" for="login-username">Username</label>
                                        @error('username')
                                            <div class="text-danger mt-1"><small><i>{{ $message }}</i></small></div>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-4">
                                        <div class="form-group">
                                            <span class="has-float-label pass_show">
                                                <input type="password" name="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    id="password" placeholder="Enter your password" required autocomplete="off">
                                                <label for="password">Password</label>
                                            </span>
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!--<div class="form-floating mb-4">-->
                                    <!--    <div class="form-outline col-md-12 mb-2 text-center">-->
                                    <!--        <div class="d-flex justify-content-center">-->
                                    <!--            {!! NoCaptcha::display() !!}-->
                                    <!--        </div>-->
                                    <!--        @if ($errors->has('g-recaptcha-response'))-->
                                    <!--            <span class="help-block text-danger" role="alert"-->
                                    <!--                style="font-size:12px">-->
                                    <!--                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>-->
                                    <!--            </span>-->
                                    <!--        @endif-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <div class="row">
                                        <div class="col-sm-6 d-sm-flex align-items-center push">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="login-remember-me" name="remember">
                                                <label class="form-check-label" for="login-remember-me">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 text-sm-end push">
                                            <button type="submit" class="btn btn-lg btn-alt-primary fw-medium">
                                                Sign In
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="block-content block-content-full bg-body-light text-center d-flex justify-content-between">
                                    <a class="fs-sm fw-medium link-fx text-muted me-2 mb-1 d-inline-block"
                                        href="{{ route('register') }}">
                                        <i class="fa fa-plus opacity-50 me-1"></i> Create Account
                                    </a>
                                    <a class="fs-sm fw-medium link-fx text-muted me-2 mb-1 d-inline-block"
                                        href="{{ route('password.request') }}">
                                        Forgot Password
                                    </a>
                                </div>
                            </div>
                        </form>
                        <!-- END Sign In Form -->
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.pass_show').append('<span class="ptxt"><i class="fas fa-eye"></i></span>');
            });

            $(document).on('click', '.pass_show .ptxt', function() {
                $(this).html($(this).html() == '<i class="fas fa-eye"></i>' ? '<i class="fas fa-eye-slash"></i>' :
                    '<i class="fas fa-eye"></i>');
                $(this).prev().prev().attr('type', function(index, attr) {
                    return attr == 'password' ? 'text' : 'password';
                });
            });
        </script>
        <!-- END Page Content -->
    </main>
</x-guest-layout>
