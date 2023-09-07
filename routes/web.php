<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Artisan;

// Admin Controller
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DataPermohonanController;
use App\Http\Controllers\Admin\DataVerifikasiLanjutanController;
use App\Http\Controllers\Admin\PenggunaController;

// User Controller
use App\Http\Controllers\User\DataDiriController;
use App\Http\Controllers\User\DataPengajuanController;
use App\Http\Controllers\User\UserController;

// Verifikator Controller
use App\Http\Controllers\Verifikator\VerifikatorController;
use App\Http\Controllers\Verifikator\DataVerifikasiLapanganController;

// Verifikator Controller
use App\Http\Controllers\KepalaDinas\KepalaDinasController;
use App\Http\Controllers\KepalaDinas\SkoringController;


    /*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/;
Route::get('/clear', function () {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    // Set session flash dengan pesan success
    return redirect('/')->with('success', 'Cache cleared successfully.');
})->name('clear.cache');

Route::get('/', function () {
    if (auth()->check()) {
        if (auth()->user()->hasRole('Admin')) {
            return redirect()->route('dashboard.index');
        } elseif (auth()->user()->hasRole('Kepala Dinas')) {
            return redirect()->route('dashboard-dinas.index');
        } elseif (auth()->user()->hasRole('Verifikator Lapangan')) {
            return redirect()->route('home-verifikator.index');
        } elseif (auth()->user()->hasRole('User')) {
            return redirect()->route('home.index');
        }
    } else {
        return view('welcome');
    }
});
// Group Route Admin
Route::middleware(['auth', 'role:Admin'])->group(function () {
    // Route::get('/foo', function () {
    //     Artisan::call('storage:link');
    // });
    // Route::get('/linkstorage', function () {
    //     $targetFolder = base_path() . '/storage/app/public';
    //     $linkFolder = $_SERVER['DOCUMENT_ROOT'] . '/storage';
    //     symlink($targetFolder, $linkFolder);
    // });
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
});
Route::middleware(['auth', 'role:Admin'])->prefix('admin')->group(function () {
    Route::resource('dashboard', AdminController::class);
    Route::resource('pengguna', PenggunaController::class);
    Route::resource('permohonan', DataPermohonanController::class);
    Route::post('permohonan/konfirmasi/{id}', [DataPermohonanController::class, 'konfirmasi'])->name('permohonan.konfirmasi');
    Route::resource('verifikasi-lanjut', DataVerifikasiLanjutanController::class);
});

// Group Route User
Route::middleware(['auth', 'role:User'])->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('user');
});
Route::middleware(['auth', 'verified', 'role:User'])->prefix('user')->group(function () {
    Route::resource('home', UserController::class);
    Route::resource('data-diri', DataDiriController::class);
    Route::resource('data-pengajuan', DataPengajuanController::class);
    Route::post('data-pengajuan/dokumen-ktp', [DataPengajuanController::class, 'ktpStore'])->name('data-pengajuan.ktp.store');
    Route::post('data-pengajuan/dokumen-kk', [DataPengajuanController::class, 'kkStore'])->name('data-pengajuan.kk.store');
    Route::post('data-pengajuan/dokumen-sertifikat', [DataPengajuanController::class, 'sertifikatStore'])->name('data-pengajuan.sertifikat-tanah.store');
    Route::post('data-pengajuan/surat-pengantar', [DataPengajuanController::class, 'suratPengantarStore'])->name('data-pengajuan.surat-pengantar.store');
    Route::post('data-pengajuan/domisili', [DataPengajuanController::class, 'domisiliStore'])->name('data-pengajuan.domisili.store');
    Route::post('data-pengajuan/skkm', [DataPengajuanController::class, 'skkmStore'])->name('data-pengajuan.skkm.store');
    Route::post('data-pengajuan/dokumen-rumah', [DataPengajuanController::class, 'rumahStore'])->name('data-pengajuan.rumah.store');
    Route::post('data-pengajuan/dokumen-rumah-destroy/{id}', [DataPengajuanController::class, 'rumahDestroy'])->name('data-pengajuan.rumah.destroy');
    Route::get('data-diri/delete/{id}', [DataDiriController::class, 'delete'])->name('user.delete');
});

// Group Route Verifikator Lapangan
Route::middleware(['auth', 'role:Verifikator Lapangan'])->group(function () {
    Route::get('/verifikator', [VerifikatorController::class, 'index'])->name('verifikator');
});
Route::middleware(['auth', 'verified', 'role:Verifikator Lapangan'])->prefix('verifikator')->group(function () {
    Route::resource('home-verifikator', VerifikatorController::class);
    Route::resource('verifikasi-lanjutan', DataVerifikasiLapanganController::class);
    Route::get('verifikasi-lanjutan/{id}', [DataVerifikasiLapanganController::class, 'show'])->name('verifikasi-lanjutan-verifikator.show');
    Route::get('/verifikasi-lanjutan/create/{id}', [DataVerifikasiLapanganController::class, 'create'])->name('verifikasi-lanjutan.create');
});

// Group Route Kepala Dinas
Route::middleware(['auth', 'role:Kepala Dinas'])->group(function () {
    Route::get('/kepala-dinas', [KepalaDinasController::class, 'index'])->name('kepala-dinas');
});
Route::middleware(['auth', 'verified', 'role:Kepala Dinas'])->prefix('kepala-dinas')->group(function () {
    Route::resource('dashboard-dinas', KepalaDinasController::class);
    Route::resource('skoring', SkoringController::class);
    Route::get('verifikasi-lanjutan/{id}', [DataVerifikasiLapanganController::class, 'show'])->name('verifikasi-lanjutan.show');
    Route::put('verifikasi-lanjutan/{id}/update', [DataVerifikasiLapanganController::class, 'update'])->name('verifikasi-lanjutan.update');
});

Route::middleware('auth')->group(function () {
    Route::resource('laporan', LaporanController::class);
    Route::get('/get-cities/{provinsi}', [DataDiriController::class, 'getCities']);
    Route::get('/get-districts/{kabupaten}', [DataDiriController::class, 'getDistricts']);
    Route::get('/get-villages/{kecamatan}', [DataDiriController::class, 'getVillages']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
