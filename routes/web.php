<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\QuestallController; 
use App\Http\Controllers\UserController;

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

Route::get('/', [QuestallController::class, 'home']);

Route::group(['middleware' => ['auth']], function(){
Route::get('/quest/create', [QuestallController::class, 'create']);
Route::get('/quest/{questall}', [QuestallController::class ,'show']);
Route::post('/quest', [QuestallController::class, 'store']);
});

Route::group(['middleware' => ['auth']], function(){
Route::get('/mypage', [UserController::class, 'mypage'])->name('mypage')->middleware('auth');
});

Route::group(['middleware' => ['auth']], function(){
Route::get('/mypage/posts/create', [PostController::class, 'create']);
Route::post('/mypage/posts', [PostController::class, 'store']);
Route::get('/mypage/posts/{post}/edit', [PostController::class, 'edit']);
Route::put('/mypage/posts/{post}', [PostController::class, 'update']);
Route::delete('/mypage/posts/{post}', [PostController::class,'delete']);
Route::get('/mypage/posts/{post}', [PostController::class, 'show']);
});


Route::get('/dashboard', function () {    return view('dashboard');})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
