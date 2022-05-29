<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\TestController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Auth::routes();
Route::get('/moderator', 'ModeratorController@index')->name('moderator')->middleware('moderator');
Route::get('/administrator', 'AdministratorController@index')->name('administrator')->middleware('administrator');

require __DIR__.'/auth.php';

//Route::get('/questions/create', [QuestionController::class, 'create'])->name('createQuestion');
//Route::post('/questions/create', [QuestionController::class, 'store'])->name('storeQuestion');



Route::resource('questions', QuestionController::class);
Route::resource('tests', TestController::class);
//Route::get('/tests/randomTest', TestController::class, '__randomTest');
Route::post('/open', [TestController::class, 'randomTest'])->name('newTest');
