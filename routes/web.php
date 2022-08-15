<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\NewsPikiController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AgendaPikiController;
use App\Http\Controllers\HeaderPikiController;
use App\Http\Controllers\PendapatanController;
use App\Http\Controllers\AnggotaPikiController;
use App\Http\Controllers\BackendDokumenController;
use App\Http\Controllers\BackendFaqController;
use App\Http\Controllers\BackendPikiController;
use App\Http\Controllers\BackendTentangController;
use App\Http\Controllers\PosAnggaranController;
use App\Http\Controllers\ProgramPikiController;
use App\Http\Controllers\SponsorPikiController;
use App\Http\Controllers\CategoryNewsController;
use App\Http\Controllers\FrontEndPikiController;
use App\Http\Controllers\NamaKegiatanController;
use App\Http\Controllers\DataBankIuranController;
use App\Http\Controllers\SumbanganPikiController;
use App\Http\Controllers\DataBiayaIuranController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\JenisPemasukanController;
use App\Http\Controllers\ProfileAnggotaController;
use App\Http\Controllers\KategoriAnggotaController;
use App\Http\Controllers\LaporanKeuanganController;
use App\Http\Controllers\HeaderPikiMobileController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\DependantDropdownController;
use App\Http\Controllers\DinamisUrlNavbarKeuanganController;
use App\Http\Controllers\DynamicFormController;
use App\Http\Controllers\MasterMenuNavbarController;
use App\Http\Controllers\PartnerShipController;
use App\Http\Controllers\SponsorshipBeforeFaqController;
use App\Http\Controllers\SponsorShipDuaController;
use App\Http\Controllers\SponsorshipNewsCategoriesController;
use App\Http\Controllers\SponsorshipNewsController;
use App\Http\Controllers\SponsorShipSatuController;
use App\Http\Controllers\SponsorShipTigaController;
use App\Http\Controllers\SubKategoriAnggotaController;
use App\Http\Controllers\SubMenuNavbarKeuanganController;
use App\Http\Controllers\TambahAdminController;

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

Route::get('/r', function () {
    Artisan::call('config:clear');
    return response()->json('config:clear');
});

Route::get('/foo', function () {
    Artisan::call('storage:link');
    return response()->json('storage');
});

Route::get('/seed', function () {
    Artisan::call('migrate:fresh --seed');
    return response()->json('migrate:fresh --seed');
});

Route::get('/welcome', fn () =>
    view('welcome')
);

Route::get('/indoregion', function () {
    Artisan::call('db:seed --class=IndoRegionSeeder');
    return response()->json('indoregion');
});

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::controller(FrontEndPikiController::class)->group(function() {
    Route::get('/', 'index')->name('index');
    Route::get('/mobile', 'mobile');
    // halaman single berita
    Route::get('/berita/webView/{newsPiki:slug}', 'newsWebView')->name('read.more.berita');
    Route::get('/berita/mobileView/{newsPiki:slug}', 'newsMobileView')->name('read.more.berita.mobile.view');
    Route::get('/beritaLainnya/webView', 'beritaLainnyaWebView');
    Route::get('/beritaLainnya/mobileView', 'beritaLainnyaMobileView');
    // halaman single program
    Route::get('/program/{slug}', 'program')->name('read.more.program');
    Route::get('/artikel/webView/{judul}', 'artikelWebView')->name('read.more.artikel.web.view');
    Route::get('/artikel/Lainnya/webView/', 'artikelLainnya');
    // tentang
    Route::get('/tentang/webView', 'tentangWebView');
    Route::get('/tentang/mobileView', 'tentangMobileView');
    Route::post('/tentang/mobileView', 'tentangMobileViewPost');
    // community partners
    Route::get('/communityPartners/{id}', 'communityPartners');
});

Route::get('/admin', [BackendPikiController::class, 'index'])->middleware('auth', 'CekLevel:super-admin,admin,bendahara,organisasi,infokom,media')->name('index.admin');

Route::get('/daftar', [RegisterController::class, 'index'])->middleware('guest')->name('register');
Route::post('/daftar', [RegisterController::class, 'store'])->name('register.action');

Route::get('/login', [RegisterController::class, 'login'])->middleware('guest')->name('admin.login');
Route::post('/login', [RegisterController::class, 'authenticate'])->name('login.action');
Route::get('/logout', [RegisterController::class, 'logout'])->name('logout');

Route::controller(CategoryNewsController::class)->group(fn() => [
    Route::get('/categories', 'index')->name('kategori.berita'),
    Route::get('/categories/{categoryNews:slug}', 'show')->name('isi.kategori'),
    Route::get('/categories/mobileView/{categoryNews:slug}', 'categoriesMobileViews')->name('isi.kategori.mobile.view'),
    ]
);

Route::post('/selectAgenda', [AgendaPikiController::class, 'selectAgenda']);
Route::get('/moreAgenda', [AgendaPikiController::class, 'moreAgenda']);
Route::get('/isiMoreAgenda/{id}', [AgendaPikiController::class, 'isiMoreAgenda']);

Route::get('/sumbanganPiki', [SumbanganPikiController::class, 'index'])->name('sumbangan.frontend');
Route::post('/sumbanganPiki', [SumbanganPikiController::class, 'store'])->name('save.form.sumbangan.frontend');

Route::get('/wilayah', [DependantDropdownController::class, 'wilayah'])->name('wilayah');
// halaman wilayah
Route::get('provinces', [DependantDropdownController::class, 'wilayah'])->name('provinces');
Route::post('/cities', [DependantDropdownController::class, 'cities'])->name('cities');
Route::post('/districts', [DependantDropdownController::class, 'districts'])->name('districts');
Route::post('/villages', [DependantDropdownController::class, 'villages'])->name('villages');

Route::post('/customForm', [DynamicFormController::class, 'customForm']);
Route::post('/posAnggaran', [PosAnggaranController::class, 'posAnggaran']);
Route::post('/dataUser', [PendapatanController::class, 'dataUser']);

// header
Route::group(['middleware' => ['CekLevel:super-admin']], function () {
    Route::get('/admin/landingpageheader', [HeaderPikiController::class, 'index'])->name('header');
    Route::post('/admin/upload/proses', [HeaderPikiController::class, 'proses_upload'])->name('upload.header');
    Route::post('/admin/upload/hapus/{id}', [HeaderPikiController::class, 'destroy'])->name('header.destroy');

    Route::post('/admin/upload/headermobile', [HeaderPikiMobileController::class, 'store'])->name('upload.header.mobile');
    Route::post('/admin/upload/headermobile/hapus/{id}', [HeaderPikiMobileController::class, 'destroy'])->name('header.mobile.destroy');

    Route::get('/admin/tambahAdmin', [TambahAdminController::class, 'index'])->name('backend.super.admin');
    Route::get('/admin/addTambahAdmin', [TambahAdminController::class, 'show'])->name('backend.tambah.admin');
    Route::get('/admin/editTambahAdmin/{id}', [TambahAdminController::class, 'edit'])->name('backend.edit.admin');
    Route::get('/admin/formTambahAdmin/{id}', [TambahAdminController::class, 'formTambahAdmin'])->name('backend.form.tambah.admin');
    Route::match(['get', 'post'], '/admin/saveTambahAdmin', [TambahAdminController::class, 'saveTambahAdmin'])->name('backend.save.tambah.admin');
    Route::match(['get', 'post'], '/admin/hapusTambahAdmin/{id}', [TambahAdminController::class, 'hapusTambahAdmin'])->name('backend.hapus.tambah.admin');

    Route::resource('/admin/faq', BackendFaqController::class);

    Route::resource('/admin/partnerShip', PartnerShipController::class);
    Route::resource('/admin/sponsorShipSatu', SponsorShipSatuController::class);
    Route::resource('/admin/sponsorShipDua', SponsorShipDuaController::class);
    Route::resource('/admin/sponsorShipTiga', SponsorShipTigaController::class);

    Route::resource('/admin/backendTentang', BackendTentangController::class);
    Route::resource('/admin/backendDokumen', BackendDokumenController::class);
    Route::resource('/admin/sponsorShipBeforeFaq', SponsorshipBeforeFaqController::class);
    Route::resource('/admin/sponsorShipNews', SponsorshipNewsController::class);
    Route::resource('/admin/sponsorShipNewsCategories', SponsorshipNewsCategoriesController::class);

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
    Route::get('/admin/formEditProgram/checkSlug', [NewsPikiController::class, 'checkSlug']);

    Route::get('/admin/landingpagejenisprogram', [ProgramPikiController::class, 'index'])->name('program');
    Route::post('/admin/landingpagejenisprogram', [ProgramPikiController::class, 'store'])->name('upload.program');
    Route::post('/admin/landingpagejenisprogram/hapus/{id}', [ProgramPikiController::class, 'destroy'])->name('program.destroy');

    Route::match(['get', 'post'], '/admin/formAddProgram', [ProgramPikiController::class, 'formAddProgram'])->name('backend.form.add.program');
    Route::match(['get', 'post'], '/admin/formEditProgram/{id}', [ProgramPikiController::class, 'formEditProgram'])->name('backend.form.edit.program');
    Route::match(['get', 'post'], '/admin/saveFormProgram', [ProgramPikiController::class, 'saveFormProgram'])->name('save.form.program');

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
    Route::match(['get', 'post'], '/admin/hapusAnggotaYangDitampilkan/{id}', [AnggotaPikiController::class, 'hapusAnggotaYangDitampilkan'])->name('hapus.anggota.yang.ditampilkan');

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

    #donasi#
    Route::get('/admin/pemasukanDonasi', [BackendPikiController::class, 'pemasukanDonasi'])->name('backend.donasi');
    Route::get('/admin/pemasukanDonasiEdit/{id}', [BackendPikiController::class, 'pemasukanDonasiEdit'])->name('backend.donasi.edit');
    Route::post('/admin/updatePemasukanDonasi/{id}', [SumbanganPikiController::class, 'update'])->name('update.form.sumbangan.frontend');
    Route::get('/admin/pemasukanDonasiDetail', [BackendPikiController::class, 'pemasukanDonasiDetail'])->name('backend.donasi.detail');
    Route::get('/admin/pemasukanDonasiBaru', [BackendPikiController::class, 'pemasukanDonasiBaru'])->name('backend.donasi.baru');
    Route::get('/admin/pemasukanDonasiDiproses', [BackendPikiController::class, 'pemasukanDonasiDiproses'])->name('backend.donasi.diproses');
    Route::get('/admin/pemasukanDonasiDitolak', [BackendPikiController::class, 'pemasukanDonasiDitolak'])->name('backend.donasi.ditolak');
    Route::get('/admin/pemasukanDonasiDiterima', [BackendPikiController::class, 'pemasukanDonasiDiterima'])->name('backend.donasi.diterima');

    Route::get('/admin/pemasukanDonasiViaBendahara/{id}', [SumbanganPikiController::class, 'pemasukanDonasiViaBendahara'])->name('backend.donasi.detail.via.bendahara');
    Route::match(['get', 'post'], '/admin/pemasukanDonasiDiverifikasiBendahara/{id}', [SumbanganPikiController::class, 'postPemasukanDonasiDiverifikasiBendahara'])->name('backend.post.donasi.diverifikasi.bendahara');
    Route::match(['get', 'post'], '/admin/pemasukanDonasiDiverifikasiBendaharaViaForm/{id}', [SumbanganPikiController::class, 'postPemasukanDonasiDiverifikasiBendaharaViaForm'])->name('backend.post.donasi.diverifikasi.bendahara.via.form');

    Route::get('/admin/pemasukanDonasiViaKetua/{id}', [SumbanganPikiController::class, 'pemasukanDonasiViaKetua'])->name('backend.donasi.detail.via.ketua');
    Route::match(['get', 'post'], '/admin/pemasukanDonasiDiverifikasiKetua/{id}', [SumbanganPikiController::class, 'postPemasukanDonasiDiverifikasiKetua'])->name('backend.post.donasi.diverifikasi.ketua');
    Route::match(['get', 'post'], '/admin/pemasukanDonasiDiverifikasiKetuaViaForm/{id}', [SumbanganPikiController::class, 'postPemasukanDonasiDiverifikasiKetuaViaForm'])->name('backend.post.donasi.diverifikasi.ketua.via.form');

    Route::get('/admin/pemasukanDonasiViaSpi/{id}', [SumbanganPikiController::class, 'pemasukanDonasiViaSpi'])->name('backend.donasi.detail.via.spi');
    Route::match(['get', 'post'], '/admin/pemasukanDonasiDiverifikasiSpi/{id}', [SumbanganPikiController::class, 'postPemasukanDonasiDiverifikasiSpi'])->name('backend.post.donasi.diverifikasi.spi');
    Route::match(['get', 'post'], '/admin/pemasukanDonasiDiverifikasiSpiViaForm/{id}', [SumbanganPikiController::class, 'postPemasukanDonasiDiverifikasiSpiViaForm'])->name('backend.post.donasi.diverifikasi.spi.via.form');

    Route::match(['get', 'post'], '/admin/pemasukanDonasiDitolak/{id}', [SumbanganPikiController::class, 'postPemasukanDonasiDitolak'])->name('backend.post.donasi.ditolak');
    Route::match(['get', 'post'], '/admin/pemasukanDonasiDestroy/{id}', [SumbanganPikiController::class, 'postPemasukanDonasiDestroy'])->name('backend.post.donasi.destroy');

    Route::get('/admin/Pengeluaran', [PengeluaranController::class, 'index'])->name('backend.pengeluaran.rutin');
    Route::get('/admin/formAddPengeluaran', [PengeluaranController::class, 'formAddPengeluaran'])->name('backend.form.add.pengeluaran.rutin');
    Route::get('/admin/formEditPengeluaran/{id}', [PengeluaranController::class, 'formEditPengeluaran'])->name('backend.form.edit.pengeluaran.rutin');
    Route::match(['get', 'post'], '/admin/saveFormPengeluaran', [PengeluaranController::class, 'saveFormPengeluaran'])->name('backend.save.form.pengeluaran.rutin');
    Route::get('/admin/PengeluaranBaru', [PengeluaranController::class, 'PengeluaranBaru'])->name('backend.pengeluaran.rutin.baru');
    Route::get('/admin/PengeluaranDiproses', [PengeluaranController::class, 'PengeluaranDiproses'])->name('backend.pengeluaran.rutin.diproses');
    Route::get('/admin/PengeluaranDitolak', [PengeluaranController::class, 'PengeluaranDitolak'])->name('backend.pengeluaran.rutin.ditolak');
    Route::get('/admin/PengeluaranDiterima', [PengeluaranController::class, 'PengeluaranDiterima'])->name('backend.pengeluaran.rutin.diterima');

    Route::get('/admin/formPengeluaranViaBendahara/{id}', [PengeluaranController::class, 'formPengeluaranViaBendahara'])->name('backend.form.pengeluaran.rutin.via.bendahara');
    Route::match(['get', 'post'], '/admin/postPengeluaranViaBendahara/{id}', [PengeluaranController::class, 'postPengeluaranViaBendahara'])->name('backend.post.pengeluaran.rutin.diverifikasi.bendahara');
    Route::match(['get', 'post'], '/admin/postPengeluaranViaBendaharaViaForm/{id}', [PengeluaranController::class, 'postPengeluaranViaBendaharaViaForm'])->name('backend.post.pengeluaran.rutin.diverifikasi.bendahara.via.form');

    Route::get('/admin/formPengeluaranViaKetua/{id}', [PengeluaranController::class, 'formPengeluaranViaKetua'])->name('backend.form.pengeluaran.rutin.via.ketua');
    Route::match(['get', 'post'], '/admin/postPengeluaranViaKetua/{id}', [PengeluaranController::class, 'postPengeluaranViaKetua'])->name('backend.post.pengeluaran.rutin.diverifikasi.ketua');
    Route::match(['get', 'post'], '/admin/postPengeluaranViaKetuaViaForm/{id}', [PengeluaranController::class, 'postPengeluaranViaKetuaViaForm'])->name('backend.post.pengeluaran.rutin.diverifikasi.ketua.via.form');

    Route::get('/admin/formPengeluaranViaSpi/{id}', [PengeluaranController::class, 'formPengeluaranViaSpi'])->name('backend.form.pengeluaran.rutin.via.spi');
    Route::match(['get', 'post'], '/admin/postPengeluaranViaSpi/{id}', [PengeluaranController::class, 'postPengeluaranViaSpi'])->name('backend.post.pengeluaran.rutin.diverifikasi.spi');
    Route::match(['get', 'post'], '/admin/postPengeluaranViaSpiViaForm/{id}', [PengeluaranController::class, 'postPengeluaranViaSpiViaForm'])->name('backend.post.pengeluaran.rutin.diverifikasi.spi.via.form');

    Route::match(['get', 'post'], '/admin/PengeluaranDitolak/{id}', [PengeluaranController::class, 'postPengeluaranDitolak'])->name('backend.post.pengeluaran.rutin.ditolak');
    Route::match(['get', 'post'], '/admin/PengeluaranDestroy/{id}', [PengeluaranController::class, 'postPengeluaranDestroy'])->name('backend.post.pengeluaran.rutin.destroy');


    Route::get('/admin/rekapPemasukan', [BackendPikiController::class, 'rekapPemasukan'])->name('backend.rekap.pemasukan');

    Route::get('/admin/pengeluaranKeuangan', [BackendPikiController::class, 'pengeluaran'])->name('backend.pengeluaran');
    Route::get('/admin/laporanKeuangan', [LaporanKeuanganController::class, 'laporanKeuangan'])->name('backend.laporan.pengeluaran');
    Route::get('/admin/cariPemasukanLaporanKeuangan', [LaporanKeuanganController::class, 'cariPemasukan']);
    Route::get('/admin/cariPemasukanLaporanKeuanganFilterTanggal', [LaporanKeuanganController::class, 'cariPemasukanLaporanKeuanganFilterTanggal']);
    Route::get('/admin/cariPengeluaranLaporanKeuangan', [LaporanKeuanganController::class, 'cariPengeluaran']);
    Route::get('/admin/cariPengeluaranLaporanKeuanganFilterTanggal', [LaporanKeuanganController::class, 'cariPengeluaranLaporanKeuanganFilterTanggal']);

    Route::get('/admin/posAngaran', [PosAnggaranController::class, 'index'])->name('backend.pos.anggaran');
    Route::match(['get', 'post'], '/admin/formAddPosAngaran', [PosAnggaranController::class, 'show'])->name('backend.form.add.pos.anggaran');
    Route::match(['get', 'post'], '/admin/formEditPosAngaran/{id}', [PosAnggaranController::class, 'edit'])->name('backend.form.edit.pos.anggaran');
    Route::match(['get', 'post'], '/admin/saveFormPosAngaran', [PosAnggaranController::class, 'saveFormPosAngaran'])->name('backend.save.form.pos.anggaran');
    Route::match(['get', 'post'], '/admin/formPosAngaranDestroy/{id}', [PosAnggaranController::class, 'destroy'])->name('backend.pos.anggaran.destroy');

    Route::get('/admin/namaKegiatan', [NamaKegiatanController::class, 'index'])->name('backend.nama.kegiatan');
    Route::match(['get', 'post'], '/admin/formAddNamaKegiatan', [NamaKegiatanController::class, 'show'])->name('backend.form.add.nama.kegiatan');
    Route::match(['get', 'post'], '/admin/formEditNamaKegiatan/{id}', [NamaKegiatanController::class, 'edit'])->name('backend.form.edit.nama.kegiatan');
    Route::match(['get', 'post'], '/admin/saveFormNamaKegiatan', [NamaKegiatanController::class, 'saveFormNamaKegiatan'])->name('backend.save.form.nama.kegiatan');
    Route::match(['get', 'post'], '/admin/formNamaKegiatanDestroy/{id}', [NamaKegiatanController::class, 'destroy'])->name('backend.nama.kegiatan.destroy');

    Route::get('/admin/formInput/', [PendapatanController::class, 'show'])->name('backend.pendapatan');
    Route::match(['get', 'post'], '/admin/saveFormInput/', [PendapatanController::class, 'saveFormInput'])->name('backend.save.form.input.pendapatan');

    Route::match(['get', 'post'], '/admin/PengeluaranDestroy/{id}', [PengeluaranController::class, 'postPengeluaranDestroy'])->name('backend.post.pengeluaran.rutin.destroy');

    Route::get('/admin/masterMenuNavbarKeuangan/', [MasterMenuNavbarController::class, 'masterMenuNavbarKeuangan'])->name('backend.master.menu.navbar.keuangan');
    Route::match(['get', 'post'], '/admin/formAddMasterMenuNavbarKeuangan/', [MasterMenuNavbarController::class, 'formAddMasterMenuNavbarKeuangan'])->name('backend.form.add.master.menu.navbar.keuangan');
    Route::match(['get', 'post'], '/admin/formEditMasterMenuNavbarKeuangan/{id}', [MasterMenuNavbarController::class, 'formEditMasterMenuNavbarKeuangan'])->name('backend.form.edit.master.menu.navbar.keuangan');
    Route::match(['get', 'post'], '/admin/saveFormMasterMenuNavbarKeuangan/', [MasterMenuNavbarController::class, 'saveFormMasterMenuNavbarKeuangan'])->name('backend.save.form.master.menu.navbar.keuangan');
    Route::match(['get', 'post'], '/admin/destroyMasterMenuNavbarKeuangan/{id}', [MasterMenuNavbarController::class, 'destroyMasterMenuNavbarKeuangan'])->name('backend.destroy.master.menu.navbar.keuangan');

    Route::get('/admin/subMenuNavbarKeuangan/', [SubMenuNavbarKeuanganController::class, 'index'])->name('backend.sub.menu.navbar.keuangan');
    Route::match(['get', 'post'], '/admin/formAddSubMenuNavbarKeuangan/', [SubMenuNavbarKeuanganController::class, 'show'])->name('backend.form.add.sub.menu.navbar.keuangan');
    Route::match(['get', 'post'], '/admin/formEditSubMenuNavbarKeuangan/{id}', [SubMenuNavbarKeuanganController::class, 'edit'])->name('backend.form.edit.sub.menu.navbar.keuangan');
    Route::match(['get', 'post'], '/admin/saveFormSubMenuNavbarKeuangan/', [SubMenuNavbarKeuanganController::class, 'saveFormSubMenuNavbarKeuangan'])->name('backend.save.form.sub.menu.navbar.keuangan');
    Route::match(['get', 'post'], '/admin/destroySubMenuNavbarKeuangan/{id}', [SubMenuNavbarKeuanganController::class, 'destroySubMenuNavbarKeuangan'])->name('backend.destroy.sub.menu.navbar.keuangan');

    Route::match(['get', 'post'], '/admin/dinamisUrlNavbarKeuangan/{masterMenu?}/{subMenu?}', [DinamisUrlNavbarKeuanganController::class, 'dinamisUrlNavbarKeuangan'])->name('backend.dinamis.url.navbar.keuangan');
    Route::match(['get', 'post'], '/admin/dinamisIsiMenuKeuangan/{masterMenu?}/{subMenu?}Baru', [DinamisUrlNavbarKeuanganController::class, 'dinamisIsiMenuKeuanganBaru'])->name('backend.dinamis.isi.menu.keuangan.baru');
    Route::match(['get', 'post'], '/admin/dinamisIsiMenuKeuangan/{masterMenu?}/{subMenu?}Diproses', [DinamisUrlNavbarKeuanganController::class, 'dinamisIsiMenuKeuanganDiproses'])->name('backend.dinamis.isi.menu.keuangan.diproses');
    Route::match(['get', 'post'], '/admin/dinamisIsiMenuKeuangan/{masterMenu?}/{subMenu?}Diterima', [DinamisUrlNavbarKeuanganController::class, 'dinamisIsiMenuKeuanganDiterima'])->name('backend.dinamis.isi.menu.keuangan.diterima');
    Route::match(['get', 'post'], '/admin/dinamisIsiMenuKeuangan/{masterMenu?}/{subMenu?}Ditolak', [DinamisUrlNavbarKeuanganController::class, 'dinamisIsiMenuKeuanganDitolak'])->name('backend.dinamis.isi.menu.keuangan.ditolak');
    Route::match(['get', 'post'], '/admin/customForm/', [DynamicFormController::class, 'index'])->name('backend.dinamis.form');
    Route::match(['get', 'post'], '/admin/addCustomForm/', [DynamicFormController::class, 'create'])->name('backend.add.dinamis.form');
    Route::match(['get', 'post'], '/admin/saveCustomForm/', [DynamicFormController::class, 'saveCustomForm'])->name('backend.save.dinamis.form');
    // pengeluaran dinamis
    Route::match(['get', 'post'], '/admin/formPengeluaranDinamis/{masterMenu}/{subMenu}/edit/{id}', [DynamicFormController::class, 'formPengeluaranDinamisEdit'])->name('backend.form.pengeluaran.dinamis.edit');
    Route::match(['get', 'post'], '/admin/formPengeluaranDinamis/{masterMenu}/{subMenu}/ViaBendahara/{id}', [DynamicFormController::class, 'formPengeluaranDinamisViaBendahara'])->name('backend.form.pengeluaran.dinamis.via.bendahara');
    Route::match(['get', 'post'], '/admin/postPengeluaran/{masterMenu}/{subMenu?}/ViaBendahara/{id}', [DynamicFormController::class, 'postPengeluaranViaBendahara'])->name('backend.post.pengeluaran.dinamis.diverifikasi.bendahara');
    Route::match(['get', 'post'], '/admin/postPengeluaran/{masterMenu}/{subMenu?}/ViaBendaharaViaForm/{id}', [DynamicFormController::class, 'postPengeluaranViaBendaharaViaForm'])->name('backend.post.pengeluaran.dinamis.diverifikasi.bendahara.via.form');

    Route::match(['get', 'post'], '/admin/formPengeluaranDinamis/{masterMenu}/{subMenu}/ViaKetua/{id}', [DynamicFormController::class, 'formPengeluaranViaKetua'])->name('backend.form.pengeluaran.dinamis.via.ketua');
    Route::match(['get', 'post'], '/admin/postPengeluaran/{masterMenu}/{subMenu?}/ViaKetua/{id}', [DynamicFormController::class, 'postPengeluaranViaKetua'])->name('backend.post.pengeluaran.dinamis.diverifikasi.ketua');
    Route::match(['get', 'post'], '/admin/postPengeluaran/{masterMenu}/{subMenu}/ViaKetuaViaForm/{id}', [DynamicFormController::class, 'postPengeluaranViaKetuaViaForm'])->name('backend.post.pengeluaran.dinamis.diverifikasi.ketua.via.form');

    Route::match(['get', 'post'], '/admin/formPengeluaranDinamis/{masterMenu}/{subMenu}/ViaSpi/{id}', [DynamicFormController::class, 'formPengeluaranViaSpi'])->name('backend.form.pengeluaran.dinamis.via.spi');
    Route::match(['get', 'post'], '/admin/postPengeluaran/{masterMenu}/{subMenu?}/ViaSpi/{id}', [DynamicFormController::class, 'postPengeluaranViaSpi'])->name('backend.post.pengeluaran.dinamis.diverifikasi.spi');
    Route::match(['get', 'post'], '/admin/postPengeluaran/{masterMenu}/{subMenu?}/ViaSpiViaForm/{id}', [DynamicFormController::class, 'postPengeluaranViaSpiViaForm'])->name('backend.post.pengeluaran.dinamis.diverifikasi.spi.via.form');

    Route::match(['get', 'post'], '/admin/Pengeluaran/{masterMenu}/{subMenu}/Ditolak/{id}', [DynamicFormController::class, 'postPengeluaranDitolak'])->name('backend.post.pengeluaran.dinamis.ditolak');
    Route::match(['get', 'post'], '/admin/Pengeluaran/{masterMenu}/{subMenu}/Destroy/{id}', [DynamicFormController::class, 'postPengeluaranDestroy'])->name('backend.post.pengeluaran.dinamis.destroy');
    // pemasukan dinamis
    Route::match(['get', 'post'], '/admin/formPendapatanDinamis/{masterMenu}/{subMenu}/ViaBendahara/{id}', [DynamicFormController::class, 'formPendapatanDinamisViaBendahara'])->name('backend.form.pendapatan.dinamis.via.bendahara');
    Route::match(['get', 'post'], '/admin/postPendapatan/{masterMenu}/{subMenu?}/ViaBendahara/{id}', [DynamicFormController::class, 'postPendapatanViaBendahara'])->name('backend.post.pendapatan.dinamis.diverifikasi.bendahara');
    Route::match(['get', 'post'], '/admin/postPendapatan/{masterMenu}/{subMenu?}/ViaBendaharaViaForm/{id}', [DynamicFormController::class, 'postPendapatanViaBendaharaViaForm'])->name('backend.post.pendapatan.dinamis.diverifikasi.bendahara.via.form');

    Route::match(['get', 'post'], '/admin/formPendapatanDinamis/{masterMenu}/{subMenu}/ViaKetua/{id}', [DynamicFormController::class, 'formPendapatanDinamisViaKetua'])->name('backend.form.pendapatan.dinamis.via.ketua');
    Route::match(['get', 'post'], '/admin/postPendapatan/{masterMenu}/{subMenu?}/ViaKetua/{id}', [DynamicFormController::class, 'postPendapatanViaKetua'])->name('backend.post.pendapatan.dinamis.diverifikasi.ketua');
    Route::match(['get', 'post'], '/admin/postPendapatan/{masterMenu}/{subMenu}/ViaKetuaViaForm/{id}', [DynamicFormController::class, 'postPendapatanViaKetuaViaForm'])->name('backend.post.pendapatan.dinamis.diverifikasi.ketua.via.form');

    Route::match(['get', 'post'], '/admin/formPendapatanDinamis/{masterMenu}/{subMenu}/ViaSpi/{id}', [DynamicFormController::class, 'formPendapatanDinamisViaSpi'])->name('backend.form.pendapatan.dinamis.via.spi');
    Route::match(['get', 'post'], '/admin/postPendapatan/{masterMenu}/{subMenu?}/ViaSpi/{id}', [DynamicFormController::class, 'postPendapatanViaSpi'])->name('backend.post.pendapatan.dinamis.diverifikasi.spi');
    Route::match(['get', 'post'], '/admin/postPendapatan/{masterMenu}/{subMenu?}/ViaSpiViaForm/{id}', [DynamicFormController::class, 'postPendapatanViaSpiViaForm'])->name('backend.post.pendapatan.dinamis.diverifikasi.spi.via.form');

    Route::match(['get', 'post'], '/admin/Pendapatan/{masterMenu}/{subMenu}/Ditolak/{id}', [DynamicFormController::class, 'postPendapatanDitolak'])->name('backend.post.pendapatan.dinamis.ditolak');
    Route::match(['get', 'post'], '/admin/Pendapatan/{masterMenu}/{subMenu}/Destroy/{id}', [DynamicFormController::class, 'postPendapatanDestroy'])->name('backend.post.pendapatan.dinamis.destroy');
});

// login khusus anggota
Route::group(['middleware' => ['CekLevel:anggota']], function () {
    Route::get('/admin/profile/{userid}', [ProfileAnggotaController::class, 'show'])->name('profile');
    Route::get('/admin/profile/edit/{userid}', [ProfileAnggotaController::class, 'edit'])->name('profile.edit');
    Route::put('/admin/profile/update/{userid}', [ProfileAnggotaController::class, 'update'])->name('profile.update');
    Route::get('/admin/iuran/{userid}', [ProfileAnggotaController::class, 'iuran'])->name('iuran');
    Route::post('/admin/saveiuran/{userid}', [ProfileAnggotaController::class, 'saveIuran'])->name('save.form.iuran');
});

Route::group(['middleware' => ['permission:header']], function () {
    Route::get('/admin/backendHeaderviaUser/{userid}', [ProfileAnggotaController::class, 'backendHeader']);
});

Route::group(['middleware' => ['permission:berita']], function () {
    Route::get('/admin/backendBeritaviaUser/{userid}', [ProfileAnggotaController::class, 'landingpageberita']);
    Route::get('/admin/editberitaviaUser/{userid}/berita/{newsid}', [ProfileAnggotaController::class, 'editberita'])->name('crud.berita.via.user');
});

Route::group(['middleware' => ['permission:program']], function () {
    Route::get('/admin/backendPagejenisprogramviaUser/{userid}', [ProfileAnggotaController::class, 'landingpagejenisprogram']);
});

Route::group(['middleware' => ['permission:agenda']], function () {
    Route::get('/admin/backendPageagendaviaUser/{userid}', [ProfileAnggotaController::class, 'landingpageagenda']);
    Route::get('/admin/editAgendaViaUser/{userid}/agenda/{agendaid}', [ProfileAnggotaController::class, 'editagendaViaUser'])->name('agenda.edit.via.user');
});

Route::group(['middleware' => ['permission:anggota']], function () {
    Route::get('/admin/backendAnggotaViaUser/{userid}', [ProfileAnggotaController::class, 'backendanggota']);
});

Route::group(['middleware' => ['permission:community partners']], function () {
    Route::get('/admin/backendCommunitypartnersViaUser/{userid}', [ProfileAnggotaController::class, 'backendCommunitypartnersViaUser']);
    Route::get('/admin/editCommunityPartnersViaUser/{userid}/communityPartners/{partnersid}', [ProfileAnggotaController::class, 'editCommunityPartnersViaUser'])->name('communitypartners.edit.via.user');
});

Route::group(['middleware' => ['permission:keuangan']], function () {
    Route::get('/admin/backendKeuanganViaUser/{userid}', [ProfileAnggotaController::class, 'backendKeuanganViaUser']);
    Route::get('/admin/backendDataRekeningBankViaUser/{userid}', [ProfileAnggotaController::class, 'backendDataRekeningBankViaUser']);
    Route::match(['get', 'post'], '/admin/backendFormEditDataRekeningBankViaUser/{userid}/dataRekeningBank/{datarekeningid}', [ProfileAnggotaController::class, 'backendFormEditDataRekeningBankViaUser'])->name('backend.form.edit.data.rekening.bank.via.user');
    Route::get('/admin/backendDataBiayaIuranViaUser/{userid}', [ProfileAnggotaController::class, 'backendDataBiayaIuranViaUser']);
    Route::match(['get', 'post'], '/admin/backendFormAddDataBiayaIuranViaUser/{userid}', [ProfileAnggotaController::class, 'backendFormAddDataBiayaIuranViaUser']);
    Route::match(['get', 'post'], '/admin/backendFormEditDataBiayaIuranViaUser/{userid}/dataBiayaIuran/{dataiuranid}', [ProfileAnggotaController::class, 'backendFormEditDataBiayaIuranViaUser'])->name('backend.form.edit.data.biaya.iuran.via.user');
    Route::get('/admin/backendMasterMenuNavbarKeuanganViaUser/{userid}', [ProfileAnggotaController::class, 'backendMasterMenuNavbarKeuanganViaUser']);
    Route::match(['get', 'post'], '/admin/backendFormEditMasterMenuNavbarKeuanganViaUser/{userid}/menuNavbar/{menunavbarid}', [ProfileAnggotaController::class, 'backendFormEditMasterMenuNavbarKeuanganViaUser'])->name('backend.form.edit.master.menu.navbar.keuangan.via.user');
    Route::get('/admin/backendSubMenuNavbarKeuanganViaUser/{userid}', [ProfileAnggotaController::class, 'backendSubMenuNavbarKeuanganViaUser']);
    Route::match(['get', 'post'], '/admin/backendFormAddSubMenuNavbarKeuanganViaUser/{userid}', [ProfileAnggotaController::class, 'backendFormAddSubMenuNavbarKeuanganViaUser']);
    Route::match(['get', 'post'], '/admin/backendFormEditSubMenuNavbarKeuanganViaUser/{userid}/{submenuid}', [ProfileAnggotaController::class, 'backendFormEditSubMenuNavbarKeuanganViaUser'])->name('backend.form.edit.sub.menu.navbar.keuangan.via.user');
    Route::get('/admin/backendFormInputViaUser/{userid}', [ProfileAnggotaController::class, 'backendFormInputViaUser']);
    Route::get('/admin/backendFormAddPengeluaranViaUser/{userid}', [ProfileAnggotaController::class, 'backendFormAddPengeluaranViaUser']);
    Route::get('/admin/backendLaporanKeuanganViaUser/{userid}', [ProfileAnggotaController::class, 'backendLaporanKeuanganViaUser']);
});
