<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\MonevController;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\StudentActivityController;
use App\Models\front;

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

    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/{category}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');

    Route::get('/post', [PostController::class, 'index'])->name('post.index');
    Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/post', [PostController::class, 'store'])->name('post.store');
    Route::get('/post/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::get('/post/{post:slug}', [PostController::class, 'show'])->name('post.show');
    Route::put('/post/{post}', [PostController::class, 'update'])->name('post.update');
    Route::delete('/post/{post}', [PostController::class, 'destroy'])->name('post.destroy');

    Route::get('/post', [ScholarshipController::class, 'index'])->name('scholarship.index');
    Route::get('/scholarship/create', [ScholarshipController::class, 'create'])->name('scholarship.create');
    Route::post('/scholarship', [ScholarshipController::class, 'store'])->name('scholarship.store');
    Route::get('/scholarship/{scholarship}/edit', [ScholarshipController::class, 'edit'])->name('scholarship.edit');
    Route::get('/scholarship/{scholarship:slug}', [ScholarshipController::class, 'show'])->name('scholarship.show');
    Route::put('/scholarship/{scholarship}', [ScholarshipController::class, 'update'])->name('scholarship.update');
    Route::delete('/scholarship/{scholarship}', [ScholarshipController::class, 'destroy'])->name('scholarship.destroy');

    Route::get('/kegiatan-mahasiswa', [StudentActivityController::class, 'index'])->name('kegiatan-mahasiswa.index');
    Route::get('/kegiatan-mahasiswa/create', [StudentActivityController::class, 'create'])->name('kegiatan-mahasiswa.create');
    Route::post('/kegiatan-mahasiswa', [StudentActivityController::class, 'store'])->name('kegiatan-mahasiswa.store');
    Route::get('/kegiatan-mahasiswa/{studentActivity}/edit', [StudentActivityController::class, 'edit'])->name('kegiatan-mahasiswa.edit');
    Route::put('/kegiatan-mahasiswa/{studentActivity}', [StudentActivityController::class, 'update'])->name('kegiatan-mahasiswa.update');
    Route::delete('/kegiatan-mahasiswa/{studentActivity}', [StudentActivityController::class, 'destroy'])->name('kegiatan-mahasiswa.destroy');
    Route::get('/kegiatan-mahasiswa/{studentActivity:slug}', [StudentActivityController::class, 'show'])->name('kegiatan-mahasiswa.show');

    Route::get('/monevs', [MonevController::class, 'index'])->name('monev.index');
    Route::get('/monev/create', [MonevController::class, 'create'])->name('monev.create');
    Route::post('/monev', [MonevController::class, 'store'])->name('monev.store');
    Route::get('/monev/{monev}/edit', [MonevController::class, 'edit'])->name('monev.edit');
    Route::put('/monev/{monev}', [MonevController::class, 'update'])->name('monev.update');
    Route::delete('/monev/{monev}', [MonevController::class, 'destroy'])->name('monev.destroy');

    Route::get('/download', [DownloadController::class, 'index'])->name('download.index');
    Route::get('/download/create', [DownloadController::class, 'create'])->name('download.create');
    Route::post('/download', [DownloadController::class, 'store'])->name('download.store');
    Route::get('/download/{download}/edit', [DownloadController::class, 'edit'])->name('download.edit');
    Route::put('/download/{download}', [DownloadController::class, 'update'])->name('download.update');
    Route::delete('/download/{download}', [DownloadController::class, 'destroy'])->name('download.destroy');
    Route::get('/storage/{filename}', [DownloadController::class, 'download'])->name('file.download');
});

Route::get('/', [FrontController::class, 'index'])->name('beranda');
Route::get('/prestasi', [FrontController::class, 'prestasi'])->name('prestasi'); /* <-- PRESTASI REGIONAL */
Route::get('/prestasiProvinsi', [FrontController::class, 'prestasiProvinsi'])->name('prestasiProvinsi'); 
Route::get('/prestasiNasional', [FrontController::class, 'prestasiNasional'])->name('prestasiNasional'); 
Route::get('/prestasiInternasional', [FrontController::class, 'prestasiInternasional'])->name('prestasiInternasional'); 
Route::get('/downloadfile', [FrontController::class, 'downloadfile'])->name('downloadfile');
Route::get('/blog', [FrontController::class, 'blog'])->name('blog');
Route::get('/monev', [FrontController::class, 'monev'])->name('monev');
Route::get('/kegiatanMhs', [FrontController::class, 'kegiatanMhs'])->name('kegiatanMhs');

Route::middleware('auth')->group(function () {
    Route::get('/achievement', [AchievementController::class, 'index'])->name('achievement.index');
    Route::get('/achievement/create', [AchievementController::class, 'create'])->name('achievement.create');
    Route::post('/achievement', [AchievementController::class, 'store'])->name('achievement.store');
    Route::get('/achievement/{achievement}/edit', [AchievementController::class, 'edit'])->name('achievement.edit');
    Route::put('/achievement/{achievement}', [AchievementController::class, 'update'])->name('achievement.update');
    Route::delete('/achievement/{achievement}', [AchievementController::class, 'destroy'])->name('achievement.destroy');
    Route::get('/{achievement}', [AchievementController::class, 'download'])->name('achievement.download');
});