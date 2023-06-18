<?php

require __DIR__.'/auth.php';

use App\Http\Controllers\AccountController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ImageController;;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SoliloquyController;
use App\Models\Soliloquy;

;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
Route::get('/image', [ImageController::class, 'index']);
Route::get('/image/upload', [ImageController::class, 'upload'])->middleware('auth');
Route::post('/image/upload', [ImageController::class, 'confirm'])->middleware('auth');
Route::get('/image/edit/{id}', [ImageController::class, 'edit'])->middleware('auth');
Route::post('/image/edit/{id}', [ImageController::class, 'update'])->middleware('auth');
Route::post('/image/delete/{id}', [ImageController::class, 'delete'])->middleware('auth');
Route::get('/image/list', [ImageController::class, 'list']);
Route::get('/image/{id}', [ImageController::class, 'detail']);
*/

Route::get('/home/edit', [HomeController::class, 'edit'])->middleware('auth');
Route::post('/home/edit', [HomeController::class, 'update'])->middleware('auth');
Route::get('/home', [HomeController::class, 'index'])->middleware('auth');

Route::get('/account/name/{name}', [AccountController::class, 'account_name']);
Route::get('/account/{id}', [AccountController::class, 'account']);
Route::get('/account', [AccountController::class, 'index']);

Route::get('/soliloquy', [SoliloquyController::class, 'index']);
Route::get('/soliloquy/{id}', [SoliloquyController::class, 'detail']);