<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/latest', [PostController::class, 'latest'])->name('latest');

Route::post('/post', [PostController::class, 'post']);

Route::patch('/bucketlist/{post}/done', [PostController::class, 'done'])->name('done');

Route::get('/bucketlist', [PostController::class, 'bucketlist'])->name('bucketlist');

Route::get('/achievement', [PostController::class, 'achievement'])->name('achievement');

Route::post('/post/like', [LikeController::class, 'likePost']);

Route::get('/achievement/{post}/comment', [CommentController::class, 'comment']);

Route::post('/achievement/{post}/save', [CommentController::class, 'save']);

Route::get('/achievement/{post}/show', [CommentController::class, 'show']);

Route::get('/latest/{post}/show', [PostController::class, 'show']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
