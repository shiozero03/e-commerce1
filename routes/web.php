<?php

use Illuminate\Support\Facades\Route;

// Landing Page
    use App\Http\Controllers\Homecontroller;
    use App\Http\Controllers\Authcontroller;
    use App\Http\Controllers\Profilcontroller;
    use App\Http\Controllers\Produkcontroller;
// End Landing Page

// Admin Page
    use App\Http\Controllers\Admincontrollers\Admincontrol;
    use App\Http\Controllers\Admincontrollers\Homeadmincontroller;
    use App\Http\Controllers\Admincontrollers\Usercontroller;
    use App\Http\Controllers\Admincontrollers\Produkcontrolleradmin;
    use App\Http\Controllers\Admincontrollers\Riwayatpenjualan;
    use App\Http\Controllers\Admincontrollers\Pembayarancontrol;
    use App\Http\Controllers\Admincontrollers\Tentangcontroller;
    use App\Http\Controllers\Admincontrollers;
// End Admin Page

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
// Landing Page
    Route::get('/api/user', [Admincontrollers::class, 'apiuser'])->name('api.user');
    Route::get('/', [Homecontroller::class, 'index'])->name('home');
    Route::get('/bantuan', [Homecontroller::class, 'bantuan'])->name('bantuan');
    Route::get('/profil', [Profilcontroller::class, 'index'])->name('profil');
    Route::get('/produk', [Produkcontroller::class, 'index'])->name('produk');
    Route::post('/produk/search', [Produkcontroller::class, 'search'])->name('produksearch');
    Route::get('/produk/filter/{filter}', [Produkcontroller::class, 'filter'])->name('produk_filter');
    Route::get('/produk/show/{show}', [Produkcontroller::class, 'show'])->name('produk_show');
    Route::get('/keranjang', [Produkcontroller::class, 'keranjang'])->name('keranjang');
    Route::post('/keranjang/add', [Produkcontroller::class, 'storekeranjang'])->name('tambahkeranjang');
    Route::get('/keranjang/view/{id}', [Produkcontroller::class, 'viewkeranjang'])->name('keranjang_view');
    Route::get('/keranjang/bayar/{id}', [Produkcontroller::class, 'bayarkeranjang'])->name('keranjang_bayar');
    Route::post('/keranjang/bayar/cek', [Produkcontroller::class, 'bayarkeranjangpost'])->name('bayarkeranjang');
    Route::post('/keranjang/Checkout', [Produkcontroller::class, 'Checkoutkeranjang'])->name('Checkoutkeranjang');
    Route::get('/keranjang/delete/{id}', [Produkcontroller::class, 'deletekeranjang'])->name('deletekeranjang');
    Route::get('/keranjang/diterima/{id}', [Produkcontroller::class, 'terimakeranjang'])->name('terimakeranjang');
    Route::post('/keranjang/nilai/like', [Produkcontroller::class, 'likekeranjang'])->name('likekeranjang');
    Route::post('/keranjang/nilai/dislike', [Produkcontroller::class, 'dislikekeranjang'])->name('dislikekeranjang');
    Route::get('/riwayat', [Produkcontroller::class, 'riwayat'])->name('riwayat');
    Route::get('/profil/view', [Profilcontroller::class, 'viewprofil'])->name('viewprofil');
    Route::post('/profil/update', [Profilcontroller::class, 'updateprofil'])->name('updateprofil');

    Route::get('/masuk', [Authcontroller::class, 'login'])->name('masuk');
    Route::post('/masuk/proses', [Authcontroller::class, 'proses_login'])->name('prosesmasuk');

    Route::get('/daftar', [Authcontroller::class, 'register'])->name('daftar');
    Route::post('/daftar/proses', [Authcontroller::class, 'proses_register'])->name('prosesdaftar');

    Route::get('/lupa-password', [Authcontroller::class, 'lupapassword'])->name('lupa-password');
    Route::post('/lupapassword/proses', [Authcontroller::class, 'proses_lupapassword'])->name('proseslupapassword');

    Route::get('/ganti-password/{email}', [Authcontroller::class, 'gantipassword'])->name('ganti-password');
    Route::post('/gantipassword/proses', [Authcontroller::class, 'proses_gantipassword'])->name('prosesgantipassword');

    Route::get('/logout', [Authcontroller::class, 'logout'])->name('logout');
// End Landing Page
// Admin Page
    Route::get('/admin/dashboard', [Admincontrol::class, 'dashboard'])->name('dashboard');
    Route::get('/admin/home', [Admincontrol::class, 'home'])->name('kelolahome');
    Route::get('/admin/produk', [Admincontrol::class, 'produk'])->name('kelolaproduk');
    Route::get('/admin/checkout', [Admincontrol::class, 'checkout'])->name('kelolacheckout');
    Route::get('/admin/riwayatpenjualan', [Riwayatpenjualan::class, 'index'])->name('riwayatpenjualan');
    Route::get('/admin/pembayaran', [Admincontrol::class, 'pembayaran'])->name('metodebayar');
    Route::get('/admin/tentang', [Admincontrol::class, 'tentang'])->name('kelolatentang');

    Route::get('/admin/checkout/dibatalkan/{id}', [Riwayatpenjualan::class, 'batalkan'])->name('batalkanpenjualan');
    Route::post('/admin/checkout/diterima', [Riwayatpenjualan::class, 'terima'])->name('terimapenjualan');
    Route::get('/admin/checkout/kemas/{id}', [Riwayatpenjualan::class, 'kemas'])->name('kemaspenjualan');

    Route::get('/admin/user', [Admincontrol::class, 'user'])->name('kelolauser');

    Route::post('/admin/home/tambah', [Homeadmincontroller::class, 'store'])->name('tambahhome');
    Route::post('/admin/user/tambah', [Usercontroller::class, 'store'])->name('tambahuser');
    Route::post('/admin/produk/tambah/kategori', [Produkcontrolleradmin::class, 'storekategori'])->name('tambahkategori');
    Route::post('/admin/produk/tambah', [Produkcontrolleradmin::class, 'storeproduk'])->name('tambahproduk');
    Route::post('/admin/pembayaran/tambah', [Pembayarancontrol::class, 'store'])->name('tambahpembayaran');

    Route::get('/admin/home/delete/{id}', [Homeadmincontroller::class, 'deletedata'])->name('deletehome');
    Route::get('/admin/user/delete/{id}', [Usercontroller::class, 'delete'])->name('deleteuser');
    Route::get('/admin/produk/delete/kategori/{id}', [Produkcontrolleradmin::class, 'deletekategori'])->name('deletekategori');
    Route::get('/admin/produk/delete/{id}', [Produkcontrolleradmin::class, 'deleteproduk'])->name('deleteproduk');
    Route::get('/admin/pembayaran/delete/{id}', [Pembayarancontrol::class, 'delete'])->name('deletepembayaran');

    Route::post('/admin/tentang/update', [Tentangcontroller::class, 'update'])->name('updatetentang');
    Route::post('/admin/produk/update', [Produkcontrolleradmin::class, 'updateproduk'])->name('updateproduk');
    Route::get('/admin/produk/edit/{id}', [Produkcontrolleradmin::class, 'editproduk'])->name('editproduk');

    Route::get('/admin/produk/view/{id}', [Produkcontrolleradmin::class, 'viewproduk'])->name('viewproduk');
// End Admin Page