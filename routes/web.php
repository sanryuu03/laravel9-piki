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
use App\Http\Controllers\DataBankIuranController;
use App\Http\Controllers\SumbanganPikiController;
use App\Http\Controllers\DataBiayaIuranController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ProfileAnggotaController;
use App\Http\Controllers\KategoriAnggotaController;
use App\Http\Controllers\HeaderPikiMobileController;
use App\Http\Controllers\PengeluaranRutinController;
use App\Http\Controllers\DependantDropdownController;
use App\Http\Controllers\NamaKegiatanController;
use App\Http\Controllers\PosAnggaranController;
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

Route::post('/posAnggaran', [PosAnggaranController::class, 'posAnggaran']);

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

    Route::match(['get', 'post'], '/admin/landingpageanggota/exporttable', [AnggotaPikiController::class, 'exportTable'])->name('table.export');

    Route::get('/admin/backendanggota', [AnggotaPikiController::class, 'backendanggota'])->name('backendanggota');

    Route::get('/admin/pendaftarBaru', [AnggotaPikiController::class, 'pendaftarBaru'])->name('pendaftarBaru');
    Route::get('/admin/pendaftarBaru/cv/{id}', [AnggotaPikiController::class, 'showPendaftarBaru'])->name('pendaftarBaru.cv');
    Route::get('/admin/processPendaftarBaru/cv/{id}', [AnggotaPikiController::class, 'processPendaftarBaru'])->name('process.pendaftarBaru.cv');

    Route::get('/admin/dalamProses', [AnggotaPikiController::class, 'showProses'])->name('dalamProses');
    Route::get('/admin/dalamProses/{id}', [AnggotaPikiController::class, 'showProsesUser'])->name('dalamProses.cv');
    Route::get('/admin/approvePendaftarBaru/cv/{id}', [AnggotaPikiController::class, 'approvePendaftarBaru'])->name('approve.pendaftarBaru.cv');
    Route::get('/admin/menuDalamProsesapprovePendaftarBaru/cv/{id}', [AnggotaPikiController::class, 'menuDalamProsesapprovePendaftarBaru'])->name('menu.dalam.proses.approve.pendaftarBaru.cv');

    Route::get('/admin/diTolak', [AnggotaPikiController::class, 'diTolak'])->name('diTolak');
    Route::match(['get', 'post'], '/admin/diTolak/{id}', [AnggotaPikiController::class, 'showUserTidakSesuai'])->name('tidakSesuai.cv');
    Route::match(['get', 'post'], '/admin/tidakSesuai/{id}', [AnggotaPikiController::class, 'diTolakUser'])->name('diTolak.cv');
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
    Route::match(['get', 'post'], '/admin/jadikanAnggotaYangDitampilkan/{id}', [AnggotaPikiController::class, 'jadikanAnggotaYangDitampilkan'])->name('jadikan.anggota.yang.ditampilkan');

    Route::get('/admin/kategorianggota', [KategoriAnggotaController::class, 'index'])->name('kategori.anggota');
    Route::get('/admin/addkategorianggota', [KategoriAnggotaController::class, 'addKategoriAnggota'])->name('add.kategori.anggota');
    Route::get('/admin/editkategorianggota/{id}', [KategoriAnggotaController::class, 'edit'])->name('edit.kategori.anggota');
    Route::match(['get', 'post'], '/admin/saveFormKategoriAnggota', [KategoriAnggotaController::class, 'saveFormKategoriAnggota'])->name('backend.save.form.kategori.anggota');
    Route::match(['get', 'post'], '/admin/destroyKategoriAnggota/{id}', [KategoriAnggotaController::class, 'destroy'])->name('backend.kategori.anggota.destroy');

    Route::get('/admin/subkategorianggota', [SubKategoriAnggotaController::class, 'index'])->name('sub.kategori.anggota');
    Route::get('/admin/addsubkategorianggota', [SubKategoriAnggotaController::class, 'show'])->name('add.sub.kategori.anggota');
    Route::match(['get', 'post'], '/admin/saveformsubkategorianggota', [SubKategoriAnggotaController::class, 'saveFormSubKategoriAnggota'])->name('backend.save.form.sub.kategori.anggota');
    Route::match(['get', 'post'], '/admin/destroysubkategorianggota/{id}', [SubKategoriAnggotaController::class, 'destroy'])->name('destroy.sub.kategori.anggota');
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
Route::group(['middleware' => ['CekLevel:super-admin,bendahara,spi']], function () {
    Route::get('/admin/keuangan', [BackendPikiController::class, 'keuangan'])->name('backend.keuangan');
    Route::get('/admin/pemasukanKeuangan', [BackendPikiController::class, 'pemasukan'])->name('backend.pemasukan');

    Route::get('/admin/DataIuran', [DataBankIuranController::class, 'index'])->name('backend.data.iuran');
    Route::match(['get', 'post'], '/admin/formAddDataIuran', [DataBankIuranController::class, 'show'])->name('backend.form.add.data.iuran');
    Route::match(['get', 'post'], '/admin/formEditDataIuran/{id}', [DataBankIuranController::class, 'edit'])->name('backend.form.edit.data.iuran');
    Route::match(['get', 'post'], '/admin/saveFormDataIuran', [DataBankIuranController::class, 'saveFormDataIuran'])->name('save.form.data.rekening.iuran');
    Route::match(['get', 'post'], '/admin/destroyDataBankIuran/{id}', [DataBankIuranController::class, 'destroy'])->name('destroy.data.rekening.iuran');

    Route::get('/admin/dataBiayaIuran', [DataBiayaIuranController::class, 'index'])->name('backend.data.biaya.iuran');
    Route::match(['get', 'post'], '/admin/formAddDataBiayaIuran', [DataBiayaIuranController::class, 'show'])->name('backend.form.add.data.biaya.iuran');
    Route::match(['get', 'post'], '/admin/formEditDataBiayaIuran/{id}', [DataBiayaIuranController::class, 'edit'])->name('backend.form.edit.data.biaya.iuran');
    Route::match(['get', 'post'], '/admin/saveFormDataBiayaIuran', [DataBiayaIuranController::class, 'saveFormDataBiayaIuran'])->name('backend.save.form.edit.data.biaya.iuran');
    Route::match(['get', 'post'], '/admin/destroyDataBiayaIuran/{id}', [DataBiayaIuranController::class, 'destroy'])->name('backend.destroy.data.biaya.iuran');

    Route::get('/admin/pemasukanIuran', [BackendPikiController::class, 'pemasukanIuran'])->name('backend.iuran');
    Route::get('/admin/pemasukanIuranDetailViaBendahara/{id}', [BackendPikiController::class, 'pemasukanIuranDetailViaBendahara'])->name('backend.iuran.detail.via.bendahara');
    Route::get('/admin/pemasukanIuranDetailViaKetua/{id}', [BackendPikiController::class, 'pemasukanIuranDetailViaKetua'])->name('backend.iuran.detail.via.ketua');
    Route::get('/admin/pemasukanIuranDetailViaSPi.blade/{id}', [BackendPikiController::class, 'pemasukanIuranDetailViaSPi'])->name('backend.iuran.detail.via.spi');

    Route::get('/admin/pemasukanIuranBaru', [BackendPikiController::class, 'pemasukanIuranBaru'])->name('backend.iuran.baru');
    Route::get('/admin/pemasukanIuranDiproses', [BackendPikiController::class, 'pemasukanIuranDiproses'])->name('backend.iuran.diproses');
    Route::match(['get', 'post'], '/admin/pemasukanIuranDitolak/{id}', [BackendPikiController::class, 'postPemasukanIuranDitolak'])->name('backend.post.iuran.ditolak');
    Route::get('/admin/pemasukanIuranDitolak', [BackendPikiController::class, 'pemasukanIuranDitolak'])->name('backend.iuran.ditolak');
    Route::match(['get', 'post'], '/admin/pemasukanIuranDiterima/{id}', [BackendPikiController::class, 'postPemasukanIuranDiterima'])->name('backend.post.iuran.diterima');
    Route::match(['get', 'post'], '/admin/pemasukanIuranDiverifikasiBendahara/{id}', [BackendPikiController::class, 'postPemasukanIuranDiverifikasiBendahara'])->name('backend.post.iuran.diverifikasi.bendahara');

    Route::match(['get', 'post'], '/admin/pemasukanIuranDiverifikasiBendaharaViaForm/{id}', [BackendPikiController::class, 'postPemasukanIuranDiverifikasiBendaharaViaForm'])->name('backend.post.iuran.diverifikasi.bendahara.via.form');
    Route::match(['get', 'post'], '/admin/pemasukanIuranDiverifikasiKetuaViaForm/{id}', [BackendPikiController::class, 'pemasukanIuranDiverifikasiKetuaViaForm'])->name('backend.post.iuran.diverifikasi.ketua.via.form');
    Route::match(['get', 'post'], '/admin/pemasukanIuranDiverifikasiSpiViaForm/{id}', [BackendPikiController::class, 'pemasukanIuranDiverifikasiSpiViaForm'])->name('backend.post.iuran.diverifikasi.spi.via.form');

    Route::match(['get', 'post'], '/admin/pemasukanIuranDiverifikasiKetua/{id}', [BackendPikiController::class, 'postPemasukanIuranDiverifikasiKetua'])->name('backend.post.iuran.diverifikasi.ketua');
    Route::match(['get', 'post'], '/admin/pemasukanIuranDiverifikasiSpi/{id}', [BackendPikiController::class, 'postPemasukanIuranDiverifikasiSpi'])->name('backend.post.iuran.diverifikasi.spi');
    Route::get('/admin/pemasukanIuranDiterima', [BackendPikiController::class, 'pemasukanIuranDiterima'])->name('backend.iuran.diterima');
    Route::match(['get', 'post'], '/admin/pemasukanIuranDestroy/{id}', [BackendPikiController::class, 'postPemasukanIuranDestroy'])->name('backend.post.iuran.destroy');

    Route::get('/admin/pemasukanSumbangan', [BackendPikiController::class, 'pemasukanSumbangan'])->name('backend.sumbangan');
    Route::get('/admin/pemasukanSumbanganDetail', [BackendPikiController::class, 'pemasukanSumbanganDetail'])->name('backend.sumbangan.detail');
    Route::get('/admin/pemasukanSumbanganBaru', [BackendPikiController::class, 'pemasukanSumbanganBaru'])->name('backend.sumbangan.baru');
    Route::get('/admin/pemasukanSumbanganDiproses', [BackendPikiController::class, 'pemasukanSumbanganDiproses'])->name('backend.sumbangan.diproses');
    Route::get('/admin/pemasukanSumbanganDitolak', [BackendPikiController::class, 'pemasukanSumbanganDitolak'])->name('backend.sumbangan.ditolak');
    Route::get('/admin/pemasukanSumbanganDiterima', [BackendPikiController::class, 'pemasukanSumbanganDiterima'])->name('backend.sumbangan.diterima');

    Route::get('/admin/pemasukanSumbanganViaBendahara/{id}', [SumbanganPikiController::class, 'pemasukanSumbanganViaBendahara'])->name('backend.sumbangan.detail.via.bendahara');
    Route::match(['get', 'post'], '/admin/pemasukanSumbanganDiverifikasiBendahara/{id}', [SumbanganPikiController::class, 'postPemasukanSumbanganDiverifikasiBendahara'])->name('backend.post.sumbangan.diverifikasi.bendahara');
    Route::match(['get', 'post'], '/admin/pemasukanSumbanganDiverifikasiBendaharaViaForm/{id}', [SumbanganPikiController::class, 'postPemasukanSumbanganDiverifikasiBendaharaViaForm'])->name('backend.post.sumbangan.diverifikasi.bendahara.via.form');

    Route::get('/admin/pemasukanSumbanganViaKetua/{id}', [SumbanganPikiController::class, 'pemasukanSumbanganViaKetua'])->name('backend.sumbangan.detail.via.ketua');
    Route::match(['get', 'post'], '/admin/pemasukanSumbanganDiverifikasiKetua/{id}', [SumbanganPikiController::class, 'postPemasukanSumbanganDiverifikasiKetua'])->name('backend.post.sumbangan.diverifikasi.ketua');
    Route::match(['get', 'post'], '/admin/pemasukanSumbanganDiverifikasiKetuaViaForm/{id}', [SumbanganPikiController::class, 'postPemasukanSumbanganDiverifikasiKetuaViaForm'])->name('backend.post.sumbangan.diverifikasi.ketua.via.form');

    Route::get('/admin/pemasukanSumbanganViaSpi/{id}', [SumbanganPikiController::class, 'pemasukanSumbanganViaSpi'])->name('backend.sumbangan.detail.via.spi');
    Route::match(['get', 'post'], '/admin/pemasukanSumbanganDiverifikasiSpi/{id}', [SumbanganPikiController::class, 'postPemasukanSumbanganDiverifikasiSpi'])->name('backend.post.sumbangan.diverifikasi.spi');
    Route::match(['get', 'post'], '/admin/pemasukanSumbanganDiverifikasiSpiViaForm/{id}', [SumbanganPikiController::class, 'postPemasukanSumbanganDiverifikasiSpiViaForm'])->name('backend.post.sumbangan.diverifikasi.spi.via.form');

    Route::match(['get', 'post'], '/admin/pemasukanSumbanganDitolak/{id}', [SumbanganPikiController::class, 'postPemasukanSumbanganDitolak'])->name('backend.post.sumbangan.ditolak');
    Route::match(['get', 'post'], '/admin/pemasukanSumbanganDestroy/{id}', [SumbanganPikiController::class, 'postPemasukanSumbanganDestroy'])->name('backend.post.sumbangan.destroy');

    Route::get('/admin/pengeluaranRutin', [PengeluaranRutinController::class, 'index'])->name('backend.pengeluaran.rutin');
    Route::get('/admin/formAddPengeluaranRutin', [PengeluaranRutinController::class, 'formAddPengeluaranRutin'])->name('backend.form.add.pengeluaran.rutin');
    Route::get('/admin/formEditPengeluaranRutin/{id}', [PengeluaranRutinController::class, 'formEditPengeluaranRutin'])->name('backend.form.edit.pengeluaran.rutin');
    Route::match(['get', 'post'],'/admin/saveFormPengeluaranRutin', [PengeluaranRutinController::class, 'saveFormPengeluaranRutin'])->name('backend.save.form.pengeluaran.rutin');
    Route::get('/admin/pengeluaranRutinBaru', [PengeluaranRutinController::class, 'pengeluaranRutinBaru'])->name('backend.pengeluaran.rutin.baru');
    Route::get('/admin/pengeluaranRutinDiproses', [PengeluaranRutinController::class, 'pengeluaranRutinDiproses'])->name('backend.pengeluaran.rutin.diproses');
    Route::get('/admin/pengeluaranRutinDitolak', [PengeluaranRutinController::class, 'pengeluaranRutinDitolak'])->name('backend.pengeluaran.rutin.ditolak');
    Route::get('/admin/pengeluaranRutinDiterima', [PengeluaranRutinController::class, 'pengeluaranRutinDiterima'])->name('backend.pengeluaran.rutin.diterima');

    Route::get('/admin/formPengeluaranRutinViaBendahara/{id}', [PengeluaranRutinController::class, 'formPengeluaranRutinViaBendahara'])->name('backend.form.pengeluaran.rutin.via.bendahara');
    Route::match(['get', 'post'],'/admin/postPengeluaranRutinViaBendahara/{id}', [PengeluaranRutinController::class, 'postPengeluaranRutinViaBendahara'])->name('backend.post.pengeluaran.rutin.diverifikasi.bendahara');
    Route::match(['get', 'post'],'/admin/postPengeluaranRutinViaBendaharaViaForm/{id}', [PengeluaranRutinController::class, 'postPengeluaranRutinViaBendaharaViaForm'])->name('backend.post.pengeluaran.rutin.diverifikasi.bendahara.via.form');

    Route::get('/admin/formPengeluaranRutinViaKetua/{id}', [PengeluaranRutinController::class, 'formPengeluaranRutinViaKetua'])->name('backend.form.pengeluaran.rutin.via.ketua');
    Route::match(['get', 'post'],'/admin/postPengeluaranRutinViaKetua/{id}', [PengeluaranRutinController::class, 'postPengeluaranRutinViaKetua'])->name('backend.post.pengeluaran.rutin.diverifikasi.ketua');
    Route::match(['get', 'post'],'/admin/postPengeluaranRutinViaKetuaViaForm/{id}', [PengeluaranRutinController::class, 'postPengeluaranRutinViaKetuaViaForm'])->name('backend.post.pengeluaran.rutin.diverifikasi.ketua.via.form');

    Route::get('/admin/formPengeluaranRutinViaSpi/{id}', [PengeluaranRutinController::class, 'formPengeluaranRutinViaSpi'])->name('backend.form.pengeluaran.rutin.via.spi');
    Route::match(['get', 'post'],'/admin/postPengeluaranRutinViaSpi/{id}', [PengeluaranRutinController::class, 'postPengeluaranRutinViaSpi'])->name('backend.post.pengeluaran.rutin.diverifikasi.spi');
    Route::match(['get', 'post'],'/admin/postPengeluaranRutinViaSpiViaForm/{id}', [PengeluaranRutinController::class, 'postPengeluaranRutinViaSpiViaForm'])->name('backend.post.pengeluaran.rutin.diverifikasi.spi.via.form');

    Route::match(['get', 'post'], '/admin/pengeluaranRutinDitolak/{id}', [PengeluaranRutinController::class, 'postPengeluaranRutinDitolak'])->name('backend.post.pengeluaran.rutin.ditolak');
    Route::match(['get', 'post'], '/admin/pengeluaranRutinDestroy/{id}', [PengeluaranRutinController::class, 'postPengeluaranRutinDestroy'])->name('backend.post.pengeluaran.rutin.destroy');


    Route::get('/admin/rekapPemasukan', [BackendPikiController::class, 'rekapPemasukan'])->name('backend.rekap.pemasukan');

    Route::get('/admin/pengeluaranKeuangan', [BackendPikiController::class, 'pengeluaran'])->name('backend.pengeluaran');
    Route::get('/admin/laporanKeuangan', [BackendPikiController::class, 'laporanKeuangan'])->name('backend.laporan.pengeluaran');

    Route::get('/admin/posAngaran', [PosAnggaranController::class, 'index'])->name('backend.pos.anggaran');
    Route::match(['get', 'post'],'/admin/formAddPosAngaran', [PosAnggaranController::class, 'show'])->name('backend.form.add.pos.anggaran');
    Route::match(['get', 'post'],'/admin/formEditPosAngaran/{id}', [PosAnggaranController::class, 'edit'])->name('backend.form.edit.pos.anggaran');
    Route::match(['get', 'post'],'/admin/saveFormPosAngaran', [PosAnggaranController::class, 'saveFormPosAngaran'])->name('backend.save.form.pos.anggaran');
    Route::match(['get', 'post'],'/admin/formPosAngaranDestroy/{id}', [PosAnggaranController::class, 'destroy'])->name('backend.pos.anggaran.destroy');

    Route::get('/admin/namaKegiatan', [NamaKegiatanController::class, 'index'])->name('backend.nama.kegiatan');
    Route::match(['get', 'post'],'/admin/formAddNamaKegiatan', [NamaKegiatanController::class, 'show'])->name('backend.form.add.nama.kegiatan');
    Route::match(['get', 'post'],'/admin/formEditNamaKegiatan/{id}', [NamaKegiatanController::class, 'edit'])->name('backend.form.edit.nama.kegiatan');
    Route::match(['get', 'post'],'/admin/saveFormNamaKegiatan', [NamaKegiatanController::class, 'saveFormNamaKegiatan'])->name('backend.save.form.nama.kegiatan');
    Route::match(['get', 'post'],'/admin/formNamaKegiatanDestroy/{id}', [NamaKegiatanController::class, 'destroy'])->name('backend.nama.kegiatan.destroy');

    Route::match(['get', 'post'], '/admin/pengeluaranRutinDestroy/{id}', [PengeluaranRutinController::class, 'postPengeluaranRutinDestroy'])->name('backend.post.pengeluaran.rutin.destroy');
});

// login khusus anggota
Route::group(['middleware' => ['CekLevel:anggota']], function () {
    Route::get('/admin/profile/{id}', [ProfileAnggotaController::class, 'show'])->name('profile');
    Route::get('/admin/profile/edit/{id}', [ProfileAnggotaController::class, 'edit'])->name('profile.edit');
    Route::put('/admin/profile/update/{id}', [ProfileAnggotaController::class, 'update'])->name('profile.update');
    Route::get('/admin/iuran/{id}', [ProfileAnggotaController::class, 'iuran'])->name('iuran');
    Route::post('/admin/saveiuran/{id}', [ProfileAnggotaController::class, 'saveIuran'])->name('save.form.iuran');
});
