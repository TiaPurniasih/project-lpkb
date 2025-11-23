<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TemplateControllers;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/otp', function () {
    return view('auth.otp');
})->name('otp');

Route::get('/pemohon/dashboard', function () {
    return view('pemohon.dashboard');
})->name('pemohon.dashboard');

Route::get('/pemohon/riwayat-pengajuan', function () {
    return view('pemohon.riwayat-permohonan');
})->name('pemohon.riwayat-pengajuan');

Route::get('/pemohon/riwayat-pengajuan/detail', function () {
    return view('pemohon.detail-permohonan');
})->name('pemohon.detail-permohonan');

Route::get('/profil-lembaga', function () {
    return view('pemohon.profil-lembaga');
})->name('profil-lembaga');

Route::get('/pengajuan-izin', function () {
    return view('pemohon.pengajuan-izin');
})->name('pengajuan-izin');

Route::get('/pengajuan-izin/nava-dhammasekha', function () {
    return view('pemohon.nava-dhammasekha');
})->name('nava-dhammasekha');

Route::get('/pengajuan-izin/nava-dhammasekha/dokumen', function () {
    return view('pemohon.nava-dhammasekha-page2');
})->name('nava-dhammasekha.page2');

Route::get('/pengajuan-izin/mula-dhammasekha', function () {
    return view('pemohon.mula-dhammasekha');
})->name('mula-dhammasekha');

Route::get('/pengajuan-izin/mula-dhammasekha/dokumen', function () {
    return view('pemohon.mula-dhammasekha-page2');
})->name('mula-dhammasekha.page2');

Route::get('/pengajuan-izin/muda-dhammasekha', function () {
    return view('pemohon.muda-dhammasekha');
})->name('muda-dhammasekha');

Route::get('/pengajuan-izin/muda-dhammasekha/dokumen', function () {
    return view('pemohon.muda-dhammasekha-page2');
})->name('muda-dhammasekha.page2');

Route::get('/pengajuan-izin/uttama-dhammasekha', function () {
    return view('pemohon.uttama-dhammasekha');
})->name('uttama-dhammasekha');

Route::get('/pengajuan-izin/uttama-dhammasekha/dokumen', function () {
    return view('pemohon.uttama-dhammasekha-page2');
})->name('uttama-dhammasekha.page2');

Route::view('/admin-pusat/dashboard', 'admin-pusat.dashboard')
    ->name('admin-pusat.dashboard');

Route::view('/admin-pusat/pengajuan-perizinan', 'admin-pusat.pengajuan-perizinan.index')
    ->name('admin-pusat.pengajuan-perizinan.index');

Route::view('/admin-pusat/pengajuan-perizinan/riwayat', 'admin-pusat.pengajuan-perizinan.history')
    ->name('admin-pusat.pengajuan-perizinan.history');

Route::view('/admin-pusat/manajemen-sertifikat', 'admin-pusat.manajemen-sertifikat.index')
    ->name('admin-pusat.manajemen-sertifikat.index');

Route::view('/admin-pusat/manajemen-kanwil', 'admin-pusat.manajemen-kanwil.index')
    ->name('admin-pusat.manajemen-kanwil.index');

Route::view('/admin-pusat/manajemen-kanwil/tambah', 'admin-pusat.manajemen-kanwil.create')
    ->name('admin-pusat.manajemen-kanwil.create');

Route::view('/admin-pusat/pengaturan', 'admin-pusat.pengaturan.index')
    ->name('admin-pusat.pengaturan.index');

Route::get('/admin-pusat/pengajuan-perizinan/{submission}', function ($submission) {
    return view('admin-pusat.pengajuan-perizinan.show', [
        'submissionId' => $submission,
    ]);
})->name('admin-pusat.pengajuan-perizinan.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('role.level:' . User::ROLE_USER)->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    });

    Route::get('/templates/alerts', [TemplateControllers::class, 'alerts'])->name('template.alerts');
    Route::get('/templates/basic-tables', [TemplateControllers::class, 'basicTable'])->name('template.basic_tables');

    Route::middleware('role.level:' . User::ROLE_SUPERADMIN)->group(function () {
        Route::get('/manage/users', [UserController::class, 'index'])->name('manage.users');
        Route::get('/manage/users/datatable', [UserController::class, 'datatable'])->name('manage.users.datatable');
        Route::get('/manage/users/form/{id?}', [UserController::class, 'form'])->name('manage.users.form');
        Route::get('/manage/users/view/{id}', [UserController::class, 'form'])->name('manage.users.view');
        Route::post('/manage/users/form', [UserController::class, 'store'])->name('manage.users.store');
    });



});


// Pengaturan Roles
Route::get('/moderator', function () {
    return "Moderator Page";
})->middleware('role.level:' . User::ROLE_MODERATOR);

Route::get('/admin', function () {
    return "Admin Page";
})->middleware('role.level:' . User::ROLE_ADMIN);

Route::get('/super', function () {
    return "Super Admin Panel";
})->middleware('role.level:' . User::ROLE_SUPERADMIN);
// End Pengaturan Roles
require __DIR__.'/auth.php';
