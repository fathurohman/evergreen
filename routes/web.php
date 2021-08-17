<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostLowonganController;
use App\Http\Controllers\BagianController;


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

Route::get('/print', function () {
    return view('pages.print.poster');
});

Auth::routes();


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

//pelamar//
Route::get('/pelamar/{id}', [PostLowonganController::class, 'pelamar']);
Route::get('/poster/{id}', [PostLowonganController::class, 'poster']);


});
