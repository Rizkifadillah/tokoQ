<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\KategoriController;

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

Route::get('/', fn() => redirect()->route('login'));
// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('menu.dashboard.index');
})->name('dashboard');

Route::group(['middleware' => 'auth'], function(){
    // kategori
    Route::get('/product/data', [ProductController::class, 'data'])->name('product.data');
    Route::post('/product/delete-selected', [ProductController::class, 'deleteSelected'])->name('product.delete_selected');
    Route::post('/product/cetak-barcode', [ProductController::class, 'cetakBarcode'])->name('product.cetak_barcode');
    Route::resource('/product', ProductController::class);

    Route::get('/kategori/data', [KategoriController::class, 'data'])->name('kategori.data');
    Route::resource('/kategori',KategoriController::class);

    Route::get('/member/data', [MemberController::class, 'data'])->name('member.data');
    Route::resource('/member',MemberController::class);

    // Route::get('/produk/data', [ProductController::class, 'data'])->name('produk.data');
    // Route::resource('/produk',ProductController::class);

});
