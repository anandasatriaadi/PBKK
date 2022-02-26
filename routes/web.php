<?php

use App\Http\Controllers\BarangController;
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
    return redirect()->route("tambah-barang");
});

Route::get('/tambah-barang', [BarangController::class, "addIndex"])->name("tambah-barang");

Route::post('/tambah-barang/post', [BarangController::class, "post_addBarang"])->name("tambah-barang-post");
