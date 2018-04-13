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

class PageController extends Controller{
    /**
     * Display the homepage.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $steps = Projectstep::orderBy('created_at','desc')->get();

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
        $steps = $steps->select('projectsteps.*')->join('projects','projects.id','=','projectsteps.project_id')->where('projects.category_id','=',$category->id)->get();



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
            $project = Project::where('name','=',$project)->first();
        }

        //when bad url is passed
        if (empty($project)) {
            //want to go to 404 page 
            abort(404);
        }  


            $steps = Projectstep::where('project_id','=',$project->id)->get();

       // $projects = Category::all();

        return  view('pages.index')
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
        return view('pages.projects');
    }

    /**
     * Europe 2003 trip
     *
     * @return \Illuminate\Http\Response
     */
    public function london(){
        
       

        return  view('pages.london');
    }      

}
