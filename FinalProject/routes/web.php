<?php

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

// Route::get('/question', 'TumpukanMeluapController@index')->name('question.index');
// Route::get('/question/create', 'TumpukanMeluapController@create');
// Route::post('/question', 'TumpukanMeluapController@store');
// Route::get('/question/{id}', 'TumpukanMeluapController@show');
// Route::get('/question/{id}/edit', 'TumpukanMeluapController@edit');
// Route::put('/question/{id}', 'TumpukanMeluapController@update');
// Route::delete('/question/{id}', 'TumpukanMeluapController@destroy');
Route::resource('question', 'TumpukanMeluapController');
Route::resource('answer', 'AnswerController');

Route::post('/question/comment', 'TumpukanMeluapController@commentStore');
Route::get('/question/{id}', 'TumpukanMeluapController@commentGet');
Route::post('/question/{id}', 'AnswerController@answerStore');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/{pageId}', function($pageId){
//     return view('page',['pageId' => $pageId]);
//  });
//  Route::get('answers/{pageId}', 'AnswerController@index');
//  Route::post('answers', 'AnswerController@store');
//  Route::post('answers/{answerId}/{type}', 'AnswerController@update');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});