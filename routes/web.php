<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\TestingController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::redirect('/', '/login');

Auth::routes();

route::middleware(['auth'])->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::middleware(['check.access:agent'])->group(function () {
       Route::get('/agent/data', [AgentController::class,'data'])->name('agent.data');
       Route::get('testsearch', [AgentController::class, 'testsearchh']);
       Route::get('/agent/search', [AgentController::class, 'searchquery'])->name('agent.search');
       Route::resource('agent', AgentController::class);


    });
    Route::get('/pembayaran', [PenjualanController::class,'pembayaran'])->name('pembayaran');
    Route::get('/laporan-penjualan', [PenjualanController::class,'laporan_penjualan'])->name('laporan_penjualan');
    Route::get('/laporan-penjualan/filter_data/{tanggal}/{valflaglunas}', [PenjualanController::class,'filter_data'])->name('laporan_penjualan.filter_data');
    Route::get('/print-penjualan', [PenjualanController::class,'print_penjualan'])->name('print_penjualan');
    Route::get('/pembayaran/bayar/{penjualan}', [PenjualanController::class,'bayar'])->name('pembayaran.bayar');
    Route::post('/pembayaran/bayar/{penjualan}', [PenjualanController::class,'actionbayar'])->name('pembayaran.save');
    Route::resource('penjualan', PenjualanController::class);
    Route::resource('testing', TestingController::class);

});




