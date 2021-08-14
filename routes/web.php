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

Auth::routes();


// routes yg bisa di akses jika sudah login
Route::middleware(['auth'])->group(function () {

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('account/password', [HomeController::class, 'edit'])->name('password.edit');
Route::patch('account/password', [HomeController::class, 'update'])->name('passwords.edit');

//bagian
Route::get('/bagian', [BagianController::class, 'index']);
Route::post('/bagian/store', [BagianController::class, 'store'])->name('bagian.store');
Route::get('/edit_bagian/{id}', [BagianController::class, 'edit']);
Route::post('/update_bagian', [BagianController::class, 'update'])->name('bagian.update');


//post
Route::get('/post', [PostLowonganController::class, 'index']);
Route::post('/post/store', [PostLowonganController::class, 'store'])->name('post.store');
Route::get('/edit_post/{id}', [PostLowonganController::class, 'edit']);
Route::post('/update_post', [PostLowonganController::class, 'update'])->name('post.update');




});
