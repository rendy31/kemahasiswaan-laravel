<?php

use App\Models\front;
use App\Models\Scholarship;
use App\Models\Organization;
use App\Exports\AchievementsExport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\MonevController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\StudentActivityController;

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


Auth::routes(['register' => false]);

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('categories', CategoryController::class)->except('show');
    Route::resource('posts', PostController::class);
    Route::resource('scholarships', ScholarshipController::class);
    Route::resource('downloads', DownloadController::class)->middleware('role_or_permission:BKA|Download');
    Route::resource('monevs', MonevController::class);
    Route::resource('achievements', AchievementController::class);
    Route::get('achievement/export', [AchievementController::class, 'export'])->name('achievements.export');
    Route::resource('organizations', OrganizationController::class)->only('index', 'edit', 'update');

    Route::resource('roles', RoleController::class)->except('show');
    Route::resource('permissions', PermissionController::class)->except('show');

    Route::get('roles/{role}/permissions', [RoleController::class, 'editPermissions'])->name('roles.permissions.edit');
    Route::put('roles/{role}/permissions', [RoleController::class, 'updatePermissions'])->name('roles.permissions.update');

    Route::resource('users', UserController::class);
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');
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
Route::get('/bem', [FrontController::class, 'bem'])->name('bem');
Route::get('/hima-psik', [FrontController::class, 'himapsik'])->name('himapsik');
Route::get('/hima-fisioterapi', [FrontController::class, 'himafisioterapi'])->name('himafisioterapi');
Route::get('/hima-adminkes', [FrontController::class, 'himaadminkes'])->name('himaadminkes');
