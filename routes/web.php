<?php

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

/*
| Daftar Route Pada Menu member
| Tidak Perlu menambahkan '/member' lagi pad url route
 */
// Route::group(['prefix' => 'member'], function () {
//     Route::get('/', [\App\Http\Controllers\MemberController::class, 'index']);
//     Route::post('/', [\App\Http\Controllers\MemberController::class, 'store']);
//     Route::post('/update', [\App\Http\Controllers\MemberController::class, 'update']);
//     Route::get('/{id}/delete', [\App\Http\Controllers\MemberController::class, 'destroy']);
// });

/*
| Daftar Route Pada Menu Produk
| Tidak Perlu menambahkan '/produk' lagi pad url route
 */
Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index']);

Route::group(['prefix' => 'master-data', 'as' => 'master-data.'], function () {
    Route::resource('/akun-bank', \App\Http\Controllers\MasterData\AkunBankController::class, ['names' => 'akun-bank']);
    Route::resource('/barang', \App\Http\Controllers\MasterData\BarangController::class, ['names' => 'barang']);
    Route::resource('/kategori', \App\Http\Controllers\MasterData\KategoriController::class, ['names' => 'kategori']);
    Route::resource('/member-status', \App\Http\Controllers\MasterData\MemberstatusController::class, ['names' => 'member-status']);
    Route::resource('/pdam-alterra', \App\Http\Controllers\MasterData\AlteraPdamController::class, ['names' => 'pdam-alterra']);
    Route::resource('/produk', \App\Http\Controllers\MasterData\ProdukController::class, ['names' => 'produk']);
    Route::resource('/kategori-provider', \App\Http\Controllers\MasterData\KategoriProviderController::class, ['names' => 'kategori-provider']);
    Route::resource('/provider', \App\Http\Controllers\MasterData\ProviderController::class, ['names' => 'provider']);
    Route::resource('setting', \App\Http\Controllers\MasterData\SettingController::class, ['names' => 'setting']);
    Route::resource('setting-point', \App\Http\Controllers\MasterData\SettingPointController::class, ['names' => 'setting-point']);
    Route::resource('sub-kategori', \App\Http\Controllers\MasterData\SubKategoriController::class, ['names' => 'sub-kategori']);
    Route::resource('setting-margin', \App\Http\Controllers\MasterData\SettingMarginController::class, ['names' => 'setting-margin']);
    Route::resource('setting-point', \App\Http\Controllers\MasterData\SettingPointController::class, ['names' => 'setting-point']);
    Route::resource('sub-kategori-provider', \App\Http\Controllers\MasterData\SubKategoriProviderController::class, ['names' => 'sub-kategori-provider']);
    Route::resource('disable-transaksi', \App\Http\Controllers\MasterData\DisableTransaksiController::class, ['names' => 'disable-transaksi']);
});

// Route::group(['prefix' => 'manage-member'], function () {
//     Route::get('/banned-member', [\App\Http\Controllers\BannedMemberController::class, 'index']);
//     Route::get('/banned-member/{id}/delete', [\App\Http\Controllers\BannedMemberController::class, 'destroy']);
//     Route::get('/kyc-member', [\App\Http\Controllers\KYCMemberController::class, 'index']);

//     Route::get('/member-status', [\App\Http\Controllers\MemberStatusActiveController::class, 'index']);

//     Route::group(['prefix' => 'member'], function () {
//         Route::get('/', [\App\Http\Controllers\MemberController::class, 'index']);
//         Route::post('/', [\App\Http\Controllers\MemberController::class, 'store']);
//         Route::post('/update', [\App\Http\Controllers\MemberController::class, 'update']);
//         Route::post('/ganti-password', [\App\Http\Controllers\MemberController::class, 'ganti_password']);
//         Route::post('/tambah-saldo', [\App\Http\Controllers\MemberController::class, 'tambah_saldo']);
//         Route::get('/{id}/delete', [\App\Http\Controllers\MemberController::class, 'destroy']);

//     });
// });

// Route::get('/flash-sale', [\App\Http\Controllers\FlashSaleController::class, 'index']);
// Route::post('/flash-sale', [\App\Http\Controllers\FlashSaleController::class, 'store']);
// Route::post('/flash-sale/update/{id}', [\App\Http\Controllers\FlashSaleController::class, 'update']);
// Route::get('/flash-sale/{id}/delete', [\App\Http\Controllers\FlashSaleController::class, 'destroy']);

// Route::get('/produk-member-status', [\App\Http\Controllers\ProdukMemberStatusController::class, 'index']);
// Route::post('/produk-member-status', [\App\Http\Controllers\ProdukMemberStatusController::class, 'store']);
// Route::post('/produk-member-status/update/{id}', [\App\Http\Controllers\ProdukMemberStatusController::class, 'update']);
// Route::get('/produk-member-status/{id}/delete', [\App\Http\Controllers\ProdukMemberStatusController::class, 'destroy']);

// Route::get('/poin', [\App\Http\Controllers\PoinController::class, 'index']);
// Route::get('/poin/members', [\App\Http\Controllers\PoinController::class, 'members']);
// Route::get('/poin/json', [\App\Http\Controllers\PoinController::class, 'json']);
// Route::post('/poin', [\App\Http\Controllers\PoinController::class, 'store']);

// Route::get('/transaksi-realtime', [\App\Http\Controllers\TransaksiRealtimeController::class, 'index']);
// Route::get('/transaksi-realtime/new-data', [\App\Http\Controllers\TransaksiRealtimeController::class, 'new_data']);

// Route::get('/image-member-status', [\App\Http\Controllers\ImageMemberStatusController::class, 'index']);

// Route::post('/image-member-status', [\App\Http\Controllers\ImageMemberStatusController::class, 'store']);
// Route::post('/image-member-status/update/{id}', [\App\Http\Controllers\ImageMemberStatusController::class, 'update']);
// Route::get('/image-member-status/{id}/delete', [\App\Http\Controllers\ImageMemberStatusController::class, 'destroy']);

// Route::get('/test-pusher', function(){
//     $response = \App\Http\Helpers\Helperku::kirimPusher();

//     return $response;
// });

// Route::group(['prefix' => 'profile'], function (){
//     Route::get('/', [\App\Http\Controllers\ProfileController::class, 'index']);
//     Route::post('/update/{id}', [\App\Http\Controllers\ProfileController::class, 'update']);
// });
// Route::group(['prefix' => 'ganti-password'], function (){
//     Route::get('/', [\App\Http\Controllers\GantiPasswordController::class, 'index']);
//     Route::post('/update', [\App\Http\Controllers\GantiPasswordController::class, 'update']);
// });
