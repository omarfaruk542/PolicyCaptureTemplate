<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyInfoController;

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
    if(!Auth::check()){
        return view('auth.login');
    } else {
        return view('home');
    }

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/company', 'CompanyInfoController');
Route::get('/user','Auth\UserController@index')->name('user.index');
Route::get('/user/create','Auth\UserController@create')->name('user.create');
