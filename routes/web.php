<?php

use App\Http\Controllers\Admin\PenjualanController;
use App\Http\Controllers\Admin\BeliController;
use App\Http\Controllers\Admin\SatuanController;
use App\Http\Controllers\AlamatController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\FkController;
use App\Http\Controllers\user\addToChart;
use App\Http\Controllers\user\checkoutController;
use App\Http\Controllers\user\homeController;
use App\Http\Controllers\JenjangController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\matkulController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\ThnAkademikController;
use App\Http\Controllers\Admin\StokProdukController;
use App\Http\Controllers\Admin\PemasokController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\user\ordersTracking;
use App\Http\Controllers\user\pelangganData;
use App\Http\Controllers\user\productDetail;
use App\Http\Controllers\user\ProductGrid;
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



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/inputmhs', [HomeController::class, 'formInputMhs']);
// Route::get('/penjumlahan', [HomeController::class, 'penjumlahanSum']);
// Route::get('/berita/{idBrt}', [HomeController::class, 'berita']);
// Route::get('/perkalian', [HomeController::class, 'perkalian']);
// Route::post('/kali', [HomeController::class, 'multiply']);
// Route::post('/tambah', [HomeController::class, 'sum']);
// Route::post('simpanmhs', [HomeController::class, 'simpanmhs']);
// Route::post('/add', 'App\Http\Controllers\HomeController@addBarang');
// Route::get('/barang', 'App\Http\Controllers\HomeController@tampilBarang');
// // Route::get('/inputmatkul', [HomeController::class, 'inputmatkul']);
// // Route::post('inputmatkul', [HomeController::class,'inputMatkul']);
// Route::view('/krs', 'krs');
// Route::resource('matkul', matkulController::class);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::get('/login', function () {
    return view('auth.login');
});


//GUEST
Route::get('/delcraft', [homeController::class, 'productSWiper'])->name('home');
Route::get('/delcraft/product/detail/{id_stok}', [productDetail::class, 'detail'])->name('shop.detail');
Route::get('/delcraft/product/modal/{id_stok}', [addToChart::class, 'modal'])->name('shop.modal.detail');
Route::get('/delcraft/shopgrid/{id?}', [ProductGrid::class, 'shopGrid'])->name('shop.grid');

//USER
Route::middleware(['auth', 'preventback', 'roles:user,admin'])->group(function () {

    Route::get('/cart', [addToChart::class, 'showCart'])->name('show.cart');
    Route::post('/add-to-cart/{id_stok}', [addToChart::class, 'addToCart'])->name('addProduct.to.cart');
    Route::post('/cart/update/{id_stok}', [addToChart::class, 'updateCart'])->name('update.cart');
    Route::delete('/cart/product{id_stok}', [addToChart::class, 'deleteProduct'])->name('delete.cart.product');

    Route::get('/checkout', [checkoutController::class, 'showItems'])->name('checkout.show');
    Route::post('/checkout', [checkoutController::class, 'checkoutItems'])->name('checkout.item');

    Route::get('/orders', [ordersTracking::class, 'ordersTracking'])->name('orders.view');
    Route::get('/cetakstruk/{no_bukti}', [checkoutController::class, 'cetakStruk'])->name('cetak.struk');

    Route::get('/address', [pelangganData::class, 'showAddressForm'])->name('alamat.form');
    Route::patch('/address', [pelangganData::class, 'saveAddress'])->name('simpan.alamat.patch');
    Route::post('/edit', [pelangganData::class, 'saveAddress'])->name('simpan.alamat.post');

});

//ADMIN
Route::middleware(['auth', 'preventback', 'roles:admin'])->group(function () {

    Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('penjualan/transaksi', [PenjualanController::class, 'transaksiPenjualan'])->name('admin.transaksi');
    Route::get('penjualan/laporan', [PenjualanController::class, 'laporanPenjualan'])->name('admin.laporan.penjualan');
    Route::get('penjualan/transaksi/detail/{no_bukti}', [PenjualanController::class, 'detailTransaksi'])->name('admin.transaksi.detail');
    Route::post('/update-status/{no_bukti}', [PenjualanController::class, 'updateTerima'])->name('update.status');
    Route::get('admin/laporan/penjualan/print', [PenjualanController::class, 'printPenjualan'])->name('admin.laporan.penjualan.print');


    Route::get('/beli/list', [BeliController::class, 'index'])->name('daftar.beli');
    Route::get('/beli/detail//{no_bukti}', [BeliController::class, 'detailBeli'])->name('detail.beli');
    Route::get('/beli/tambah-barang', [BeliController::class, 'create'])->name('beli.create');
    Route::post('/beli', [BeliController::class, 'store'])->name('beli.store');
    Route::delete('/beli/{id_barang}', [BeliController::class, 'delete'])->name('beli.hapus');


    Route::resource('stok', StokProdukController::class);
    Route::resource('pemasok', PemasokController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('satuan', SatuanController::class);

});

require __DIR__ . '/auth.php';


