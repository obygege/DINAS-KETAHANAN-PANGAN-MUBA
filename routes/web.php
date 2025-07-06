<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\Admin\Auth\RegisterController as AdminRegisterController;
use App\Http\Controllers\Admin\Auth\LoginController as AdminLoginController;
use App\Http\Controllers\Admin\ProposalController as AdminProposalController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\HargaPanganController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\BeritaPageController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\Admin\Auth\AdminForgotPasswordController;
use App\Http\Controllers\Auth\UserForgotPasswordController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Admin\KwtGalleryController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\Admin\ContactMessageViewController;
use App\Http\Controllers\Admin\SuperAdminDashboardController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\UserDashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you can register web routes for your application.
|
*/

// Home Route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route Download Harga Pangan
Route::get('/harga-pangan/download', [HomeController::class, 'downloadPDF'])->name('harga.download.pdf');

// Navbar User Route
Route::get('/sambutan-kepala-dinas', [HomeController::class, 'showSambutan'])->name('profil.sambutan');
Route::get('/dasar-hukum', [HomeController::class, 'showDasarHukum'])->name('profil.dasar-hukum');
Route::get('/tentang-kami', [HomeController::class, 'showTentangKami'])->name('profil.tentang-kami');
Route::get('/struktur-organisasi', [HomeController::class, 'showStrukturOrganisasi'])->name('profil.struktur');
Route::view('/kegiatan', 'menu.kegiatan')->name('profil.kegiatan');
Route::view('/b2sa', 'menu.b2sa')->name('profil.b2sa');
Route::view('/Daftar', 'auth.daftar')->name('auth.daftar');
Route::get('/daftar', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/daftar', [RegisterController::class, 'register'])->name('register.submit');
Route::get('/login', function () {
    return view('auth.login');
})->name('login.form');

// Login User Route
// Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form'); 
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.form');

// Logout User
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Login User Autentifikasi ke halaman dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('main.dashboard');
    })->name('dashboard');
});

// Navbar Dashboard User
Route::view('/kirim-proposal', 'main.proposal')->name('proposal.create');

// Route Proposal
Route::get('/kirim-proposal', [ProposalController::class, 'create'])->name('proposal.create');
Route::post('/kirim-proposal', [ProposalController::class, 'store'])->name('proposal.store');

// Route Akses Halaman Admin
Route::get('/admin', [AdminLoginController::class, 'showLoginForm'])->name('admin.login.form');

// Route Daftar Admin
Route::get('/admin/null', [AdminRegisterController::class, 'showRegistrationForm'])->name('admin.register.form');
Route::post('/admin/null', [AdminRegisterController::class, 'store'])->name('admin.register.submit');
Route::get('/admin/index', function () {
    return view('admin.index');
})->name('admin.index');


// Route Login Admin
Route::get('/admin', [AdminLoginController::class, 'showLoginForm'])->name('admin.login.form');
Route::post('/admin', [AdminLoginController::class, 'login'])->name('admin.login.submit');
Route::prefix('admin')->middleware('auth:admin')->name('admin.')->group(function () {
    Route::get('dashboard', function () {
        $user = auth()->guard('admin')->user();

        if ($user->role == 'superadmin') {
            // Tetap panggil controller untuk superadmin
            return app(SuperAdminDashboardController::class)->index(request());
        } else {
            // [PERUBAHAN DI SINI] Panggil controller untuk admin biasa
            // agar semua data statistik ikut terkirim ke view.
            return app(AdminDashboardController::class)->index(request());
        }
    })->name('dashboard');
});
// Logout Admin
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Route Super Admin Sidebar


// Route Proposal Admin
Route::get('/proposal', [AdminProposalController::class, 'index'])->name('admin.proposals.index');
Route::patch('/proposal/{proposal}/status', [AdminProposalController::class, 'updateStatus'])->name('admin.proposals.updateStatus');
Route::delete('/proposal/{proposal}', [AdminProposalController::class, 'destroy'])->name('admin.proposals.destroy');

// Route Laporan User
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('main.dashboard');
    })->name('dashboard');
    Route::view('/kirim-proposal', 'main.proposal')->name('proposal.create');
    Route::get('/laporan-kegiatan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::post('/laporan-kegiatan', [LaporanController::class, 'store'])->name('laporan.store');
    Route::get('/kirim-proposal', [ProposalController::class, 'create'])->name('proposal.create');
    Route::post('/kirim-proposal', [ProposalController::class, 'store'])->name('proposal.store');
    Route::delete('/laporan-kegiatan/{laporan}', [LaporanController::class, 'destroy'])->name('laporan.destroy');
    Route::get('/laporan-kegiatan/{laporan}/edit', [LaporanController::class, 'edit'])->name('laporan.edit');
    Route::put('/laporan-kegiatan/{laporan}', [LaporanController::class, 'update'])->name('laporan.update');
});

// Route Sidebar Admin
Route::get('laporan', [LaporanController::class, 'index'])->name('laporan.index');

// Route Laporan Admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('laporan', [\App\Http\Controllers\Admin\LaporanController::class, 'index'])->name('laporan.index');
    Route::delete('laporan/{laporan}', [\App\Http\Controllers\Admin\LaporanController::class, 'destroy'])->name('laporan.destroy');
});

// Route Harga Pangan Super Admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('harga-pangan', HargaPanganController::class);
});

// Route Tambah Berita Admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('berita', BeritaController::class);
});

// Route Tampilkan Berita
Route::get('/berita/{beritum}', [BeritaPageController::class, 'show'])->name('berita.show');

// Route Edit Profile Admin
Route::prefix('admin')->middleware('auth:admin')->name('admin.')->group(function () {
    Route::get('profile', [AdminProfileController::class, 'showProfile'])->name('profile');
    Route::post('profile', [AdminProfileController::class, 'updateProfile'])->name('profile.update');
});

// Route View Dan Edit User
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [UserProfileController::class, 'show'])->name('profile.show');
    Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
});

// Route Lupa Password Admin
Route::prefix('admin/password')->name('admin.password.')->group(function () {
    Route::get('forgot', [AdminForgotPasswordController::class, 'showLinkRequestForm'])->name('request');
    Route::post('forgot', [AdminForgotPasswordController::class, 'findAccountByNip'])->name('find');
    Route::get('reset', [AdminForgotPasswordController::class, 'showResetForm'])->name('reset.form');
    Route::post('reset', [AdminForgotPasswordController::class, 'resetPassword'])->name('update');
});

// Route Lupa Password User
Route::controller(UserForgotPasswordController::class)->group(function () {
    Route::get('/password/forgot', 'showNikRequestForm')->name('password.verify.nik.form');
    Route::post('/password/forgot', 'verifyNik')->name('password.verify.nik');
    Route::get('/password/verify-phone/{id}', 'showPhoneRequestForm')->name('password.verify.phone.form');
    Route::post('/password/verify-phone', 'verifyPhone')->name('password.verify.phone');
    Route::get('/password/reset', 'showResetForm')->name('password.reset.form');
    Route::post('/password/reset', 'resetPassword')->name('password.update');
});

// Route Untuk Management User pada Admin
Route::prefix('admin')->middleware('auth:admin')->name('admin.')->group(function () {
    Route::resource('users', UserManagementController::class);
});

// Route Galery KWT Super Admin
Route::prefix('admin')->middleware('auth:admin')->name('admin.')->group(function () {
    Route::get('kwt-gallery', [KwtGalleryController::class, 'index'])->name('kwt-gallery.index');
    Route::post('kwt-gallery', [KwtGalleryController::class, 'store'])->name('kwt-gallery.store');
    Route::delete('kwt-gallery/{kwt_gallery}', [KwtGalleryController::class, 'destroy'])->name('kwt-gallery.destroy');
});

// Route Input Saran Masukan
Route::post('/contact', [ContactMessageController::class, 'store'])->name('contact.store');

// Route Tampilkan Saran dari Pengguna
Route::prefix('admin')->middleware('auth:admin')->name('admin.')->group(function () {
    Route::get('kotak-saran', [ContactMessageViewController::class, 'index'])->name('kotak-saran.index');
});
