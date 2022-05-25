<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\NewsPikiController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AgendaPikiController;
use App\Http\Controllers\HeaderPikiController;
use App\Http\Controllers\AnggotaPikiController;
use App\Http\Controllers\BackendPikiController;
use App\Http\Controllers\ProgramPikiController;
use App\Http\Controllers\FrontEndPikiController;

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

Route::get('/', [FrontEndPikiController::class, 'index'])->name('index');
Route::get('/admin', [BackendPikiController::class, 'index'])->name('index.admin');

Route::get('/daftar', [RegisterController::class, 'index'])->name('register');
Route::post('/daftar', [RegisterController::class, 'index'])->name('register.action');

Route::get('/login', [RegisterController::class, 'login'])->name('admin.login');
Route::post('/login', [RegisterController::class, 'login_action'])->name('login.action');
Route::get('/logout', [RegisterController::class, 'logout'])->name('logout');

Route::get('/admin/landingpageheader', [HeaderPikiController::class, 'index'])->name('header');
Route::post('/admin/upload/proses', [HeaderPikiController::class, 'proses_upload'])->name('upload.header');
Route::post('/admin/upload/hapus/{id}', [HeaderPikiController::class, 'destroy'])->name('header.destroy');

Route::get('/admin/landingpageberita', [NewsPikiController::class, 'index'])->name('berita');
Route::post('/admin/landingpageberita', [NewsPikiController::class, 'store'])->name('berita.post');
Route::get('/admin/editberita/{id}', [NewsPikiController::class, 'edit'])->name('berita.edit');
Route::put('/admin/updateberita/{id}', [NewsPikiController::class, 'update'])->name('berita.update');
Route::post('/admin/landingpageberita/hapus/{id}', [NewsPikiController::class, 'destroy'])->name('berita.destroy');

Route::get('/admin/landingpagejenisprogram', [ProgramPikiController::class, 'index'])->name('program');
Route::post('/admin/landingpagejenisprogram', [ProgramPikiController::class, 'store'])->name('upload.program');
Route::post('/admin/landingpagejenisprogram/hapus/{id}', [ProgramPikiController::class, 'destroy'])->name('program.destroy');

Route::get('/admin/landingpageagenda', [AgendaPikiController::class, 'index'])->name('agenda.index');
Route::post('/admin/landingpageagenda', [AgendaPikiController::class, 'store'])->name('agenda.post');
Route::post('/admin/landingpageagenda/hapus/{id}', [AgendaPikiController::class, 'destroy'])->name('agenda.destroy');


Route::get('/admin/landingpageanggota', [AnggotaPikiController::class, 'index'])->name('anggota.index');
Route::post('/admin/landingpageanggota', [AnggotaPikiController::class, 'store'])->name('anggota.post');
Route::post('/admin/landingpageanggota/hapus/{id}', [AnggotaPikiController::class, 'destroy'])->name('anggota.destroy');

Route::get('/admin/formlandingpageaplikasikede', [AplikasiKedeController::class, 'formCreate']);

Route::post('/admin/formlandingpageaplikasikedeheader', [AplikasiKedeHeaderController::class, 'store'])->name('aplikasikedeheader.post');
Route::post('/admin/formlandingpageaplikasikedepicture', [AplikasiKedePicture670x560Controller::class, 'store'])->name('aplikasikedepicture.post');
Route::post('/admin/formlandingpageaplikasikede', [AplikasiKedeController::class, 'store'])->name('aplikasikede.post');

Route::get('/admin/tutorialbelanja', [TutorialBelanjaController::class, 'index'] )->name('tutorialbelanja');
Route::post('/admin/tutorialbelanja', [TutorialBelanjaController::class, 'store'])->name('tutorialbelanja.post');
Route::post('/admin/tutorialbelanja/hapus/{id}', [TutorialBelanjaController::class, 'destroy'])->name('tutorialbelanja.destroy');

Route::get('/admin/tutorialwallet', [WalletController::class, 'index'])->name('tutorialwallet');
Route::post('/admin/tutorialwallet', [WalletController::class, 'store'])->name('tutorialwallet.post');
Route::post('/admin/tutorialwallet/hapus/{id}', [WalletController::class, 'destroy'])->name('tutorialwallet.destroy');

Route::get('/admin/tutorialmendaftar', [TutorialMendaftarController::class, 'index'])->name('tutorialmendaftar');
Route::post('/admin/tutorialmendaftar', [TutorialMendaftarController::class, 'store'])->name('tutorialmendaftar.post');
Route::post('/admin/tutorialmendaftar/hapus/{id}', [TutorialMendaftarController::class, 'destroy'])->name('tutorialmendaftar.destroy');

Route::get('/admin/testimoni', [TestimoniController::class, 'index'])->name('testimoni');
Route::post('/admin/testimoni', [TestimoniController::class, 'store'])->name('testimoni.post');
Route::post('/admin/testimoni/hapus/{id}', [TestimoniController::class, 'destroy'])->name('testimoni.destroy');

Route::get('/admin/faqs', [FaqsController::class, 'index'])->name('faq');
Route::post('/admin/faqs/hapus/{id}', [FaqsController::class, 'destroy'])->name('faq.destroy');

Route::get('/admin/formfaqs', [FaqsController::class, 'formCreate']);
Route::post('/admin/formfaqs', [FaqsController::class, 'store'])->name('faq.post');

Route::get('/admin/kedeid', [KedeIdController::class, 'index'])->name('kedeid');
Route::post('/admin/kedeid/hapus/{id}', [KedeIdController::class, 'destroy'])->name('kedeid.destroy');

Route::get('/admin/formkedeid', [KedeIdController::class, 'formCreate']);
Route::post('/admin/formkedeid', [KedeIdController::class, 'store'])->name('kedeid.post');
