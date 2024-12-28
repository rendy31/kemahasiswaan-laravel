<?php

use App\Models\front;
use App\Models\Organization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\MonevController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\StudentActivityController;
use App\Models\Scholarship;

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

// Route::get('/', function () {
//     return view('frontend.beranda');
// });


Auth::routes(['register'=>false]);

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('categories', CategoryController::class)->except('show');
    Route::resource('posts', PostController::class);
    Route::resource('scholarships', ScholarshipController::class);
    Route::resource('downloads', DownloadController::class);
    Route::resource('monevs', MonevController::class);
    Route::resource('achievements', AchievementController::class);
    Route::resource('organizations', OrganizationController::class)->only('index','edit','update');

});

Route::get('/', [FrontController::class, 'index'])->name('beranda');
Route::get('/prestasi', [FrontController::class, 'prestasi'])->name('prestasi'); /* <-- PRESTASI REGIONAL */
Route::get('/prestasi-provinsi', [FrontController::class, 'prestasiProvinsi'])->name('prestasiProvinsi'); 
Route::get('/prestasi-nasional', [FrontController::class, 'prestasiNasional'])->name('prestasiNasional'); 
Route::get('/prestasi-internasional', [FrontController::class, 'prestasiInternasional'])->name('prestasiInternasional'); 
Route::get('/unduh', [FrontController::class, 'unduh'])->name('unduh');
Route::get('/blog', [FrontController::class, 'blog'])->name('blog');
Route::get('/monev', [FrontController::class, 'monev'])->name('monev');
Route::get('/kegiatan-mahasiswa', [FrontController::class, 'kegiatanMhs'])->name('kegiatanMhs');
Route::get('/pengembangan-karakter', [FrontController::class, 'pengembanganKarakter'])->name('pengembanganKarakter');
Route::get('/asrama', [FrontController::class, 'asrama'])->name('asrama');
Route::get('posts/{slug}/detail', [PostController::class, 'postDetail'])->name('posts.detail');
Route::get('monevs/{slug}/detail', [MonevController::class, 'monevDetail'])->name('monevs.detail');
Route::get('/beasiswa', [FrontController::class, 'beasiswa'])->name('beasiswa');
Route::get('scholarships/{slug}/detail', [ScholarshipController::class, 'scholarshipDetail'])->name('scholarship.detail');
Route::get('/prestasi/{prodi}/{peringkat}/{level}', [FrontController::class, 'daftarMahasiswa'])->name('prestasi.mahasiswa');

