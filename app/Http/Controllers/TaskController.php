<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

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
            $tasks = Task::all();


            return view('admin.tasks')
                ->with('tasks',$tasks);
    } 




}
