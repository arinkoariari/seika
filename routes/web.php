<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\QuestallController; 

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
Route::get('/blog/posts/{post}', [PostController::class, 'show']);
Route::get('/blog', [PostController::class, 'index']);
Route::get('/', [QuestallController::class, 'home']);
Route::get('/blog/posts/create', [PostController::class, 'create']);
Route::get('/mypage', function() { return view('posts/mypage');});
Route::post('/blog/posts', [PostController::class, 'store']);
Route::get('/blog/posts/{post}/edit', [PostController::class, 'edit']);
Route::put('/blog/posts/{post}', [PostController::class, 'update']);
Route::delete('/blog/posts/{post}', [PostController::class,'delete']);


//Route::get('/', [PostController::class, 'index'])->name('index')->middleware('auth');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
