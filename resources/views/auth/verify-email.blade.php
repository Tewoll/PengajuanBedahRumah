<x-guest-layout>
    <main id="main-container">
        <div class="bg-body-dark">
            <div class="row mx-0 justify-content-center">
                <div class="hero-static col-lg-6 col-xl-4">
                    <div class="content content-full overflow-hidden">
                        <div class="py-4 text-center">
                            <h1 class="h3 fw-bold mt-4 mb-2">{{ __('Verify Your Email Address') }}</h1>
                            <h2 class="h5 fw-medium text-muted mb-0">
                                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                            </h2>
                        </div>
                        @if (session('status') == 'verification-link-sent')
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            <div class="text-center mb-4">
                                <button type="submit" class="btn btn-lg btn-alt-primary fw-medium">
                                    {{ __('Resend Verification Email') }}
                                </button>
                            </div>
                        </form>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <div class="text-center mb-4">
                                <button type="submit" class="btn btn-lg btn-alt-danger fw-medium">
                                    {{ __('Log Out') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-guest-layout>
