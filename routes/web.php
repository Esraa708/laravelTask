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
// Route::resource('articles', 'ArticleController');
Route::get('articles', 'ArticleController@index');
Route::post('articles', 'ArticleController@store')->middleware('auth');
Route::put('articles/{id}', 'ArticleController@update')->middleware('auth');
Route::delete('articles/{id}', 'ArticleController@destroy')->middleware('auth');
Route::get('categories', 'CategoryController@index');
Route::get('categories/{id}', 'CategoryController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
