{{-- <x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
<x-guest-layout>
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
                            <h2 class="h5 fw-medium text-muted mb-0">It’s a great day today!</h2>
                        </div>
                        <div class="py-4">
                            <div class="block block-rounded h-100 mb-0">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Reset Password</h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-toggle="block-option"
                                            data-action="state_toggle" data-action-mode="demo">
                                            <i class="si si-refresh"></i>
                                        </button>
                                        <button type="button" class="btn-block-option" data-toggle="block-option"
                                            data-action="content_toggle"><i class="si si-arrow-up"></i></button>
                                    </div>
                                </div>
                                <div class="block-content">
                                    <form method="POST" action="{{ route('password.store') }}">
                                        @csrf
                                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                        <div class="mb-4">
                                            <label class="form-label" for="email">Email</label>
                                            <input type="email"
                                                class="form-control @error('email') is-invalid @enderror" id="email"
                                                name="email" placeholder="Enter your password.."
                                                value="{{ old('email', $request->email) }}">
                                            @error('email')
                                                <div class="text-danger mt-1">
                                                    <small><i>{{ $message }}</i></small>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label" for="lock1-password">New Password</label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                required autocomplete="new-password">
                                            @error('password')
                                                <div class="text-danger mt-1"><small><i>{{ $message }}</i></small>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label" for="password_confirmation">Confirm
                                                Password</label>
                                            <input type="password" class="form-control" name="password_confirmation"
                                                required autocomplete="new-password">
                                            @error('password-confirmation')
                                                <div class="text-danger mt-1"><small><i>{{ $message }}</i></small>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <button type="submit" class="btn btn-primary">Reset Password
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-guest-layout>
