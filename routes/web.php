<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::resource('/post', 'TestController');

// Route::prefix('restricted')->middleware('auth')->group(function() {
//     Route::get('hello','TestController@logged')->name('private');
//     Route::resource('post', 'TestController');
// });

// Route::prefix('free-zone')->group(function () {
//     Route::get('hello', 'TestController@guest')->name('hello_free');

//     Route::get('/post', 'TestController@index')->name('post');


// });


// Route::resource('/post', 'TestController');

// Route::post('users/{id}', function ($id) {

// });

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('/posts', 'TestController');
