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
    <!-- Main Container -->
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
                            <h1 class="h3 fw-bold mt-4 mb-2">Create New Account</h1>
                            <h2 class="h5 fw-medium text-muted mb-0">We’re excited to have you on board!</h2>
                        </div>
                        <!-- END Header -->
                        <form method="POST" action="{{ route('register') }}" class="js-validation-signup">
                            @csrf
                            <div class="block block-themed block-rounded block-fx-shadow">
                                <div class="block-header bg-gd-emerald">
                                    <h3 class="block-title">Please add your details</h3>
                                </div>
                                <div class="block-content">
                                    <div class="form-floating mb-4">
                                        <div class="form-group">
                                            <span class="has-float-label">
                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    id="name" name="name" placeholder="Enter your name" required
                                                    autofocus value="{{ old('name') }}">
                                                <label class="form-label" for="name">{{ __('Name') }}</label>
                                                @error('name')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <div class="form-group">
                                            <span class="has-float-label">
                                                <input type="text"
                                                    class="form-control @error('username') is-invalid @enderror"
                                                    id="username" name="username" placeholder="Enter your username"
                                                    required autofocus value="{{ old('username') }}">
                                                <label class="form-label" for="username">{{ __('Username') }}</label>
                                                @error('username')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <div class="form-group">
                                            <span class="has-float-label">
                                                <input type="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    id="email" name="email" placeholder="Enter your email"
                                                    required value="{{ old('email') }}">
                                                <label class="form-label" for="email">{{ __('Email') }}</label>
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <div class="form-group">
                                            <span class="has-float-label pass_show">
                                                <input type="password" name="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    id="password" placeholder="Password" required autocomplete="off">
                                                <label for="password">Password</label>
                                            </span>
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <div class="form-group">
                                            <span class="has-float-label pass_show">
                                                <input type="password" name="password_confirmation"
                                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                                    id="password_confirmation" placeholder="Confirm Password" required
                                                    autocomplete="off">
                                                <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                                            </span>
                                            @error('password_confirmation')
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
                                    <div class="row mb-4">
                                        <div class="col-sm-6 d-sm-flex align-items-center push">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="signup-terms"
                                                    name="signup-terms" value="1" required>
                                                <label class="form-check-label" for="signup-terms">I agree to
                                                    Terms</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 text-sm-end push">
                                            <button class="btn btn-lg btn-alt-primary fw-semibold">
                                                {{ __('Create Account') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="block-content block-content-full bg-body-light d-flex justify-content-between">
                                    <a class="fs-sm fw-medium link-fx text-muted me-2 mb-1 d-inline-block"
                                        href="{{ route('login') }}">
                                        <i class="fa fa-arrow-left opacity-50 me-1"></i>
                                        {{ __('Already registered?') }}
                                    </a>
                                    <a class="fs-sm fw-medium link-fx text-muted me-2 mb-1 d-inline-block"
                                        href="#" data-bs-toggle="modal" data-bs-target="#modal-terms">
                                        <i class="fa fa-book opacity-50 me-1"></i> Read Terms
                                    </a>
                                </div>

                            </div>
                        </form>
                        <!-- END Sign Up Form -->
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

            <!-- Terms Modal -->
            <div class="modal fade" id="modal-terms" tabindex="-1" role="dialog" aria-labelledby="modal-terms"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-slidedown" role="document">
                    <div class="modal-content">
                        <div class="block block-rounded shadow-none mb-0">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">Terms &amp; Conditions</h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="block-content fs-sm">
                                <h5 class="mb-2">1. General</h5>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices,
                                    justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien
                                    in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum
                                    tincidunt auctor.
                                </p>
                                <h5 class="mb-2">2. Account</h5>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices,
                                    justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien
                                    in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum
                                    tincidunt auctor.
                                </p>
                                <h5 class="mb-2">3. Service</h5>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices,
                                    justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien
                                    in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum
                                    tincidunt auctor.
                                </p>
                            </div>
                            <div class="block-content block-content-full block-content-sm text-end border-top">
                                <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">
                                    Close
                                </button>
                                <button type="button" class="btn btn-alt-primary" data-bs-dismiss="modal">
                                    Done
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Terms Modal -->
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
</x-guest-layout>
