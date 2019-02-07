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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/contact','MailController@contact');

Route::group(['middleware' => 'auth'], function () {
    Route::get('showForm','TestController@showForm')->name('showForm');
    Route::post('searchCourse','TestController@searchCourse')->name('searchCourse');
    Route::post('searchEvaluation','EvaluationController@searchEvaluation')->name('searchEvaluation');
    Route::get('showTestText','TestController@showTestText')->name('showTestText');
    Route::resource('course','CourseController');
    Route::resource('college','CollegeController');
    Route::get('selectCourse','EvaluationController@selectCourse')->name('selectCourse');
    Route::post('uno','EvaluationController@uno')->name('uno');
    Route::resource('evaluation','EvaluationController');
    Route::get('timeline/{id}','CourseController@timeline')->name('timeline');
    Route::get('showcourse/{id}','UserController@showcourse')->name('showcourse');
    Route::post('add','UserController@add')->name('user.add');
    Route::post('mod1','CourseController@mod1')->name('mod1');
    Route::post('mod2','CourseController@mod2')->name('mod2');
    Route::post('mod3','CourseController@mod3')->name('mod3');
    Route::post('mod4','CourseController@mod4')->name('mod4');
    Route::post('mod5','CourseController@mod5')->name('mod5');
    Route::post('mod6','CourseController@mod6')->name('mod6');
    Route::post('mod7','CourseController@mod7')->name('mod7');
    Route::post('mod8','CourseController@mod8')->name('mod8');
    Route::resource('user','UserController');
    Route::get('adduseradm','UserController@addadm')->name('adduseradm');
    Route::post('storeadm','UserController@storeadm')->name('storeadm');
    Route::get('addusertutor','UserController@addtutor')->name('addusertutor');
    Route::post('storetutor','UserController@storetutor')->name('storetutor');
    Route::get('showadm','UserController@showadm')->name('showadm');
    Route::get('showtutor','UserController@showtutor')->name('showtutor');
    Route::get('editadm/{id}','UserController@editadm')->name('editadm');
    Route::get('edittutor/{id}','UserController@edittutor')->name('edittutor');
    Route::put('updateadm/{user}','UserController@updateadm')->name('updateadm');
    Route::put('updatetutor/{user}','UserController@updatetutor')->name('updatetutor');
    Route::delete('deleteadm/{user}','UserController@deleteadm')->name('deleteadm');
    Route::delete('deletetutor/{user}','UserController@deletetutor')->name('deletetutor');
    Route::post('changeMod','CourseController@changeMod')->name('changeMod');
    Route::get('download',function (){
        return view('downloads.index');
    });
    Route::get('tutorials',function (){
        return view('tutorials.index');
    });
    Route::get('createsug','SuggestionController@create')->name('suggestion.create');
    Route::post('storesug','SuggestionController@store')->name('suggestion.store');
    Route::get('indexsug','SuggestionController@index')->name('suggestion.index');
    Route::delete('destroysug/{suggestion}','SuggestionController@destroy')->name('suggestion.destroy');
    Route::get('showsug/{suggestion}','SuggestionController@show')->name('suggestion.show');
    Route::resource('measurement','MeasurementController');
    Route::post('measurement/inactive/{measurement}','MeasurementController@inactive')->name('measurement.inactive');
});
