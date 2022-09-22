<?php

use App\Http\Controllers\JenisPembayaranController;
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
    Route::resource('pembayaran', PembayaranController::class)->only('index', 'store', 'show');
    Route::get('pembayaran/{nim}/create', [PembayaranController::class, 'create'])->name('pembayaran.create');
    Route::get('pembayaran/{id}/cetak', [PembayaranController::class, 'cetakKwitansi'])->name('pembayaran.cetakKwitansi');
    Route::get('pembayaran/cek/nim', [PembayaranController::class, 'cekNim'])->name('pembayaran.cekNim');
    Route::post('pembayaran/cek/nim', [PembayaranController::class, 'postCekNim'])->name('pembayaran.post.cekNim');

    Route::resource('jenis-pembayaran', JenisPembayaranController::class)->only('index', 'store', 'edit', 'update');
});

