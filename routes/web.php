<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Auth\RegisteredUserController;


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

/*
Route::get('/questions/mng', function () {
    return view('questions.mng');
})->middleware(['auth'])->name('questions.mng');

*/

//Route::get('questions/mng', [QuestionController::class],'mng')->name('questions.mng');

Route::get('questions/mng', 'App\Http\Controllers\QuestionController@mng')->name('questions.mng')->middleware('auth');
Route::get('users/mng', 'App\Http\Controllers\Auth\RegisteredUserController@mng')->name('users.mng')->middleware('auth');
Route::get('users/edit/{id}', 'App\Http\Controllers\Auth\RegisteredUserController@edit')->name('users.edit')->middleware('auth');

Route::patch('users/{id}',['as'=>'users.update','uses'=>'App\Http\Controllers\Auth\RegisteredUserController@update'])->middleware('auth');

Route::resource('questions', QuestionController::class, [
    'names' => ([

        'index'     => 'questions.index',
        'create'    => 'questions.create',
        'store'     => 'questions.store',
        'destroy'    => 'questions.destroy'

    ])
])->middleware('auth');

Route::resource('users', App\Http\Controllers\Auth\RegisteredUserController::class, [
    'names' => ([
        'destroy'    => 'users.destroy'

    ])
])->middleware('auth');



Route::resource('tests', TestController::class, [
    'names' => [
        'index' => 'tests.index',
    ]
])->middleware('auth');


//Route::resource('tests', TestController::class);
//Route::get('/tests/randomTest', TestController::class, '__randomTest');

Route::post('/open', [TestController::class, 'randomTest'])->name('newTest')->middleware('auth');
Route::post('/submitTest', [TestController::class, 'submitTest'])->name('submitTest')->middleware('auth');
//Route::get('/tests/view', [TestController::class, 'show'])->name('submitTest');
