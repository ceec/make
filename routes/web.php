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
Route::get('/counties','PageController@counties');
Route::get('/projects','PageController@projects');
Route::get('/doujin','PageController@doujin');
Route::get('/wordcount','PageController@wordcount');
Route::get('/resources','PageController@resources');
//baseline Europe
Route::get('/london','PageController@london');

//notes
Route::get('/notes','PageController@notes');
//just one
Route::get('/note/{note_id}','PageController@note');


///data!
Route::get('/data/counties','DataController@counties');
Route::get('/data/words','DataController@words');


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

//add edit note
Route::get('/home/note/add','NoteController@addDisplay');
Route::get('/home/note/edit/{note_id}','NoteController@editDisplay');
Route::get('/home/note/list','NoteController@listDisplay');
//posting
Route::post('/add/note','NoteController@add');
Route::post('/edit/note','NoteController@edit');

//to do list
Route::get('/home/tasks','TaskController@tasks');
Route::get('/home/tasks/{complete}','TaskController@tasks');

Route::post('/add/task','TaskController@add');
Route::post('/edit/task','TaskController@edit');

//purchases
Route::get('/home/purchase/add','PurchaseController@addDisplay');
Route::get('/home/purchase/edit/{purchase_id}','PurchaseController@editDisplay');
Route::get('/home/purchase/list','PurchaseController@listDisplay');
//posting
//posting
Route::post('/add/purchase','PurchaseController@add');
Route::post('/edit/purchase','PurchaseController@edit');

///books
Route::get('/home/book/add','BookController@addDisplay');
Route::get('/home/book/edit/{book_id}','BookController@editDisplay');
Route::get('/home/book/list','BookController@listDisplay');
//posting
Route::post('/home/add/book','BookController@add');
Route::post('/home/edit/book','BookController@edit');