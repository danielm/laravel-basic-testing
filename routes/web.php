<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;

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

Route::redirect('/', 'tags');

Route::resource('/tags', TagController::class)->only(['index', 'store', 'destroy']);

Route::view('profile', 'profile')->name('profile');

Route::post('profile', [ProfileController::class, 'upload'])->name('upload');