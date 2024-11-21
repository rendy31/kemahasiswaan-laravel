<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\FrontendController;

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

// Route::get('/prestasi', function () {
//     return view('prestasi');
// });

Auth::routes(['register'=>false]);

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
Route::put('/post/{post}', [PostController::class, 'update'])->name('post.update');
Route::delete('/post/{post}', [PostController::class, 'destroy'])->name('post.destroy');

Route::get('/download', [DownloadController::class, 'index'])->name('download.index');
Route::get('/download/create', [DownloadController::class, 'create'])->name('download.create');
Route::post('/download', [DownloadController::class, 'store'])->name('download.store');
Route::get('/download/{download}/edit', [DownloadController::class, 'edit'])->name('download.edit');
Route::put('/download/{download}', [DownloadController::class, 'update'])->name('download.update');
Route::delete('/download/{download}', [DownloadController::class, 'destroy'])->name('download.destroy');
Route::get('/storage/{filename}', [DownloadController::class, 'download'])->name('file.download');

Route::get('/achievement', [AchievementController::class, 'index'])->name('achievement.index');
Route::get('/achievement/create', [AchievementController::class, 'create'])->name('achievement.create');
Route::post('/achievement', [AchievementController::class, 'store'])->name('achievement.store');
Route::get('/achievement/{achievement}/edit', [AchievementController::class, 'edit'])->name('achievement.edit');
Route::put('/achievement/{achievement}', [AchievementController::class, 'update'])->name('achievement.update');
Route::delete('/achievement/{achievement}', [AchievementController::class, 'destroy'])->name('achievement.destroy');
Route::get('/{achievement}', [AchievementController::class, 'download'])->name('achievement.download');


Route::get('/page', [CategoryController::class, 'page'])->name('page.index');