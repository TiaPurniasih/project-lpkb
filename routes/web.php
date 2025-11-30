<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CMS\DashboardController as DashboardCmsController;
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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    // ---------------- PEMOHON ------------------
    Route::middleware('role.level:' . User::ROLE_USER)->group(function () {
        Route::get('/beranda', [DashboardController::class, 'dashboard'])->name('dashboard');
    });
    // -------------- ENDPEMOHON -----------------

    // ------------ ADMIN & KANWIL ---------------
    Route::prefix('cms')->middleware('role.level:' . User::ROLE_KANWIL)->group(function () {
        Route::get('/dashboard', [DashboardCmsController::class, 'dashboard'])->name('dashboard');
    });
    // ---------- END ADMIN & KANWIL -------------


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('role.level:' . User::ROLE_USER)->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    });

    Route::middleware('role.level:' . User::ROLE_SUPERADMIN)->group(function () {
        Route::get('/manage/users', [UserController::class, 'index'])->name('manage.users');
        Route::get('/manage/users/datatable', [UserController::class, 'datatable'])->name('manage.users.datatable');
        Route::get('/manage/users/form/{id?}', [UserController::class, 'form'])->name('manage.users.form');
        Route::get('/manage/users/view/{id}', [UserController::class, 'form'])->name('manage.users.view');
        Route::post('/manage/users/form', [UserController::class, 'store'])->name('manage.users.store');
    });



});

    Route::get('/templates/alerts', [TemplateControllers::class, 'alerts'])->name('template.alerts');
    Route::get('/templates/basic-tables', [TemplateControllers::class, 'basicTable'])->name('template.basic_tables');




// Pengaturan Roles
Route::get('/moderator', function () {
    return "Moderator Page";
})->middleware('role.level:' . User::ROLE_KANWIL);

Route::get('/admin', function () {
    return "Admin Page";
})->middleware('role.level:' . User::ROLE_ADMIN);

Route::get('/super', function () {
    return "Super Admin Panel";
})->middleware('role.level:' . User::ROLE_SUPERADMIN);
// End Pengaturan Roles
require __DIR__.'/auth.php';
