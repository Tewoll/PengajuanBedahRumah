<x-guest-layout>
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
                            <h3 class="h4 fw-bold mt-4 mb-2">Jangan khawatir, kami siap membantu</h3>
                            <h4 class="h6 fw-medium text-muted mb-0">Silakan masukkan nama pengguna atau email Anda</h4>
                        </div>
                        <!-- END Header -->

                        <!-- Session Status -->
                        <div class="row">
                            <div class="col-md-12">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        {{--                         
                        <x-auth-session-status class="mb-4" :status="session('status')" /> --}}
                        <!-- Reminder Form -->
                        <form method="POST" action="{{ route('password.email') }}" class="js-validation-reminder">
                            @csrf
                            <div class="block block-themed block-rounded block-fx-shadow">
                                <div class="block-header bg-gd-primary">
                                    <h3 class="block-title">Reset Password</h3>
                                </div>
                                <div class="block-content">
                                    <div class="form-floating mb-4">
                                        <input id="email" class="form-control @error('email') is-invalid @enderror"
                                            type="text" name="email" value="{{ old('email') }}" required
                                            placeholder="Enter your email or username" />
                                        <label class="form-label" for="email">Username or Email</label>
                                        @error('email')
                                            <div class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="text-center mb-4">
                                        <button type="submit" class="btn btn-lg btn-alt-primary fw-semibold">
                                            Reset Password
                                        </button>
                                    </div>
                                </div>
                                <div class="block-content block-content-full bg-body-light mb-4 text-center">
                                    <a class="fs-sm fw-medium link-fx text-muted me-2 mb-1 d-inline-block"
                                        href="{{ route('login') }}">
                                        <i class="fa fa-arrow-left opacity-50 me-1"></i> Sign In
                                    </a>
                                </div>
                            </div>
                        </form>
                        <!-- END Reminder Form -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END Page Content -->
    </main>

</x-guest-layout>
