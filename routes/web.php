<?php

use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProdukController;
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

Route::prefix("pesanan")->group(function () {
    Route::get("/", [PesananController::class, "index"])->name("pesanan.index");
});

Route::prefix("produk")->group(function () {
    Route::get("/", [ProdukController::class, "index"])->name("produk.index");
});
