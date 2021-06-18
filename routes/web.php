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

Route::get('/wordcount','PageController@wordcount');
Route::get('/resources','PageController@resources');
Route::get('/bookshelf','PageController@bookshelf');
Route::get('/time','PageController@time');
Route::get('/music','PageController@music');

// Doujin section
Route::get('/doujin/{url}/{volume_id}','DoujinController@volume');
Route::get('/doujin/{url}','DoujinController@group');
Route::get('/doujin','DoujinController@doujin');



// Test to see if server stopped caching
Route::get('/servertest','PageController@bookshelf');

//weather endpoint
// camp connection
//Route::get('/weather','PageController@weather');
Route::get('/currentweather','PageController@currentWeather');

// Apartment stats
Route::get('/weatherapartment','PageController@weatherapartment');
Route::get('/climate','PageController@climate');

// Weather

// Grabbing the data from tempest
Route::get('/weather/getdata','WeatherController@getData');

// Weather Graphs
Route::get('/weather/data','WeatherController@data');
Route::get('/weather/data/week','WeatherController@dataWeek');

//rocks
Route::get('/rocks', 'PageController@rocks');
Route::get('rocks/{mineral_name}', 'PageController@showMinerals');

//genealogy
Route::get('/genealogy','GenealogyController@tree');

Route::get('/books','PageController@books');
Route::get('/books/type/{type}','PageController@bookTypes');
Route::get('/books/group/{group}','PageController@bookGroups');

//search books
Route::get('/books/search/{query}','PageController@bookSearch');


Route::get('/caterpillars','PageController@caterpillars');
//baseline Europe
Route::get('/london','PageController@london');
//use
Route::get('/use','PageController@use');

//notes
Route::get('/notes','PageController@notes');
//just one
Route::get('/note/{note_id}','PageController@note');

//queues
Route::get('/queue','PageController@queues');


///data!
Route::get('/data/counties','DataController@counties');
Route::get('/data/words','DataController@words');
Route::get('/data/grid/{project_id}','DataController@grid');


// spotify testing
Route::get('/spotify','SpotifyController@test');

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
Route::get('/home/tasks/project','TaskController@tasksByProject');
Route::get('/home/tasks/{complete}','TaskController@tasks');

//one specific task
Route::get('/home/task/{task_id}','TaskController@task');

Route::post('/add/task','TaskController@add');
Route::post('/edit/task','TaskController@edit');
Route::post('/task/move','TaskController@move');
Route::post('/add/task/note','TaskController@addNote');

// Daily tasks
Route::post('/edit/dailytask','TaskController@editDailyTask');

// Chores
Route::get('/home/chores','ChoreController@chores');
Route::post('/edit/choreday','ChoreController@editChoreDay');

//purchases
Route::get('/home/purchase/add','PurchaseController@addDisplay');
Route::get('/home/purchase/edit/{purchase_id}','PurchaseController@editDisplay');
Route::get('/home/purchase/list','PurchaseController@listDisplay');
//posting
Route::post('/add/purchase','PurchaseController@add');
Route::post('/edit/purchase','PurchaseController@edit');

//stores
Route::get('/home/store/add','StoreController@addDisplay');
Route::get('/home/store/edit/{store_id}','StoreController@editDisplay');
Route::get('/home/store/list','StoreController@listDisplay');
//posting
Route::post('/add/store','StoreController@add');
Route::post('/edit/store','StoreController@edit');

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

//wordcount
Route::get('/home/wordcount','HomeController@wordcount');
Route::post('/home/wordcount/update','HomeController@wordcountUpdate');

//rocks
//Minerals
Route::get('/home/mineral/add','MineralController@addDisplay');
Route::get('/home/mineral/edit/{mineral_id}','MineralController@editDisplay');
Route::get('/home/mineral/list','MineralController@listDisplay');
//posting
Route::post('/home/add/mineral','MineralController@add');
Route::post('/home/edit/mineral','MineralController@edit');

//Item
Route::get('/home/item/add','ItemController@addDisplay');
Route::get('/home/item/edit/{item_id}','ItemController@editDisplay');
Route::get('/home/item/list','ItemController@listDisplay');
//posting
Route::post('/home/add/item','ItemController@add');
Route::post('/home/edit/item','ItemController@edit');

// Music
// Artist
Route::get('/home/artist/add','ArtistController@addDisplay');
Route::get('/home/artist/edit/{artist_id}','ArtistController@editDisplay');
Route::get('/home/artist/list','ArtistController@listDisplay');
//posting
Route::post('/home/add/artist','ArtistController@add');
Route::post('/home/edit/artist','ArtistController@edit');

// Album
Route::get('/home/album/add','AlbumController@addDisplay');
Route::get('/home/album/edit/{album_id}','AlbumController@editDisplay');
Route::get('/home/album/list','AlbumController@listDisplay');
//posting
Route::post('/home/add/album','AlbumController@add');
Route::post('/home/edit/album','AlbumController@edit');

// Songs
Route::get('/home/song/add','SongController@addDisplay');
Route::get('/home/song/edit/{song_id}','SongController@editDisplay');
Route::get('/home/song/list','SongController@listDisplay');
//posting
Route::post('/home/add/song','SongController@add');
Route::post('/home/edit/song','SongController@edit');

// Qs
Route::get('/home/queue/add','QueueController@addDisplay');
Route::get('/home/queue/edit/{queue_id}','QueueController@editDisplay');
Route::get('/home/queue/list','QueueController@listDisplay');
//posting
Route::post('/home/add/queue','QueueController@add');
Route::post('/home/edit/queue','QueueController@edit');