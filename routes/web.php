<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/message/create', [App\Http\Controllers\MessageController::class, 'create'])->name('message.create');
Route::post('/message/store', [App\Http\Controllers\MessageController::class, 'store'])->name('message.store');
Route::get('/message/edit/{message}', [App\Http\Controllers\MessageController::class, 'edit'])->name('message.edit');
Route::put('/message/update/{message}', [App\Http\Controllers\MessageController::class, 'update'])->name('message.update');
Route::delete('/message/destroy/{message}', [App\Http\Controllers\MessageController::class, 'destroy'])->name('message.destroy');