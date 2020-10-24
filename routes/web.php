<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\SoalController;
use App\Http\Controllers\Admin\DataSoalController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\AnswerController;

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
Route::group(
    ['namespace'=>'Admin','prefix'=>'admin'],
    function(){
        Route::get('dashboard', [DashboardController::class, 'index']);
        // Route::get('siswa', [PostController::class, 'index']);
        // Route::get('datasoal',[AlgoritmaController::class, 'index']);
    }
);
// Route::resource('admin/siswa',PostController::class);
// Route::resource('admin/soal',SoalController::class);
// Route::resource('admin/datasoal',DataSoalController::class);
Route::resource('admin/question',QuestionController::class);
Route::resource('admin/answer',AnswerController::class);


