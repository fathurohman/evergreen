<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostLowonganController;
use App\Http\Controllers\BagianController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\AccPelamarController;


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

Route::get('/', function () {
    return view('auth.login');
});


Auth::routes();

//Formulir Pendaftaran
Route::get('/post/form/{id}', [PostLowonganController::class, 'formindex'])->name('formindex');
Route::post('/post/form/store', [PostLowonganController::class, 'formstore'])->name('form.store');

// routes yg bisa di akses jika sudah login
Route::middleware(['auth'])->group(function () {

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('account/password', [HomeController::class, 'edit'])->name('password.edit');
Route::patch('account/password', [HomeController::class, 'update'])->name('passwords.edit');

//bagian
Route::get('/department', [BagianController::class, 'index']);
Route::post('/department/store', [BagianController::class, 'store'])->name('department.store');
Route::get('/edit_department/{id}', [BagianController::class, 'edit']);
Route::post('/update_department', [BagianController::class, 'update'])->name('department.update');


//post
Route::get('/post', [PostLowonganController::class, 'index']);
Route::post('/post/store', [PostLowonganController::class, 'store'])->name('post.store');
Route::get('/edit_post/{id}', [PostLowonganController::class, 'edit']);
Route::post('/update_post', [PostLowonganController::class, 'update'])->name('post.update');
Route::get('/delete_post/{id}', [PostLowonganController::class, 'delete']);

Route::get('/edit_imagepost/{id}', [PostLowonganController::class, 'editimage']);
Route::post('/update_imagepost', [PostLowonganController::class, 'updateimage'])->name('imagepost.update');

//posisi//
Route::get('/position/{id}', [PositionController::class, 'position']);
Route::post('/position/store', [PositionController::class, 'store'])->name('position.store');
Route::get('/edit_position/{id}', [PositionController::class, 'edit']);
Route::post('/position/update', [PositionController::class, 'update'])->name('position.update');
Route::get('/delete_position/{id}', [PositionController::class, 'delete']);


//pelamar//
Route::get('/pelamar/{id}', [PostLowonganController::class, 'pelamar']);
Route::get('/poster/{id}', [PostLowonganController::class, 'poster']);

Route::get('/acc/{id}', [PostLowonganController::class, 'acc']);
Route::get('/download_foto/{id}', [PostLowonganController::class, 'download_foto']);
Route::get('/download_cv/{id}', [PostLowonganController::class, 'download_cv']);

//acc pelamar//
Route::get('/acc_pelamar', [AccPelamarController::class, 'index']);
Route::get('/pelamar_acc/{id}', [AccPelamarController::class, 'pelamar_acc']);
Route::get('/cancel_acc/{id}', [AccPelamarController::class, 'cancel_acc']);

//searching...
Route::get('/search', [SearchController::class, 'index']);
Route::get('/search/pelamar', [SearchController::class, 'search'])->name('search.pelamar');
Route::get('/delete_pelamar/{id}', [SearchController::class, 'delete']);

});
