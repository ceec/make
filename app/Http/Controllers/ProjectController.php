<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;
use App\Category;

use Auth;

class ProjectController extends Controller {


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
     * Add book  UI
     *
     * @return \Illuminate\Http\Response
     */
    public function addDisplay() {
       $categories = Category::pluck('name','id');

        return view('admin.projectAdd')
        ->with('categories',$categories);
    } 

    /**
     * Add group
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request) {
        $g = new Project;
        $g->name = $request->input('name');       
        $g->category_id = $request->input('category_id');
        $g->started_at = '2000-01-01 00:00:00';
        $g->completed_at = '2000-01-01 00:00:00';
        $g->complete = 0;
        $g->url = $request->input('url');          
        $g->updated_by = '1';
        $g->save();

        return redirect('/home');          
    } 


    /**
     * List Project for eiting
     *
     * @return \Illuminate\Http\Response
     */
    public function listDisplay() {
           $projects = Project::orderBy('created_at','desc')->get();

            return view('admin.projectList')
            ->with('projects',$projects);
    } 

    /**
     * UI for eding
     *
     * @return \Illuminate\Http\Response
     */
    public function editDisplay($project_id) {
      $project = Project::find($project_id);
      $categories = Category::pluck('name','id');
      
      return view('admin.projectEdit')
        ->with('categories',$categories)
        ->with('project',$project);
    } 


    /**
     * Edit project 
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request) {
        $project_id = $request->input('project_id');

        $up = Project::find($project_id);
        $up->name = $request->input('name');       
        $up->category_id = $request->input('category_id');
        $up->started_at = $request->input('started_at');
        $up->completed_at = $request->input('completed_at');
        $up->complete = $request->input('complete');
        $up->url = $request->input('url');          
        $up->updated_by = '1';          
        $up->save();


        return redirect('/home/project/edit/'.$project_id);          
    } 


}
