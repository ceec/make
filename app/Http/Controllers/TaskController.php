<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Project;

use Auth;

class TaskController extends Controller {


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
     * Display all the tasks
     *
     * @return \Illuminate\Http\Response
     */
    public function tasks() {
            //get list of projects to choose what one to work with
            //$tasks = Task::all();

            //need to group them by project

            //get all the projects with active tasks
            $projects = Task::where('status','=',0)->distinct()->get(['project_id']);

            //group the tasks by project
            foreach($projects as $key => $project) {
                //get the name of the project! -> could probably do this aboove but i dont know how!
                $projectInfo = Project::find($project->project_id);
                $projects[$key]['project']= $projectInfo;
                //get that projects tasks
                $tasks = Task::where('status','=',0)->where('project_id','=',$project->project_id)->get();
                $projects[$key]['tasks'] = $tasks;
            }

            echo '<pre>';
            //print_r($tasks);
            echo '</pre>';
            return view('admin.tasks')
                ->with('projects',$projects);
    } 




}
