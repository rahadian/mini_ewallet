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

Route::group(array('prefix'=>'api'),function(){
    Route::resource('topup','TopupController')->middleware('jwt.verify');
});

Route::get('/api/user','UserController@index');
Route::post('/api/user','UserController@store');

Route::post('/api/register/user', 'LoginController@register');
Route::post('/api/login/user', 'LoginController@login');
Route::get('/api/logout/user', 'LoginController@logout');



