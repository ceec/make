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
Route::get('/books','PageController@books');
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

///volumes
Route::get('/home/book/add','BookController@addDisplay');
Route::get('/home/book/edit/{book_id}','BookController@editDisplay');
Route::get('/home/book/list','BookController@listDisplay');
//posting
Route::post('/home/add/book','BookController@add');
Route::post('/home/edit/book','BookController@edit');

///volumes
Route::get('/home/volume/add','VolumeController@addDisplay');
Route::get('/home/volume/edit/{volume_id}','VolumeController@editDisplay');
Route::get('/home/volume/list','VolumeController@listDisplay');
//posting
Route::post('/home/add/volume','VolumeController@add');
Route::post('/home/edit/volume','VolumeController@edit');


///groups
Route::get('/home/group/add','GroupController@addDisplay');
Route::get('/home/group/edit/{group_id}','GroupController@editDisplay');
Route::get('/home/group/list','GroupController@listDisplay');
//posting
Route::post('/home/add/group','GroupController@add');
Route::post('/home/edit/group','GroupController@edit');

//authors
Route::get('/home/author/add','AuthorController@addDisplay');
Route::get('/home/author/edit/{author_id}','AuthorController@editDisplay');
Route::get('/home/author/list','AuthorController@listDisplay');
//posting
Route::post('/home/add/author','AuthorController@add');
Route::post('/home/edit/author','AuthorController@edit');

//publishers
Route::get('/home/publisher/add','PublisherController@addDisplay');
Route::get('/home/publisher/edit/{publisher_id}','PublisherController@editDisplay');
Route::get('/home/publisher/list','PublisherController@listDisplay');
//posting
Route::post('/home/add/publisher','PublisherController@add');
Route::post('/home/edit/publisher','PublisherController@edit');

//types
Route::get('/home/type/add','TypeController@addDisplay');
Route::get('/home/type/edit/{type_id}','TypeController@editDisplay');
Route::get('/home/type/list','TypeController@listDisplay');
//posting
Route::post('/home/add/type','TypeController@add');
Route::post('/home/edit/type','TypeController@edit');

//projects
Route::get('/home/project/add','ProjectController@addDisplay');
Route::get('/home/project/edit/{type_id}','ProjectController@editDisplay');
Route::get('/home/project/list','ProjectController@listDisplay');
//posting
Route::post('/home/add/project','ProjectController@add');
Route::post('/home/edit/project','ProjectController@edit');