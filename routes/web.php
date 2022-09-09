<?php

use App\Http\Controllers\PembayaranController;
use Illuminate\Support\Facades\Route;

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
    return view('pembayaran.create');
});

Route::prefix('admin')->name('admin.')->group(function() {
    Route::resource('pembayaran', PembayaranController::class)->only('index', 'store', 'create', 'show');
    Route::get('pembayaran/{id}/cetak', [PembayaranController::class, 'cetakKwitansi'])->name('pembayaran.cetakKwitansi');
});

