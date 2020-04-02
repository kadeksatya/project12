<?php
use Carbon\Carbon;
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

Route::get('/', 'HomeUserController@index');
Route::get('/home', 'HomeUserController@index');

Auth::routes();

// Route Postingan 
Route::resource('postingan','PostController');



Route::resource('setting', 'SettingUserController');
Route::resource('label','LabelController');
Route::get('/dashboard', 'HomeController@index')->name('dashboard');

