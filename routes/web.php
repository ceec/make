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

Route::get('/', 'PageController@index');


///everything is a link!
Route::get('/category/{category}','PageController@category');
Route::get('/project/{project}','PageController@project');
Route::get('/tag/{tag}','PageController@tag');
Route::get('/tool/{tool}','PageController@tool');


//specific pages
Route::get('/movies','PageController@movies');
Route::get('/chelsea','PageController@chelsea');
Route::get('/manga','PageController@manga');
//baseline Europe
Route::get('/london','PageController@london');


///authentication
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//add edit blog
Route::get('/home/blog/add','BlogController@addDisplay');
Route::get('/home/blog/edit/{blog_id}','BlogController@editDisplay');
Route::get('/home/blog/list','BlogController@listDisplay');
//posting
Route::post('/add/blog','BlogController@add');
Route::post('/edit/blog','BlogController@edit');