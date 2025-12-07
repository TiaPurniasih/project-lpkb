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
    return view('welcome');
});

Route::get('/api/provinces', function () {
    return Http::get('https://wilayah.id/api/provinces.json')->json();
});
Route::get('/api/regencies/{id}', function ($id) {
    return Http::get("https://wilayah.id/api/regencies/$id.json")->json();
});
Route::get('/api/districts/{id}', function ($id) {
    return Http::get("https://wilayah.id/api/districts/$id.json")->json();
});
Route::get('/api/villages/{id}', function ($id) {
    return Http::get("https://wilayah.id/api/villages/$id.json")->json();
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
        // Route::get('/profil/lembaga', [ProfileController::class, 'lembaga'])->name('user.profil.lembaga');
        Route::get('/profil/lembaga/{uid?}', [ProfileController::class, 'lembaga'])->name('user.profil.lembaga');
        Route::post('/profil/lembaga/form', [ProfileController::class, 'store'])->name('user.profil.store');
        Route::get('/profil/riwayat-perizinan', [ProfileController::class, 'history'])->name('profile.history');
        Route::get('/profil/riwayat-perizinan/{uid?}', [ProfileController::class, 'historyDetail'])->name('user.profile.history.detail');
        Route::get('/perizinan', [PerizinanController::class, 'index'])->name('user.perizinan.index');
        Route::get('/perizinan/{type}/{form}', [PerizinanController::class, 'index'])->name('user.perizinan.form');
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

        Route::middleware('role.level:' . User::ROLE_ADMIN)->group(function () {
            Route::get('/kanwil', [KanwilController::class, 'index'])->name('cms.kanwil');
            Route::get('/kanwil/datatable', [KanwilController::class, 'datatable'])->name('cms.kanwil.datatable');
            Route::get('/kanwil/form/{id?}', [KanwilController::class, 'form'])->name('cms.kanwil.form');
            Route::get('/kanwil/view/{id}', [KanwilController::class, 'form'])->name('cms.kanwil.view');
            Route::post('/kanwil/form', [KanwilController::class, 'store'])->name('cms.kanwil.store');

            Route::get('/manage/kanwil', [UserController::class, 'index'])->name('cms.manage.kanwil');
            Route::get('/manage/kanwil/datatable', [UserController::class, 'datatable'])->name('cms.manage.kanwil.datatable');
            Route::get('/manage/kanwil/form/{id?}', [UserController::class, 'form'])->name('cms.manage.kanwil.form');
            Route::get('/manage/kanwil/view/{id}', [UserController::class, 'form'])->name('cms.manage.kanwil.view');
            Route::post('/manage/kanwil/form', [UserController::class, 'store'])->name('cms.manage.kanwil.store');
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
