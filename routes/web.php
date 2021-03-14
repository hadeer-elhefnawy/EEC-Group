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
Route::get('/homepage', function () {
    return view('home/homepage');
})->name('homepage');
Route::resource('products','ProductController');

Route::resource('orders','OrderController');

///////////////////  ///////////////////////////////////////
Route::resource('departments','DepartmentController');

Route::resource('sections','SectionController');

Route::resource('category','CategoryController');

Route::resource('items','ItemController');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
