<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AduanController;
use App\Http\Controllers\DanaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\FamilyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landing_page');
})->name('landingPage');

Route::get('LoginPage', [AuthController::class, 'index'])->name('loginPage');
Route::get('ForgotPassword', [AuthController::class, 'forgot'])->name('forgot');
Route::get('LogoutSystem', [AuthController::class, 'logout'])->name('logoutSystem');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('agenda', AgendaController::class);

    Route::resource('aduan', AduanController::class);
    Route::get('aduan/{id}/review', [AduanController::class, 'review'])->name('aduan.review');
    Route::post('aduan/{id}/review/post', [AduanController::class, 'respond'])->name('aduan.respond');
    Route::get('aduanku', [AduanController::class, 'mypost'])->name('aduan.mypost');

    Route::resource('dana', DanaController::class);

    Route::resource('users', UserController::class);

    Route::resource('warga', WargaController::class);
    Route::get('warga/{id}/anggota-keluarga', [WargaController::class, 'family'])->name('warga.family');
    Route::post('warga/anggota-keluarga/post', [WargaController::class, 'postFamily'])->name('warga.postFamily');

    Route::resource('family', FamilyController::class);
});
