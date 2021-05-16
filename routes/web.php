<?php

use App\Http\Controllers\ExamsController;
use App\Http\Controllers\ExportsController;
use App\Http\Controllers\ImageAccessController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\TestsController;
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
    Route::get('/dashboard', [TeachersController::class, 'index'])->name('dashboard');
    Route::get('/test', [TeachersController::class, 'tests'])->name('tests');
    Route::get('/tests/live', [TeachersController::class, 'testsLive'])->name('tests.live');
    Route::get('/tests/live/{id}', [TeachersController::class, 'testsLiveStudents'])->name('tests.live.students');
    Route::get('/test/detail/{id}', [TestsController::class, 'detail'])->name('test.detail');
    Route::get('/test/answers/{id}', [TestsController::class, 'answers'])->name('test.answers');
    Route::get('/student/answers/{id}', [TestsController::class, 'studentAnswers'])->name('test.student.answers');

    Route::get('/test/export/csv/{id}', [ExportsController::class, 'csv'])->name('csv');
    Route::get('/test/export/pdf/{id}', [ExportsController::class, 'pdf'])->name('pdf');

    //API
    Route::put('/update/test/activity', [TestsController::class, 'changeActivation']);
    Route::put('/update/test/points', [TeachersController::class, 'updatePoints']);
    Route::post('/store/test', [TestsController::class, 'store']);


});

Route::get ('/', function () { return redirect('login'); })->name('home');
Route::get ('/technical', function () { return view('technical'); })->name('technical');
Route::post('/student/login', [StudentsController::class, 'login'])->name('student.login');
Route::get ('/exam/{code}', [StudentsController::class, 'exam'])->name('exam');

//serve images
Route::get('/image/serve/{image}', [ImageAccessController::class, 'serve'])->name('image');

//API
Route::post('/store/exam', [ExamsController::class, 'store']);
Route::post('/store/cheat', [StudentsController::class, 'studentCheat']);

require __DIR__.'/auth.php';

