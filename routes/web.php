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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/activated', 'HomeController@activated')->name('activated');
Route::get('/activate', 'HomeController@activation')->name('activation');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/sendemail', 'SendEmailController@index')->name('sendmail');
Route::get('/store/{user}', 'SendEmailController@store')->name('activator')->middleware('signed');
Route::get('/applicants', 'ApplicanController@index')->name('applicants');
Route::post('/registration', 'ApplicanController@registration')->name('registration');
Route::get('/employ/{id}', 'ApplicanController@create')->name('employ');
