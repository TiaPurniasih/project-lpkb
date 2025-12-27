<?php

use App\Http\Controllers\USER\DashboardController;
use App\Http\Controllers\USER\ProfileController;
use App\Http\Controllers\USER\PerizinanController;
use App\Http\Controllers\CMS\DashboardController as DashboardCmsController;
use App\Http\Controllers\CMS\UserController;
use App\Http\Controllers\CMS\KanwilController;
use App\Http\Controllers\TemplateControllers;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Http;
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
    // return view('welcome');
    return redirect('/beranda');
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        $user = Auth::user();
        if ($user->hasLevel(User::ROLE_KANWIL)) {
            return redirect('/cms/dashboard');
        }
        if ($user->hasLevel(User::ROLE_USER)) {
            return redirect('/beranda');
        }
      
        return redirect(to: '/home');
    });

    // ---------------- PEMOHON ------------------
    Route::middleware('role.level:' . User::ROLE_USER)->group(function () {
        Route::get('/beranda', [DashboardController::class, 'dashboard'])->name('user.dashboard');
        Route::get('/profil/akun', [ProfileController::class, 'account'])->name('user.profil.account');
        Route::get('/profil/lembaga', [ProfileController::class, 'lembaga'])->name('user.profil.lembaga');
        Route::post('/profil/lembaga/form', [ProfileController::class, 'store'])->name('user.profil.store');
        Route::get('/profil/riwayat-perizinan', [ProfileController::class, 'history'])->name('profile.history');
        Route::get('/profil/riwayat-perizinan/{uid?}', [ProfileController::class, 'historyDetail'])->name('user.profile.history.detail');
        Route::get('/perizinan', [PerizinanController::class, 'index'])->name('user.perizinan.index');
        Route::get('/perizinan/{type}/{form}', [PerizinanController::class, 'permition'])->name('user.perizinan.form');
        Route::post('/perizinan/store', [PerizinanController::class, 'submit'])->name('user.perizinan.submit');
    });
    // -------------- ENDPEMOHON -----------------

    // ------------ ADMIN & KANWIL ---------------
    Route::prefix( 'cms')->middleware('role.level:' . User::ROLE_KANWIL)->group(function () {
        Route::get('dashboard', [DashboardCmsController::class, 'dashboard'])->name('cms.dashboard');

        Route::get('/manage/users', [UserController::class, 'index'])->name('cms.manage.users');
        Route::get('/manage/users/datatable', [UserController::class, 'datatable'])->name('cms.manage.users.datatable');
        Route::get('/manage/users/form/{id?}', [UserController::class, 'form'])->name('cms.manage.users.form');
        Route::get('/manage/users/view/{id}', [UserController::class, 'form'])->name('cms.manage.users.view');
        Route::post('/manage/users/form', [UserController::class, 'store'])->name('cms.manage.users.store');
        Route::post('/manage/users/delete', [UserController::class, 'delete'])->name('cms.manage.users.destroy');

        Route::middleware('role.level:' . User::ROLE_ADMIN)->group(function () {
            Route::get('/manage/kanwil', [KanwilController::class, 'index'])->name('cms.manage.kanwil');
            Route::get('/manage/kanwil/datatable', [KanwilController::class, 'datatable'])->name('cms.manage.kanwil.datatable');
            Route::get('/manage/kanwil/form/{id?}', [KanwilController::class, 'form'])->name('cms.manage.kanwil.form');
            Route::get('/manage/kanwil/view/{id}', [KanwilController::class, 'form'])->name('cms.manage.kanwil.view');
            Route::post('/manage/kanwil/form', [KanwilController::class, 'store'])->name('cms.manage.kanwil.store');
        });
        Route::middleware('role.level:' . User::ROLE_SUPERADMIN)->group(function () {

        });
    });
    // ---------- END ADMIN & KANWIL -------------
    
    
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Route::middleware('role.level:' . User::ROLE_USER)->group(function () {
        //     Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
        // });
        
    // ---------- TEMPLATES HERE -------------
    Route::prefix( 'preview')->group(function () {
        Route::get('/otp', function () {
            return view('/preview/auth.otp');
        })->name('otp');

        Route::get('/pemohon/dashboard', function () {
            return view('/preview/pemohon.dashboard');
        })->name('pemohon.dashboard');

        Route::get('/pemohon/riwayat-pengajuan', function () {
            return view('/preview/pemohon.riwayat-permohonan');
        })->name('pemohon.riwayat-pengajuan');

        Route::get('/pemohon/riwayat-pengajuan/detail', function () {
            return view('/preview/pemohon.detail-permohonan');
        })->name('pemohon.detail-permohonan');

        Route::get('/profil-lembaga', function () {
            return view('/preview/pemohon.profil-lembaga');
        })->name('profil-lembaga');

        Route::get('/pengajuan-izin', function () {
            return view('/preview/pemohon.pengajuan-izin');
        })->name('pengajuan-izin');

        Route::get('/pengajuan-izin/nava-dhammasekha', function () {
            return view('/preview/pemohon.nava-dhammasekha');
        })->name('nava-dhammasekha');

        Route::get('/pengajuan-izin/nava-dhammasekha/dokumen', function () {
            return view('/preview/pemohon.nava-dhammasekha-page2');
        })->name('nava-dhammasekha.page2');

        Route::get('/pengajuan-izin/mula-dhammasekha', function () {
            return view('/preview/pemohon.mula-dhammasekha');
        })->name('mula-dhammasekha');

        Route::get('/pengajuan-izin/mula-dhammasekha/dokumen', function () {
            return view('/preview/pemohon.mula-dhammasekha-page2');
        })->name('mula-dhammasekha.page2');

        Route::get('/pengajuan-izin/muda-dhammasekha', function () {
            return view('/preview/pemohon.muda-dhammasekha');
        })->name('muda-dhammasekha');

        Route::get('/pengajuan-izin/muda-dhammasekha/dokumen', function () {
            return view('/preview/pemohon.muda-dhammasekha-page2');
        })->name('muda-dhammasekha.page2');

        Route::get('/pengajuan-izin/uttama-dhammasekha', function () {
            return view('/preview/pemohon.uttama-dhammasekha');
        })->name('uttama-dhammasekha');

        Route::get('/pengajuan-izin/uttama-dhammasekha/dokumen', function () {
            return view('/preview/pemohon.uttama-dhammasekha-page2');
        })->name('uttama-dhammasekha.page2');

        Route::view('/admin-pusat/dashboard', 'preview.admin-pusat.dashboard')
            ->name('admin-pusat.dashboard');

        Route::view('/admin-pusat/pengajuan-perizinan', 'preview.admin-pusat.pengajuan-perizinan.index')
            ->name('admin-pusat.pengajuan-perizinan.index');

        Route::view('/admin-pusat/pengajuan-perizinan/riwayat', 'preview.admin-pusat.pengajuan-perizinan.history')
            ->name('admin-pusat.pengajuan-perizinan.history');

        Route::view('/admin-pusat/manajemen-sertifikat', 'preview.admin-pusat.manajemen-sertifikat.index')
            ->name('admin-pusat.manajemen-sertifikat.index');

        Route::view('/admin-pusat/manajemen-kanwil', 'preview.admin-pusat.manajemen-kanwil.index')
            ->name('admin-pusat.manajemen-kanwil.index');

        Route::view('/admin-pusat/manajemen-kanwil/tambah', 'preview.admin-pusat.manajemen-kanwil.create')
            ->name('admin-pusat.manajemen-kanwil.create');

        Route::view('/admin-pusat/pengaturan', 'preview.admin-pusat.pengaturan.index')
            ->name('admin-pusat.pengaturan.index');

        Route::get('/preview/admin-pusat/pengajuan-perizinan/{submission}', function ($submission) {
            return view('/preview/admin-pusat.pengajuan-perizinan.show', [
                'submissionId' => $submission,
            ]);
        })->name('admin-pusat.pengajuan-perizinan.show');

        Route::get('/dashboard', function () {
            return view('dashboard');
        })->middleware(['auth', 'verified'])->name('dashboard');
    });
    // ---------- TEMPLATES HERE -------------

});

Route::get('/templates/alerts', [TemplateControllers::class, 'alerts'])->name('template.alerts');
Route::get('/templates/basic-tables', [TemplateControllers::class, 'basicTable'])->name('template.basic_tables');

// // Pengaturan Roles
// Route::get('/moderator', function () {
//     return "Moderator Page";
// })->middleware('role.level:' . User::ROLE_KANWIL);

// Route::get('/admin', function () {
//     return "Admin Page";
// })->middleware('role.level:' . User::ROLE_ADMIN);

// Route::get('/super', function () {
//     return "Super Admin Panel";
// })->middleware('role.level:' . User::ROLE_SUPERADMIN);
// // End Pengaturan Roles
require __DIR__.'/auth.php';
