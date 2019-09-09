<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Project;
use App\Projectstep;
use App\Projectsteptool;
use App\Category;
use App\Tag;
use App\Tool;
use App\Movie;
use App\Volume;
use App\Group;
use App\Pairing;
use App\Note;
use App\Resource;
use App\Book;
use App\Caterpillar;
use App\Type;
//rocks
use App\Mineral;
use App\Item;

use App\Weather;

class PageController extends Controller{
    /**
     * Display the homepage.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $steps = Projectstep::orderBy('completed_at','desc')->get();

        return  view('pages.index')
        ->with('steps',$steps);
    }


    /**
     * Display the selected categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function category($category){
        //can pass through an id or an url
        if (ctype_digit($category)){
            $category = Category::where('id','=',$category)->first();
        } else {
            $category = Category::where('name','=',$category)->first();
        }

        //when bad url is passed
        if (empty($category)) {
            //want to go to 404 page 
            abort(404);
        }  

        //have the category, now get all projects in that category
        //great have to do a join
        //SELECT projectsteps.* FROM projects,projectsteps WHERE projects.category_id=category AND projects.project_id = projectsteps.project_id
        // $card = new Card;
        // $fivestarcardsq = $card->select('cards.*')->join('usercards','usercards.card_id','=','cards.id')->whereRaw("cards.stars='5'")->whereRaw('usercards.user_id = '.$user->id)->orderBy('usercards.created_at','desc');
        // $fivestarcards = $fivestarcardsq->get();


        $steps = new Projectstep;
        $steps = $steps->select('projectsteps.*')->join('projects','projects.id','=','projectsteps.project_id')->where('projects.category_id','=',$category->id)->orderBy('projectsteps.completed_at','desc')->get();



       // $projects = Category::all();

        return  view('pages.index')
        ->with('steps',$steps);
    }


    /**
     * Display the selected projects.
     *
     * @return \Illuminate\Http\Response
     */
    public function project($project)
    {
        //can pass through an id or an url
        if (ctype_digit($project)){
            $project = Project::where('id','=',$project)->first();
        } else {
            $project = Project::where('url','=',$project)->first();
        }

        //when bad url is passed
        if (empty($project)) {
            //want to go to 404 page 
            abort(404);
        }  


            $steps = Projectstep::where('project_id','=',$project->id)->orderBy('completed_at','DESC')->get();

       // $projects = Category::all();

        return  view('pages.index')
        ->with('project',$project)
        ->with('steps',$steps);
    }


    /**
     * Display the selected tags.
     *
     * @return \Illuminate\Http\Response
     */
    public function tag($tag)
    {
        //can pass through an id or an url
        if (ctype_digit($tag)){
            $tag = Tag::where('id','=',$tag)->first();
        } else {
            $tag = Tag::where('name','=',$tag)->first();
        }

        //when bad url is passed
        if (empty($tag)) {
            //want to go to 404 page 
            abort(404);
        }  

        //okay these are NO ITS A SINGLE join
        //SELECT projectsteps.* FROM projectsteptags,projectsteps WHERE projectsteps.id = projectsteptags.project_id AND projectsteptags.tag_id = TAG_ID


        $steps = new Projectstep;
        $steps = $steps->select('projectsteps.*')->join('projectsteptags','projectsteptags.projectstep_id','=','projectsteps.id')->where('projectsteptags.tag_id','=',$tag->id)->get();


        return  view('pages.index')
        ->with('steps',$steps);
    }

    /**
     * Display the selected tools.
     *
     * @return \Illuminate\Http\Response
     */
    public function tool($tool)
    {
        //can pass through an id or an url
        if (ctype_digit($tool)){
            $tool = Tool::where('id','=',$tool)->first();
        } else {
            //deal with spaces
            $tool = str_replace('-',' ', $tool);
            $tool = Tool::where('name','=',$tool)->first();
        }

        //when bad url is passed
        if (empty($tool)) {
            //want to go to 404 page 
            abort(404);
        }  

        //okay these are NO ITS A SINGLE join
        //SELECT projectsteps.* FROM projectsteptags,projectsteps WHERE projectsteps.id = projectsteptags.project_id AND projectsteptags.tag_id = TAG_ID


        $steps = new Projectstep;
        $steps = $steps->select('projectsteps.*')->join('projectsteptools','projectsteptools.projectstep_id','=','projectsteps.id')->where('projectsteptools.tool_id','=',$tool->id)->get();


        return  view('pages.index')
        ->with('steps',$steps);
    } 


    /////specific pages   
    /**
     * Movie List
     *
     * @return \Illuminate\Http\Response
     */
    public function movies(){
        $movies = Movie::orderBy('time','desc')->get();

        return  view('pages.movies')
        ->with('movies',$movies);
    }    



     /**
     * Notes
     *
     * @return \Illuminate\Http\Response
     */
    public function notes(){
        $notes = Note::all();

        return  view('pages.notes')
        ->with('notes',$notes);
    }       

     /**
     * Note
     *
     * @return \Illuminate\Http\Response
     */
    public function note($note_id){
        $note = Note::find($note_id);

        return  view('pages.note')
        ->with('note',$note);
    }  


    ///writing
     /**
     * writing
     *
     * @return \Illuminate\Http\Response
     */
    public function wordcount(){
        //get the total wordcount per story.
       //so just want last one from each story, then add those all up

        //https://stackoverflow.com/questions/5554075/mysql-get-last-distinct-set-of-records
        //SELECT * FROM wordcounts WHERE id IN (SELECT MAX(id) FROM wordcounts GROUP BY document_id)
        
        $total = DB::select('SELECT sum(count) as total FROM writing.wordcounts WHERE id IN (SELECT MAX(id) FROM writing.wordcounts GROUP BY document_id)');

        $total = $total[0]->total;


        return view('pages.wordcount')
        ->with('total',$total);
    }

    /**
     * Manga
     *
     * @return \Illuminate\Http\Response
     */
    public function manga(){
        $mangas = Group::where('type_id','=',1)->get();

        $artbooks = Group::where('type_id','=',2)->get();
        return view('pages.manga')
            ->with('mangas',$mangas)
            ->with('artbooks',$artbooks);
    }

    /**
     * Chelsea Doujin List
     *
     * @return \Illuminate\Http\Response
     */
    public function chelsea(){
        $volumes = Volume::where('user_id','=',2)->get();
       

        return  view('pages.chelsea')
            ->with('volumes',$volumes);
    }  


    /**
     * All Doujin List
     *
     * @return \Illuminate\Http\Response
     */
    public function doujin(){
        $volumes = Volume::where('user_id','=',2)->get();
       

        return  view('pages.doujin')
            ->with('volumes',$volumes);
    }  

    ///travel
     /**
     * counites
     *
     * @return \Illuminate\Http\Response
     */
    public function counties(){
        return view('pages.counties');
    }


     /**
     * projects
     *
     * @return \Illuminate\Http\Response
     */
    public function projects(){
        //$projects = Project::all();
        //$projects = DB::select('SELECT *, (SELECT MAX(projectsteps.updated_at) FROM projectsteps WHERE projectsteps.project_id = projects.id) AS last_step_updated_at FROM projects ORDER BY (SELECT MAX(projectsteps.updated_at) FROM projectsteps WHERE projectsteps.project_id = projects.id ) DESC');

        // $projects = Project::where(function ($subquery){
        //     $subquery->select('updated_at')->from('projectsteps')->where('proj')
        // });

        $projects = Project::select('projects.*')->selectSub('MAX(`projectsteps`.`updated_at`)', 'lastUpdated')->join('projectsteps','projects.id','=','projectsteps.project_id')->groupBy('projects.id')->orderBY('lastUpdated','desc')->get();

    //dd($projects);
         //$projects = Project::select('projects.*')->join('projectsteps','projects.id','=','projectsteps.project_id')->orderBy('projectsteps.updated_at','desc')->get();
         //2018-10-05 18:33
         //leaving this for now, they arent unique per project which i need to figure out
        
// SELECT * FROM `projectsteps` WHERE project_id IN (
//     SELECT DISTINCT(project.

// SELECT *
// FROM some_table 
// WHERE relevant_field IN
// (
//     SELECT relevant_field
//     FROM some_table
//     GROUP BY relevant_field
//     HAVING COUNT(*) > 1
// )



        return view('pages.projects')
        ->with('projects',$projects);
    }

    /**
     * Europe 2003 trip
     *
     * @return \Illuminate\Http\Response
     */
    public function london(){
        
       

        return  view('pages.london');
    }   
    
    
    /**
     * Resources
     *
     * @return \Illuminate\Http\Response
     */
    public function resources(){
        $resources = Resource::all();
       

        return  view('pages.resources')
            ->with('resources',$resources);
    }       

    /**
     * Books
     *
     * @return \Illuminate\Http\Response
     */
    public function books(){
        $books = Book::orderBy('created_at','desc')->get();

        return  view('pages.books')
        ->with('books',$books);
    }  

    /**
     * Book search
     *
     * @return \Illuminate\Http\Response
     */
    public function bookSearch($query){
        //how to find a book with laravel a %LIKE%
        $books = Book::orderBy('created_at','desc')->get();

        return  view('pages.books')
        ->with('books',$books);
    }  

    /**
     * Book types
     *
     * @return \Illuminate\Http\Response
     */
    public function bookTypes($type_name){
        //get the id from the type, I keep using this function, should generalize it?
        $type = Type::where('url','=',$type_name)->first();

        $books = Book::where('type_id','=',$type->id)->orderBy('created_at','desc')->get();

        return  view('pages.books')
        ->with('books',$books);
    }  


    /**
     * Book groups
     *
     * @return \Illuminate\Http\Response
     */
    public function bookGroups($group_name){
        $group = Group::where('url','=',$group_name)->first();

        $books = Book::where('group_id','=',$group->id)->orderBy('created_at','desc')->get();

        return  view('pages.books')
        ->with('books',$books);
    } 

    /**
     * Bookshelf
     *
     * @return \Illuminate\Http\Response
     */
    public function bookshelf(){
        $books = Book::where('read','=',0)->orderBy('created_at','desc')->get();
        $bookjson = json_encode($books);

        return  view('pages.bookshelf')
        ->with('bookjson',$bookjson)
        ->with('books',$books);
    }  

    /**
     * Caterpillars
     *
     * @return \Illuminate\Http\Response
     */
    public function caterpillars(){
        $caterpillars = Caterpillar::orderBy('created_at','desc')->get();

        return  view('pages.caterpillars')
        ->with('caterpillars',$caterpillars);
    }  

    /**
     * What I use
     *
     * @return \Illuminate\Http\Response
     */
    public function use(){
        return  view('pages.use');
    }   
    
    /**
     * Rocks
     *
     * @return \Illuminate\Http\Response
     */
    public function rocks()
    {
        //get all the minerals
        $minerals = Mineral::orderBy('name','asc')->paginate(50);

        //get a picture
        foreach ($minerals as $min) {
            $image = Item::where('mineral_id','=',$min->id)->pluck('image')->toArray();
            if (isset($image[0])) {
                $test = $image[0];
            } else {
                $test = 'example.jpg';
            }
            
            $min->image = $test;
        }   

        return view('pages.minerals')
        ->with('minerals',$minerals);
    }

    /**
     * show each rock
     *
     * @return \Illuminate\Http\Response
     */    
    public function showMinerals($mineral_name)
    {

        //get the mineral id
        $m = Mineral::where('name','=',$mineral_name)->first();

        //get all the items
        $items = Item::where('mineral_id','=',$m->id)->paginate(18);

        return view('pages.rocks')
        ->with('items',$items);
    }

    /**
     * Weather
     *
     * @return \Illuminate\Http\Response
     */
    public function weather(Request $request){
        //add weather data to db
        $w = new Weather;
        $w->temperature = $request->input('temperature');
        $w->humidity = $request->input('humidity');
        $w->pressure = $request->input('pressure');
        $w->windspeed = $request->input('windspeed');
        $w->save();

        //get stats
        $weather = Weather::all();

        return  view('pages.weather')
        ->with('weather',$weather);
    }  


     /**
     * Current Weather
     *
     * @return \Illuminate\Http\Response
     */
    public function currentWeather(){
        //get stats
        $current = Weather::orderBy('created_at','DESC')->first();

        return  view('pages.weathercurrent')
        ->with('current',$current);
    }     


}
