<?php

use App\Http\Controllers\AuthController;
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
})->name('home');

Route::get('login', [AuthController::class,'login'])->name('login');     //login adında sayfa, login adında views
Route::post('login', [AuthController::class,'login'])->name('login');

Route::get('register', [AuthController::class,'register'])->name('register');     //register adında sayfa, register adında views
Route::post('register', [AuthController::class,'register'])->name('register');

Route::post('logout', [AuthController::class,'logout'])->name('logout');
Route::get('logout', [AuthController::class,'logout'])->name('logout');