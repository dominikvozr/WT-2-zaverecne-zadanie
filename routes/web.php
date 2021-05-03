<?php

use App\Http\Controllers\ChatsController;
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
    Route::get('/chat', [ChatsController::class, 'index']);
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
});


require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
});
