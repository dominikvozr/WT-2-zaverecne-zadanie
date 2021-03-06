<?php

use App\Http\Controllers\ChatsController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\TestsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//URL::forceScheme('https');
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware( 'auth:api' )->group( function () {
    Route::get( '/user', function ( Request $request ) { return $request->user(); });

} );
