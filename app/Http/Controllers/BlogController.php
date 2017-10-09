<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Card;
use App\Boy;
use App\Skill;
use App\Minievent;
use App\Minieventchoice;
use App\Event;

use App\Cardtag;
use App\Tag;
use App\Unit;

use App\Story;
use App\Chapter;
use App\Slide;

use App\Blog;
use App\Projectstep;
use App\Project;

use Auth;

class BlogController extends Controller {


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Add card  UI
     *
     * @return \Illuminate\Http\Response
     */
    public function addDisplay() {
            //get list of projects to choose what one to work with
            $projects = Project::pluck('name','id');;


            return view('admin.blogAdd')
                ->with('projects',$projects);
    } 

    /**
     * Add blog post 
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request) {

        $this->validate($request, [
            'title' => 'required',
        
        ]);

        $b = new Projectstep;
        $b->project_id = $request->input('project_id');
        $b->name = $request->input('title');
        $b->text = $request->input('text');
        $b->started_at = $request->input('started_at');
        $b->completed_at = $request->input('completed_at');
        $b->complete = 0;
        $b->updated_by = Auth::id();  
        $b->save();


        return redirect('/home');          
    } 


    /**
     * List blog posts for eiting
     *
     * @return \Illuminate\Http\Response
     */
    public function listDisplay() {
            $blogs = Blog::orderBy('created_at','DESC')->get();

            return view('admin.blogList')
            ->with('blogs',$blogs);
    } 

    /**
     * UI for eding
     *
     * @return \Illuminate\Http\Response
     */
    public function editDisplay($blog_id) {
            $blog = Blog::find($blog_id);

            return view('admin.blogEdit')
            ->with('blog',$blog);
    } 


    /**
     * Edit blog post 
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request) {
        $blog_id = $request->input('blog_id');

        $up = Blog::find($blog_id);
        $up->active = $request->input('active');
        $up->title = $request->input('title');
        $up->blurb = $request->input('blurb');
        $up->content = $request->input('content');
        $up->image = $request->input('image');
        $up->url = $request->input('url');
        $up->updated_by = Auth::id();  
        $up->save();


        return redirect('/home');          
    } 


}
