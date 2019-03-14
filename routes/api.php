<?php

use Illuminate\Http\Request;

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

Route::post('login','PassportController@login');
Route::post('register','PassportController@register');

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('get-details','PassportController@getDetails');
    Route::put('changeMod0','UserController@changeMod0');
    Route::post('get-course','CourseController@getCourse');
    Route::get('tests','TestController@index');
    Route::get('test/{id}','TestController@show');
    Route::post('test','TestController@store');
    Route::put('test','TestController@edit');
    Route::delete('test/{id}','TestController@destroy');
    Route::post('showleaderboard','LeaderboardController@show');
    Route::put('leaderboardupdate','LeaderboardController@update');
    Route::post('leaderboardstore','LeaderboardController@store');
    Route::get('ranking','LeaderboardController@index');
    Route::post('leaderboard','LeaderboardController@leaderboard');
    Route::post('measurement','MeasurementController@consult');
    Route::post('answer','AnswerController@store');
    Route::post('showanswers','AnswerController@showAnswers');
    Route::get('item','ItemController@index');
    Route::post('showItems','ItemController@showItems');
    Route::post('attachItem','ItemController@attachItem');
    Route::get('medal','MedalController@index');
    Route::post('showMedals','MedalController@showMedals');
    Route::post('attachMedal','MedalController@attachMedal');


});

Route::get('users','UserController@users');

