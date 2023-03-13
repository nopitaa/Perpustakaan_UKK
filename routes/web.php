<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;

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
    return redirect('/login');
});
Auth::routes();

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/home', [BukuController::class, 'index'])->name('buku.index');
    Route::get('/export-pdf', [BukuController::class, 'exportPdf'])->name('buku.export.pdf');
    Route::resource('buku', BukuController::class);
    Route::fallback(function(){
        abort(403, 'Anda tidak memiliki akses ke halaman ini.');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::get('/bukus', [BukuController::class, 'indexPublic'])->name('buku.public.index');
    Route::get('/bukus/{id}', [BukuController::class, 'showPublic'])->name('buku.public.show');
});