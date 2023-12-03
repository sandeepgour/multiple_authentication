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

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/admin', 'AdminController@index')->name('admin')->middleware('admin');
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['admin']], function () {
    Route::get('/', 'AdminController@index');
});

//subdomain routine
Route::domain('{subdomain}.'.config('app.short_url'))->group(function () {
    //Route::get('/', 'UsersController@index');
    Route::group(['prefix' => 'user', 'as' => 'user.', 'middleware' => ['user']], function () {
        Route::get('/', 'UsersController@index');
    });
});

// Route::get('/user', 'UsersController@index')->name('user')->middleware('user');
 Route::get('/student', 'StudentController@index')->name('student')->middleware('student');
