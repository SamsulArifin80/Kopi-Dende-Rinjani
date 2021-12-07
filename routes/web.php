<?php

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

Route::get('/foo', function () {
  Artisan::call('storage:link');
});
Route::get('/link', function () {        
  $target = '/storage/app/public';
  $shortcut = '/public/storage';
  symlink($target, $shortcut);
});
Auth::routes();

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('home');

Route::get('/', 'App\Http\Controllers\HomepageController@index');
Route::get('/about', 'App\Http\Controllers\HomepageController@about');
Route::get('/kontak', 'App\Http\Controllers\HomepageController@kontak');
Route::get('/kategori', 'App\Http\Controllers\HomepageController@kategori');
Route::get('/kategori/{slug}', 'App\Http\Controllers\HomepageController@kategoribyslug');
Route::get('/produk', 'App\Http\Controllers\HomepageController@produk');
Route::get('/produk/{id}', 'App\Http\Controllers\HomepageController@produkdetail');
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('/', 'App\Http\Controllers\DashboardController@index');
    Route::resource('kategori', 'App\Http\Controllers\KategoriController');
    Route::resource('produk', 'App\Http\Controllers\ProdukController');
    Route::resource('customer', 'App\Http\Controllers\CustomerController');
    Route::resource('transaksi', 'App\Http\Controllers\TransaksiController');
    Route::get('profil', 'App\Http\Controllers\UserController@index');
    Route::get('setting', 'App\Http\Controllers\UserController@setting');
    Route::get('laporan', 'App\Http\Controllers\LaporanController@index');
    Route::get('proseslaporan', 'App\Http\Controllers\LaporanController@proses');
    Route::get('image', 'App\Http\Controllers\ImageController@index');
    Route::post('image', 'App\Http\Controllers\ImageController@store');
    Route::delete('image/{id}', 'App\Http\Controllers\ImageController@destroy');
    Route::post('imagekategori', 'App\Http\Controllers\KategoriController@uploadimage');
    Route::delete('imagekategori/{id}', 'App\Http\Controllers\KategoriController@deleteimage');
    Route::post('produkimage', 'App\Http\Controllers\ProdukController@uploadimage');
    Route::delete('produkimage/{id}', 'App\Http\Controllers\ProdukController@deleteimage');
    Route::resource('slideshow', 'App\Http\Controllers\SlideshowController');
    Route::resource('promo', 'App\Http\Controllers\ProdukPromoController');
    Route::get('loadprodukasync/{id}', 'App\Http\Controllers\ProdukController@loadasync');
    Route::resource('wishlist', 'App\Http\Controllers\WishlistController');
  });

Route::get('/home', function() {
  return redirect('/admin');
});
Route::group(['middleware' => 'auth'], function() {
  Route::resource('cart', 'App\Http\Controllers\CartController');
  Route::patch('kosongkan/{id}', 'App\Http\Controllers\CartController@kosongkan');
  Route::resource('cartdetail', 'App\Http\Controllers\CartDetailController');
  Route::resource('alamatpengiriman', 'App\Http\Controllers\AlamatPengirimanController');
  Route::get('checkout', 'App\Http\Controllers\CartController@checkout');
});