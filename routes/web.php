<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisCustomerController;
use App\Http\Controllers\LayananAnalisaController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\LayananSewaController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\PengaturanUserController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\TransaksiController;
use App\Http\Livewire\MultiStepLayanan;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;

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


Route::middleware('only_sign_in')->group(function () {
    // Route::get('/', function () {
    //     return view('welcome');
    // });
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/', [AuthController::class, 'authenticating']);

    Route::get('register', [AuthController::class, 'register']);
    Route::post('register', [AuthController::class, 'registerProses']);

    Route::get('forgot', [AuthController::class, 'forgot']);

    // Route::get('verify', [AuthController::class, 'verify']);

    // Route::get('verify/{token}', [AuthController::class, 'sendVerificationEmail']);
});

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('layanan');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('admin/beranda', [DashboardController::class, 'index'])->middleware('only_admin')->name('beranda');
    Route::post('admin/beranda', [DashboardController::class, 'index'])->middleware('only_admin')->name('beranda-search');

    Route::get('admin/transaksi', [TransaksiController::class, 'index'])->middleware('only_admin')->name('transaksi');
    Route::get('admin/transaksi/{id}', [TransaksiController::class, 'edit'])->middleware('only_admin')->name('transaksi-detail');
    Route::put('admin/transaksi/{id}', [TransaksiController::class, 'update'])->middleware('only_admin')->name('transaksi-status');
    Route::get('admin/transaksi/pembayaran/{id}', [TransaksiController::class, 'show'])->middleware('only_admin')->name('transaksi-pembayaran');
    Route::put('admin/transaksi/pembayaran/{id}', [TransaksiController::class, 'updateStatusPembayaran'])->middleware('only_admin')->name('transaksi-status-pembayaran');

    Route::get('admin/transaksi/download-bukti/{id}', [TransaksiController::class, 'downloadBuktiBayar'])->name('download.bukti');

    Route::get('admin/layanan-analisa', [LayananAnalisaController::class, 'index'])->middleware('only_admin')->name('layanan-analisa');
    Route::get('admin/layanan-analisa-add', [LayananAnalisaController::class, 'create'])->middleware('only_admin')->name('layanan-analisa-create');
    Route::post('admin/layanan-analisa-add', [LayananAnalisaController::class, 'store'])->middleware('only_admin')->name('layanan-analisa-store');
    Route::get('admin/layanan-analisa-edit/{id}', [LayananAnalisaController::class, 'edit'])->middleware('only_admin')->name('layanan-analisa-edit');
    Route::put('admin/layanan-analisa-edit/{id}', [LayananAnalisaController::class, 'update'])->middleware('only_admin')->name('layanan-analisa-update');
    Route::get('admin/layanan-analisa/{id}', [LayananAnalisaController::class, 'destroy'])->middleware('only_admin')->name('layanan-analisa-destroy');

    Route::get('admin/layanan-sewa', [LayananSewaController::class, 'index'])->middleware('only_admin')->name('layanan-sewa');
    Route::get('admin/layanan-sewa-add', [LayananSewaController::class, 'create'])->middleware('only_admin')->name('layanan-sewa-create');
    Route::post('admin/layanan-sewa-add', [LayananSewaController::class, 'store'])->middleware('only_admin')->name('layanan-sewa-store');
    Route::get('admin/layanan-sewa-edit/{id}', [LayananSewaController::class, 'edit'])->middleware('only_admin')->name('layanan-sewa-edit');
    Route::put('admin/layanan-sewa-edit/{id}', [LayananSewaController::class, 'update'])->middleware('only_admin')->name('layanan-sewa-update');
    Route::get('admin/layanan-sewa/{id}', [LayananSewaController::class, 'destroy'])->middleware('only_admin')->name('layanan-sewa-destroy');

    Route::get('admin/customer', [JenisCustomerController::class, 'index'])->middleware('only_admin')->name('customer');
    Route::get('admin/customer-add', [JenisCustomerController::class, 'create'])->middleware('only_admin')->name('customer-create');
    Route::post('admin/customer-add', [JenisCustomerController::class, 'store'])->middleware('only_admin')->name('customer-store');
    Route::get('admin/customer-edit/{id}', [JenisCustomerController::class, 'edit'])->middleware('only_admin')->name('customer-edit');
    Route::put('admin/customer-edit/{id}', [JenisCustomerController::class, 'update'])->middleware('only_admin')->name('customer-update');
    Route::get('admin/customer/{id}', [JenisCustomerController::class, 'destroy'])->middleware('only_admin')->name('customer-destroy');

    Route::get('admin/pengaturan', [PengaturanController::class, 'index'])->middleware('only_admin')->name('pengaturan');
    Route::put('admin/pengaturan', [PengaturanController::class, 'update'])->middleware('only_admin')->name('pengaturan-update');

    Route::get('layanan', [LayananController::class, 'index'])->middleware('only_user')->name('layanan');
    Route::get('layanan/input-sampel/{id}', [LayananController::class, 'create'])->middleware('only_user')->name('layanan.input-sampel');
    Route::get('layanan/cek-transaksi', [LayananController::class, 'show'])->middleware('only_user')->name('layanan.cek');
    Route::post('layanan/cek-transaksi', [LayananController::class, 'store'])->middleware('only_user')->name('layanan.store');
    Route::get('layanan/pembayaran/{id}', [LayananController::class, 'edit'])->middleware('only_user')->name('layanan.pembayaran');
    Route::put('layanan/pembayaran/{id}', [LayananController::class, 'update'])->middleware('only_user')->name('layanan.bayar');

    Route::get('riwayat', [RiwayatController::class, 'index'])->middleware('only_user')->name('riwayat');
    Route::get('riwayat/{id}', [RiwayatController::class, 'show'])->middleware('only_user')->name('riwayat-status');
    Route::get('riwayat/pembayaran/{id}', [RiwayatController::class, 'edit'])->middleware('only_user')->name('riwayat-pembayaran');
    Route::get('riwayat/hasil/{id}', [RiwayatController::class, 'hasil'])->middleware('only_user')->name('riwayat-hasil');
    Route::put('riwayat/hasil/pelunasan/{id}', [RiwayatController::class, 'update'])->middleware('only_user')->name('riwayat-pelunasan');

    Route::get('riwayat/hasil/download-hasil/{id}', [RiwayatController::class, 'downloadHasilAnalisis'])->middleware('only_user')->name('riwayat-hasil-analisis');
    Route::get('riwayat/hasil/download-sertifikat/{id}', [RiwayatController::class, 'downloadSertifikat'])->middleware('only_user')->name('riwayat-sertifikat');

    Route::get('pengaturan', [PengaturanUserController::class, 'index'])->middleware('only_user')->name('pengaturanUser');
    Route::put('pengaturan', [PengaturanUserController::class, 'update'])->middleware('only_user')->name('pengaturanUser-update');
    // Route::put('pengaturan', [PengaturanUserController::class, 'changepassword'])->middleware('only_user')->name('pengaturanUser-update');
});

Route::get('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
