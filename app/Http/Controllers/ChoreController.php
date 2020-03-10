<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Project;
use App\Tasknote;
use App\Dailytask;
use App\Chore;
use App\Choreday;

use Carbon\Carbon;

use Auth;

class ChoreController extends Controller {


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
     * Display all the chores
     *
     * @return \Illuminate\Http\Response
     */
    public function chores() {
        $chores = Chore::all();

        // Fill out daily checkboxes
        $daily = Choreday::whereBetween('updated_at', [
                Carbon::parse('monday this week')->startOfDay(),
                Carbon::parse('sunday this week')->endOfDay() ])
            ->get();         

        return view('admin.chores')
            ->with('daily',$daily)           
            ->with('chores',$chores);

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






    // Daily Chores

    /**
     * Edit daily chore
     *
     * @return \Illuminate\Http\Response
     */
    public function editChoreDay(Request $request) {
        $complete = $request->input('complete');

        $d = new Choreday;
        $d->chore_id = $request->input('choreID');
        $d->daily = $complete;
        $d->save();
        
    }     




}
