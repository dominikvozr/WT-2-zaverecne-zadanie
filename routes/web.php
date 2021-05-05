<?php

use App\Http\Controllers\ChatsController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TeachersController;
use Illuminate\Support\Facades\Route;
//URL::forceScheme('https');
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



Route::middleware('auth')->group(function () {
    //Route::get('/chat', [ChatsController::class, 'index']);
    Route::get('/dashboard', [TeachersController::class, 'index'])->name('dashboard');
    Route::get('/tests', [TeachersController::class, 'tests'])->name('dashboard');
});


require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
});

Route::get('/student/login', [StudentsController::class, 'login']);
