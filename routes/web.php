<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;

use App\Models\Category;

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
    return view("welcome");
});

// ======== START ::: Tambah Barang Routes ========
Route::get('/tambah-barang', [BarangController::class, "addIndex"])->name("tambah-barang");
Route::post('/tambah-barang/post', [BarangController::class, "post_addBarang"])->name("tambah-barang-post");
// ======== END ::: Tambah Barang Routes ========

// ======== START ::: Article & Categories Routes ========
Route::get("/article", [ArticleController::class, 'index']);
Route::get('/article/{article:slug}', [ArticleController::class, 'content']);

Route::get('/categories', function(){
    return view('categories', [
        'title' => 'Post Categories',
        'categories' => Category::all(),
    ]);
});
Route::get('/categories/{category:slug}', function(Category $category){
    return view('category', [
        'title' => $category->name,
        'articles' => $category->articles,
        'category' => $category->name
    ]);
});
// ======== END ::: Article & Categories Routes ========