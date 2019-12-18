<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Project;
use App\Tasknote;

use Carbon\Carbon;

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
             if ($status == 'complete') {
                //$tasks = Task::where('status','=',1)->get();
                $generaltasks = Task::where('status','=',1)->orderBy('updated_at','desc')->get();
                $dailytasks = Task::where('status','=',1)->where('list_id','=',2)->orderBy('updated_at','desc')->get();                
             } else {
                $generaltasks = Task::where('status','=',0)->where('list_id','=',1)->orderBy('created_at','desc')->get();
                $dailytasks = Task::where('status','=',0)->where('list_id','=',2)->orderBy('created_at','desc')->get();
             }
           
             $allprojects = Project::pluck('name','id');

             // Get tasks done on each day
             // This seems silly and a lot of copy paste
             $monday = Task::where('status','=',1)
                ->whereBetween('updated_at', [
                    Carbon::parse('monday this week')->startOfDay(),
                    Carbon::parse('monday this week ')->endOfDay() ])
                ->get();

             $tuesday = Task::where('status','=',1)
                ->whereBetween('updated_at', [
                    Carbon::parse('tuesday this week')->startOfDay(),
                    Carbon::parse('tuesday this week')->endOfDay() ])
                ->get();    
                
             $wednesday = Task::where('status','=',1)
                ->whereBetween('updated_at', [
                    Carbon::parse('wednesday this week')->startOfDay(),
                    Carbon::parse('wednesday this week')->endOfDay() ])
                ->get();    
                
             $thursday = Task::where('status','=',1)
                ->whereBetween('updated_at', [
                    Carbon::parse('thursday this week')->startOfDay(),
                    Carbon::parse('thursday this week')->endOfDay() ])
                ->get();    
                
             $friday = Task::where('status','=',1)
                ->whereBetween('updated_at', [
                    Carbon::parse('friday this week')->startOfDay(),
                    Carbon::parse('friday this week')->endOfDay() ])
                ->get();    
                
             $weekend = Task::where('status','=',1)
                ->whereBetween('updated_at', [
                    Carbon::parse('saturday this week')->startOfDay(),
                    Carbon::parse('sunday this week')->endOfDay() ])
                ->get();                    


            return view('admin.tasks')
                ->with('generaltasks',$generaltasks)
                ->with('status',$status)
                ->with('dailytasks',$dailytasks)
                ->with('monday',$monday)
                ->with('tuesday',$tuesday)
                ->with('wednesday',$wednesday)
                ->with('thursday',$thursday)
                ->with('friday',$friday)
                ->with('weekend',$weekend)                                                                
                ->with('allprojects',$allprojects);
    } 



    /**
     * Display all the tasks by project
     *
     * @return \Illuminate\Http\Response
     */
    public function tasksByProject() {
        $projects = Project::all();
                
        //$generaltasks = Task::where('status','=',0)->where('list_id','=',1)->orderBy('created_at','desc')->get();
        //$dailytasks = Task::where('status','=',0)->where('list_id','=',2)->orderBy('created_at','desc')->get();
             
           
        $allprojects = Project::pluck('name','id');

            return view('admin.tasksByProject')
               // ->with('generaltasks',$generaltasks)
               // ->with('status',$status)
               // ->with('dailytasks',$dailytasks)
               ->with('allprojects',$allprojects)
                ->with('projects',$projects);
    } 



    /**
     * Display onet ask
     *
     * @return \Illuminate\Http\Response
     */
    public function task($task_id) {
        $task = Task::find($task_id);

        $notes = Tasknote::where('task_id','=',$task_id)->get();

        $allprojects = Project::pluck('name','id');

        return view('admin.task')
            ->with('task',$task)
            ->with('notes',$notes)
            ->with('allprojects',$allprojects);
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
        $t->list_id = 1;
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


    /**
     * Move task
     *
     * @return \Illuminate\Http\Response
     */
    public function move(Request $request) {
        $task_id = $request->input('task_id');

        $up = Task::find($task_id);
        $up->list_id = $request->input('list_id');
        $up->save();


        return redirect('/home/tasks');           
    } 

    /**
     * Add task note
     *
     * @return \Illuminate\Http\Response
     */
    public function addNote(Request $request) {
        $task_id = $request->input('task_id');

        $t = new Tasknote;
        $t->task_id = $task_id;
        $t->note = $request->input('note');
        $t->save();

        return redirect('/home/task/'.$task_id);          
    } 



}
