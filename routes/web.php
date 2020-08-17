<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::get('/','HomeController@index');
Route::get('/vechile','HomeController@vechile');
Route::get('/success','HomeController@success');

Route::get('/manage','DashboardController@index');

Route::get('/manage/category','CategoryController@index');
Route::get('/manage/category/create','CategoryController@create');
Route::post('/manage/category/store','CategoryController@store');
Route::get('/manage/category/edit/{id}','CategoryController@edit');
Route::post('/manage/category/update/{id}','CategoryController@update');
Route::get('/manage/category/destroy/{id}','CategoryController@destroy');

Route::get('/manage/employee','EmployeeController@index');
Route::get('/manage/employee/create','EmployeeController@create');
Route::post('/manage/employee/store','EmployeeController@store');
Route::get('/manage/employee/edit/{id}','EmployeeController@edit');
Route::post('/manage/employee/update/{id}','EmployeeController@update');
Route::get('/manage/employee/destroy/{id}','EmployeeController@destroy');


Route::get('/manage/vechile','VechileController@index');
Route::get('/manage/vechile/create','VechileController@create');
Route::post('/manage/vechile/store','VechileController@store');
Route::get('/manage/vechile/edit/{id}','VechileController@edit');
Route::post('/manage/vechile/update/{id}','VechileController@update');
Route::get('/manage/vechile/destroy/{id}','VechileController@destroy');

Route::get('/manage/condition/{id}', 'ConditionController@index');
Route::post('/manage/condition/store', 'ConditionController@store');
Route::get('/manage/condition/destroy/{id}/{vechile_id}', 'ConditionController@destroy');

