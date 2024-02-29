<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserEbookController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('dataUser', [UserEbookController::class, 'index'])->middleware(['auth'])->name('dataUser');

require __DIR__.'/auth.php';

Route::resource('contacts', ContactController::class)->middleware(['auth']);

Route::resource('posts', PostController::class)->middleware(['auth']);

Route::resource('transaksi', TransaksiController::class)->middleware(['auth']);
// Route::post('/checkout', TransaksiController::class, 'store')->middleware(['auth']);
// Route::get('/transaksi', TransaksiController::class, 'index')->middleware(['auth']);

