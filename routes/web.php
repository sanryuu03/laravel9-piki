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
use App\Http\Controllers\SponsorPikiController;
use App\Http\Controllers\FrontEndPikiController;
use App\Http\Controllers\HeaderPikiMobileController;

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

Route::post('/admin/upload/headermobile', [HeaderPikiMobileController::class, 'store'])->name('upload.header.mobile');
Route::post('/admin/upload/headermobile/hapus/{id}', [HeaderPikiMobileController::class, 'destroy'])->name('header.mobile.destroy');

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
Route::get('/admin/editagenda/{id}', [AgendaPikiController::class, 'edit'])->name('agenda.edit');
Route::put('/admin/updateagenda/{id}', [AgendaPikiController::class, 'update'])->name('agenda.update');
Route::delete('/admin/landingpageagenda/hapus/{id}', [AgendaPikiController::class, 'destroy'])->name('agenda.destroy');


Route::get('/admin/landingpageanggota', [AnggotaPikiController::class, 'index'])->name('anggota.index');
Route::get('/admin/anggota/cv/{id}', [AnggotaPikiController::class, 'show'])->name('anggota.cv');
Route::get('/admin/landingpageanggota/edit/{id}', [AnggotaPikiController::class, 'edit'])->name('anggota.edit');
Route::put('/admin/landingpageanggota/update/{id}', [AnggotaPikiController::class, 'update'])->name('anggota.update');
Route::post('/admin/landingpageanggota/hapus/{id}', [AnggotaPikiController::class, 'destroy'])->name('anggota.destroy');

// print cv
Route::get('/admin/landingpageanggota/export/{id}', [AnggotaPikiController::class, 'export'])->name('anggota.export');

Route::get('/admin/communitypartners', [SponsorPikiController::class, 'index'] )->name('communitypartners');
Route::post('/admin/communitypartners', [SponsorPikiController::class, 'store'])->name('communitypartners.post');
Route::get('/admin/editcommunitypartners/{id}', [SponsorPikiController::class, 'edit'])->name('communitypartners.edit');
Route::put('/admin/updatecommunitypartners/{id}', [SponsorPikiController::class, 'update'])->name('communitypartners.update');
Route::post('/admin/communitypartners/hapus/{id}', [SponsorPikiController::class, 'destroy'])->name('communitypartners.destroy');
