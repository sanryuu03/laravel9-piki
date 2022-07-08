<?php

use App\Http\Middleware\CekLevel;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\NewsPikiController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AgendaPikiController;
use App\Http\Controllers\HeaderPikiController;
use App\Http\Controllers\AnggotaPikiController;
use App\Http\Controllers\BackendPikiController;
use App\Http\Controllers\ProgramPikiController;
use App\Http\Controllers\SponsorPikiController;
use App\Http\Controllers\CategoryNewsController;
use App\Http\Controllers\FrontEndPikiController;
use App\Http\Controllers\SumbanganPikiController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ProfileAnggotaController;
use App\Http\Controllers\KategoriAnggotaController;
use App\Http\Controllers\HeaderPikiMobileController;
use App\Http\Controllers\DependantDropdownController;
use App\Http\Controllers\SubKategoriAnggotaController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/bersihkan', function () {
    Artisan::call('optimize');
    return response()->json('optimize');
});

Route::get('/foo', function () {
    Artisan::call('storage:link');
    return response()->json('storage');
});

Route::get('/storage', function () {
    return view('storage');
});

Route::get('/indoregion', function () {
    Artisan::call('db:seed --class=IndoRegionSeeder');
    return response()->json('indoregion');
});

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::get('/', [FrontEndPikiController::class, 'index'])->name('index');
Route::get('/admin', [BackendPikiController::class, 'index'])->middleware('auth', 'CekLevel:super-admin,admin,bendahara,organisasi,infokom,media')->name('index.admin');

Route::get('/daftar', [RegisterController::class, 'index'])->middleware('guest')->name('register');
Route::post('/daftar', [RegisterController::class, 'store'])->name('register.action');

Route::get('/login', [RegisterController::class, 'login'])->middleware('guest')->name('admin.login');
Route::post('/login', [RegisterController::class, 'authenticate'])->name('login.action');
Route::get('/logout', [RegisterController::class, 'logout'])->name('logout');
// halaman single berita
Route::get('/berita/{newsPiki:slug}', [FrontEndPikiController::class, 'news'])->name('read.more.berita');

Route::get('/categories', [CategoryNewsController::class, 'index'])->name('kategori.berita');
Route::get('/categories/{categoryNews:slug}', [CategoryNewsController::class, 'show'])->name('isi.kategori');

Route::get('/sumbanganPiki', [SumbanganPikiController::class, 'index'])->name('sumbangan.frontend');
Route::post('/sumbanganPiki', [SumbanganPikiController::class, 'store'])->name('save.form.sumbangan.frontend');

Route::get('/wilayah', [DependantDropdownController::class, 'wilayah'])->name('wilayah');
// halaman wilayah
Route::get('provinces', 'DependentDropdownController@provinces')->name('provinces');
Route::post('/cities', [DependantDropdownController::class, 'cities'])->name('cities');
Route::post('/districts', [DependantDropdownController::class, 'districts'])->name('districts');
Route::post('/villages', [DependantDropdownController::class, 'villages'])->name('villages');

// header
Route::group(['middleware' => ['CekLevel:super-admin']], function () {
    Route::get('/admin/landingpageheader', [HeaderPikiController::class, 'index'])->name('header');
    Route::post('/admin/upload/proses', [HeaderPikiController::class, 'proses_upload'])->name('upload.header');
    Route::post('/admin/upload/hapus/{id}', [HeaderPikiController::class, 'destroy'])->name('header.destroy');

    Route::post('/admin/upload/headermobile', [HeaderPikiMobileController::class, 'store'])->name('upload.header.mobile');
    Route::post('/admin/upload/headermobile/hapus/{id}', [HeaderPikiMobileController::class, 'destroy'])->name('header.mobile.destroy');
});

// berita
Route::group(['middleware' => ['CekLevel:super-admin,infokom,media']], function () {
    // slug berita
    Route::get('/admin/checkSlug', [NewsPikiController::class, 'checkSlug']);
    Route::get('/admin/editberita/checkSlug', [NewsPikiController::class, 'checkSlug']);

    Route::get('/admin/landingpageberita', [NewsPikiController::class, 'index'])->name('berita');
    Route::post('/admin/landingpageberita', [NewsPikiController::class, 'store'])->name('berita.post');
    Route::get('/admin/editberita/{id}', [NewsPikiController::class, 'edit'])->name('berita.edit');
    Route::put('/admin/updateberita/{id}', [NewsPikiController::class, 'update'])->name('berita.update');
    Route::post('/admin/landingpageberita/hapus/{id}', [NewsPikiController::class, 'destroy'])->name('berita.destroy');

    Route::get('/admin/backendkategoriberita', [CategoryNewsController::class, 'kategoriberita'])->name('backend.kategori.berita');
    Route::get('/admin/backendaddkategoriberita', [CategoryNewsController::class, 'addkategoriberita'])->name('backend.add.kategori.berita');
    Route::get('/admin/backendeditkategoriberita/checkSlug', [NewsPikiController::class, 'checkSlug']);
    Route::get('/admin/backendeditkategoriberita/{id}', [CategoryNewsController::class, 'editkategoriberita'])->name('backend.edit.kategori.berita');
    Route::post('/admin/backendaddkategoriberita', [CategoryNewsController::class, 'saveformkategoriberita'])->name('save.form.kategori.berita');
    Route::post('/admin/backendkategoriberita/hapus/{id}', [CategoryNewsController::class, 'destroy'])->name('destroy.kategori.berita');
});

// program
Route::group(['middleware' => ['CekLevel:super-admin,admin,organisasi,infokom']], function () {
    Route::get('/admin/landingpagejenisprogram', [ProgramPikiController::class, 'index'])->name('program');
    Route::post('/admin/landingpagejenisprogram', [ProgramPikiController::class, 'store'])->name('upload.program');
    Route::post('/admin/landingpagejenisprogram/hapus/{id}', [ProgramPikiController::class, 'destroy'])->name('program.destroy');
});

// agenda
Route::group(['middleware' => ['CekLevel:super-admin,admin,bendahara,organisasi,infokom,wakil-ketua']], function () {
    Route::get('/admin/landingpageagenda', [AgendaPikiController::class, 'index'])->name('agenda.index');
    Route::post('/admin/landingpageagenda', [AgendaPikiController::class, 'store'])->name('agenda.post');
    Route::get('/admin/editagenda/{id}', [AgendaPikiController::class, 'edit'])->name('agenda.edit');
    Route::put('/admin/updateagenda/{id}', [AgendaPikiController::class, 'update'])->name('agenda.update');
    Route::delete('/admin/landingpageagenda/hapus/{id}', [AgendaPikiController::class, 'destroy'])->name('agenda.destroy');
});

// anggota
Route::group(['middleware' => ['CekLevel:super-admin,organisasi']], function () {
    // print cv
    Route::get('/admin/landingpageanggota/export/{id}', [AnggotaPikiController::class, 'export'])->name('anggota.export');

    Route::match(['get','post'], '/admin/landingpageanggota/exporttable', [AnggotaPikiController::class, 'exportTable'])->name('table.export');

    Route::get('/admin/backendanggota', [AnggotaPikiController::class, 'backendanggota'])->name('backendanggota');

    Route::get('/admin/pendaftarBaru', [AnggotaPikiController::class, 'pendaftarBaru'])->name('pendaftarBaru');
    Route::get('/admin/pendaftarBaru/cv/{id}', [AnggotaPikiController::class, 'showPendaftarBaru'])->name('pendaftarBaru.cv');
    Route::get('/admin/processPendaftarBaru/cv/{id}', [AnggotaPikiController::class, 'processPendaftarBaru'])->name('process.pendaftarBaru.cv');

    Route::get('/admin/dalamProses', [AnggotaPikiController::class, 'showProses'])->name('dalamProses');
    Route::get('/admin/dalamProses/{id}', [AnggotaPikiController::class, 'showProsesUser'])->name('dalamProses.cv');
    Route::get('/admin/approvePendaftarBaru/cv/{id}', [AnggotaPikiController::class, 'approvePendaftarBaru'])->name('approve.pendaftarBaru.cv');
    Route::get('/admin/menuDalamProsesapprovePendaftarBaru/cv/{id}', [AnggotaPikiController::class, 'menuDalamProsesapprovePendaftarBaru'])->name('menu.dalam.proses.approve.pendaftarBaru.cv');

    Route::get('/admin/diTolak', [AnggotaPikiController::class, 'diTolak'])->name('diTolak');
    Route::match(['get','post'], '/admin/diTolak/{id}', [AnggotaPikiController::class, 'showUserTidakSesuai'])->name('tidakSesuai.cv');
    Route::match(['get','post'], '/admin/tidakSesuai/{id}', [AnggotaPikiController::class, 'diTolakUser'])->name('diTolak.cv');
    Route::post('/admin/menuDalamProsesdiTolakUser/{id}', [AnggotaPikiController::class, 'menuDalamProsesdiTolakUser'])->name('menu.dalam.proses.diTolak.cv');

    Route::get('/admin/landingpageanggota', [AnggotaPikiController::class, 'index'])->name('anggota.index');
    Route::get('/admin/anggota/cv/{id}', [AnggotaPikiController::class, 'show'])->name('anggota.cv');
    Route::get('/admin/landingpageanggota/edit/{id}', [AnggotaPikiController::class, 'edit'])->name('anggota.edit');
    Route::put('/admin/landingpageanggota/update/{id}', [AnggotaPikiController::class, 'update'])->name('anggota.update');
    Route::post('/admin/landingpageanggota/hapus/{id}', [AnggotaPikiController::class, 'destroy'])->name('anggota.destroy');

    Route::get('/admin/jabatanPIKISUMUT', [AnggotaPikiController::class, 'jabatanPIKISUMUT'])->name('jabatan.piki.sumut');
    Route::get('/admin/jabatanPIKISUMUT/edit/{id}', [AnggotaPikiController::class, 'editJabatanPIKISUMUT'])->name('edit.jabatan.piki.sumut');
    Route::put('/admin/jabatanPIKISUMUT/update/{id}', [AnggotaPikiController::class, 'updateJabatanPIKISUMUT'])->name('update.jabatan.piki.sumut');

    Route::get('/admin/anggotaYangDitampilkan', [AnggotaPikiController::class, 'anggotaYangDitampilkan'])->name('anggota.yang.ditampilkan');
    Route::get('/admin/pilihAnggotaYangDitampilkan', [AnggotaPikiController::class, 'pilihAnggotaYangDitampilkan'])->name('pilih.anggota.yang.ditampilkan');
    Route::post('/admin/pilihAnggotaYangDitampilkan/{id}', [AnggotaPikiController::class, 'pilihAnggotaYangDitampilkan'])->name('pilih.anggota.ini.yang.ditampilkan');
    Route::match(['get','post'], '/admin/jadikanAnggotaYangDitampilkan/{id}', [AnggotaPikiController::class, 'jadikanAnggotaYangDitampilkan'])->name('jadikan.anggota.yang.ditampilkan');

    Route::get('/admin/kategorianggota', [KategoriAnggotaController::class, 'index'])->name('kategori.anggota');
    Route::get('/admin/addkategorianggota', [KategoriAnggotaController::class, 'addKategoriAnggota'])->name('add.kategori.anggota');

    Route::get('/admin/subkategorianggota', [SubKategoriAnggotaController::class, 'index'])->name('sub.kategori.anggota');
    Route::get('/admin/addsubkategorianggota', [SubKategoriAnggotaController::class, 'addsubkategorianggota'])->name('add.sub.kategori.anggota');
});

// community partners
Route::group(['middleware' => ['CekLevel:super-admin,admin']], function () {
    Route::get('/admin/communitypartners', [SponsorPikiController::class, 'index'])->name('communitypartners');
    Route::post('/admin/communitypartners', [SponsorPikiController::class, 'store'])->name('communitypartners.post');
    Route::get('/admin/editcommunitypartners/{id}', [SponsorPikiController::class, 'edit'])->name('communitypartners.edit');
    Route::put('/admin/updatecommunitypartners/{id}', [SponsorPikiController::class, 'update'])->name('communitypartners.update');
    Route::post('/admin/communitypartners/hapus/{id}', [SponsorPikiController::class, 'destroy'])->name('communitypartners.destroy');
});

// keuangan
Route::group(['middleware' => ['CekLevel:super-admin,bendahara']], function () {
    Route::get('/admin/keuangan', [BackendPikiController::class, 'keuangan'])->name('backend.keuangan');
    Route::get('/admin/pemasukanKeuangan', [BackendPikiController::class, 'pemasukan'])->name('backend.pemasukan');

    Route::get('/admin/pemasukanIuran', [BackendPikiController::class, 'pemasukanIuran'])->name('backend.iuran');
    Route::get('/admin/pemasukanIuranDetail', [BackendPikiController::class, 'pemasukanIuranDetail'])->name('backend.iuran.detail');
    Route::get('/admin/pemasukanIuranBaru', [BackendPikiController::class, 'pemasukanIuranBaru'])->name('backend.iuran.baru');
    Route::get('/admin/pemasukanIuranDiproses', [BackendPikiController::class, 'pemasukanIuranDiproses'])->name('backend.iuran.diproses');
    Route::get('/admin/pemasukanIuranDitolak', [BackendPikiController::class, 'pemasukanIuranDitolak'])->name('backend.iuran.ditolak');
    Route::get('/admin/pemasukanIuranDiterima', [BackendPikiController::class, 'pemasukanIuranDiterima'])->name('backend.iuran.diterima');

    Route::get('/admin/pemasukanSumbangan', [BackendPikiController::class, 'pemasukanSumbangan'])->name('backend.sumbangan');
    Route::get('/admin/pemasukanSumbanganDetail', [BackendPikiController::class, 'pemasukanSumbanganDetail'])->name('backend.sumbangan.detail');
    Route::get('/admin/rekapPemasukan', [BackendPikiController::class, 'rekapPemasukan'])->name('backend.rekap.pemasukan');

    Route::get('/admin/pengeluaranKeuangan', [BackendPikiController::class, 'pengeluaran'])->name('backend.pengeluaran');
    Route::get('/admin/laporanKeuangan', [BackendPikiController::class, 'laporanKeuangan'])->name('backend.laporan.pengeluaran');
});

// login khusus anggota
Route::group(['middleware' => ['CekLevel:anggota']], function () {
    Route::get('/admin/profile/{id}', [ProfileAnggotaController::class, 'show'])->name('profile');
    Route::get('/admin/profile/edit/{id}', [ProfileAnggotaController::class, 'edit'])->name('profile.edit');
    Route::put('/admin/profile/update/{id}', [ProfileAnggotaController::class, 'update'])->name('profile.update');
});
