<?php
use Illuminate\Http\Request;
use App\ProdukKeluar\ProdukKeluar;
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




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//
Route::prefix('sistem-penjualan')->group(function () {
    // index sistem penjualan
    Route::get('/', function(){
      return view('index');
    })->name('sistemPenjualan.index');

    // Produk
    Route::resource('produk', 'ProdukController');

    // Kategori
    Route::resource('kategori', 'KategoriController');

    // sistem penjualan
    Route::resource('penjualan', 'PenjualanController');

    // Produk keluar
    Route::resource('produkKeluar', 'ProdukKeluarController');

    // Satuan
    Route::resource('satuan', 'SatuanController');


});

Route::get('tanggal/tanggal/', 'ProdukKeluarController@getTanggal')->name('tanggal.tanggal');

Route::post('tanggal/tanggal/', 'ProdukKeluarController@postTanggal')->name('post.tanggal.tanggal');

//cetak Laporan PDF
Route::get('produkKeluar/cetakPdf', 'CetakPdfController@cetakPdf')->name('produkKeluar.cetakPdf');
//cetak Laporan PDF
Route::get('produkKeluar/cetakPdfTanggal', 'CetakPdfController@cetakPdfTanggal')->name('produkKeluar.cetakPdfTanggal');
