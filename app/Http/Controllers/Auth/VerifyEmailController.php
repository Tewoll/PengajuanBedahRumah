<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        $request->fulfill();
        if ($request->user()->hasVerifiedEmail()) {
            return redirect('/login')->withInfo('Akun anda sudah di verifikasi');
            // return redirect()->intended('/'.'?verified=1')->withInfo('Akun anda sudah di verifikasi');
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
            return redirect('/login')->withSucces('Selamat, akun anda berhasil di verifikasi');
        }

        return redirect()->intended(RouteServiceProvider::HOME.'?verified=1')->withSuccess('Selamat, akun anda berhasil di verifikasi');
    }
}
