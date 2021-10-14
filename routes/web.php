<?php

use Illuminate\Support\Facades\Route;

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
    return redirect('/home');
});


Auth::routes();

Route::get('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.show');
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

Route::get('/p/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');
Route::post('/p', [App\Http\Controllers\PostController::class, 'store']);

Route::post('/cmt/{post}', [App\Http\Controllers\CommentController::class, 'store']);

Route::get('/home', [App\Http\Controllers\MainController::class, 'index'])->name('main.show');