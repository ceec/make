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
    public function tasks($status='') {
            //this is really cool and all but the project disappears if i complete all the tasks from it




            //get list of projects to choose what one to work with
            //$tasks = Task::all();

            //check the status
            if ($status == 'complete') {
                $projects = Task::where('status','=',1)->distinct()->get(['project_id']);
            } else {
                //get all the projects with active tasks
                $projects = Task::where('status','=',0)->distinct()->get(['project_id']);
            }

            //need to group them by project

            //sort the projects in some order that its just always the same
            //apparently theres a sortBy lul
            $projects = $projects->sortBy('project_id');

            //group the tasks by project
            foreach($projects as $key => $project) {
                //get the name of the project! -> could probably do this aboove but i dont know how!
                $projectInfo = Project::find($project->project_id);
                $projects[$key]['project']= $projectInfo;
                //get that projects tasks
                //check the status
                if ($status == 'complete') {
                     $tasks = Task::where('status','=',1)->where('project_id','=',$project->project_id)->get();
                } else {
                    //get all the projects with active tasks
                     $tasks = Task::where('status','=',0)->where('project_id','=',$project->project_id)->get();
                }                
               
                $projects[$key]['tasks'] = $tasks;
            }


            //switching UI to not be categorized?
             if ($status == 'complete') {
                  $tasks = Task::where('status','=',1)->get();
             } else {
                 $tasks = Task::where('status','=',0)->orderBy('created_at','desc')->get();
             }
           
             $allprojects = Project::pluck('name','id');;


            return view('admin.tasks')
                ->with('tasks',$tasks)
                ->with('allprojects',$allprojects)
                ->with('projects',$projects);
    } 


    /**
     * Add task
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request) {

        $this->validate($request, [
            'task' => 'required',
        
        ]);

        $t = new Task;
        $t->project_id = $request->input('project_id');
        $t->status = 0;
        $t->task = $request->input('task');
        $t->save();

        return redirect('/home/tasks');          
    } 


    /**
     * Edit task
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request) {
        $task_id = $request->input('task_id');

        $up = Task::find($task_id);


        $up->status = $request->input('status');

        
        // $up->name = $request->input('name');
        // $up->text = $request->input('text');
        // $up->updated_by = Auth::id();  
        $up->save();


        return redirect('/home/tasks');           
    } 

}
