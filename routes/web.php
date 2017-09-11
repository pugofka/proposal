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

Route::resource('stages', 'StageController');
Route::resource('tasks', 'TaskController');
Route::resource('variants', 'VariantController');
Route::resource('calculations', 'CalculationController');
Route::resource('templates', 'TemplateController');
Route::put('templates/{template}/edit/task-status', 'TemplateController@TaskStatus')->name('templates.edit-task-status');
Route::put('templates/{template}/edit/update-time', 'TemplateController@UpdateTime')->name('templates.update-time');