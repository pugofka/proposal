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


Auth::routes();
//Auth::routes(); - шорткат для записей ниже
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
// Registration Routes...
//Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//Route::post('register', 'Auth\RegisterController@register');
// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return redirect('/login');
    });
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('personalPages', 'PersonalPageController');
    Route::resource('stages', 'StageController');
    Route::resource('tasks', 'TaskController');
    Route::resource('variants', 'VariantController');
    Route::resource('templates', 'TemplateController');
    Route::put('templates/{template}/edit/task-status', 'TemplateController@taskStatus')->name('templates.edit-task-status');
    Route::put('templates/{template}/edit/update-time', 'TemplateController@updateTime')->name('templates.update-time');
    //Route::put('calculations/{calculation}', 'CalculationController@Update')->middleware('auth');
    Route::get('calculations', 'CalculationController@selectTemplate');
});
Route::resource('calculations', 'CalculationController');