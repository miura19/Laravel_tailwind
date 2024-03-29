<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['prefix' => 'post','middleware' => 'auth'], function () {
    Route::get('create',[PostController::class,'create'])->name('post.create');
    Route::post('store',[PostController::class,'store'])->name('post.store');
    Route::get('index',[PostController::class,'index'])->name('post.index');
    Route::get('show/{post}',[PostController::class,'show'])->name('post.show');
    Route::get('edit/{post}',[PostController::class,'edit'])->name('post.edit');
    Route::patch('update/{post}',[PostController::class,'update'])->name('post.update');
    Route::delete('delete/{post}',[PostController::class,'destroy'])->name('post.destroy');
    Route::post('comment/store',[CommentController::class,'store'])->name('comment.store');
});

require __DIR__.'/auth.php';
