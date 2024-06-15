<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogController;
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

Route::view('/', 'auth.login');

Auth::routes();
Route::resource('logs', LogController::class);
Route::post('logs/{log}/approve', [LogController::class, 'approve'])->name('logs.approve');
Route::post('logs/{log}/reject', [LogController::class, 'reject'])->name('logs.reject');
Route::get('logs/{log}', [LogController::class, 'show'])->name('logs.show');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
