<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Queue;

class QueueController extends Controller {


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
     * Add q  UI
     *
     * @return \Illuminate\Http\Response
     */
    public function addDisplay() {

        return view('admin.queueAdd');
    } 

    /**
     * Add q
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request) {
        $q = new Queue;
        $q->title = $request->input('title');         
        $q->why = $request->input('why');   
        $q->type_id = $request->input('type_id');   
        $q->reccomended_by = $request->input('reccomended_by');        
        $q->save();

        return redirect('/home');          
    } 


    /**
     * List song for eiting
     *
     * @return \Illuminate\Http\Response
     */
    public function listDisplay() {
           $qs = Queue::orderBy('created_at','desc')->get();

            return view('admin.queueList')
            ->with('qs',$qs);
    } 

    /**
     * UI for eding
     *
     * @return \Illuminate\Http\Response
     */
    public function editDisplay($queue_id) {
      $q = Queue::find($queue_id);
      
      return view('admin.queueEdit')
            ->with('q',$q);
    } 


    /**
     * Edit song 
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request) {
        $q_id = $request->input('queue_id');

        $q = Queue::find($q_id);
        $q->title = $request->input('title');      
        $q->why = $request->input('why');         
        $q->type_id = $request->input('type_id');                
        $q->reccomended_by = $request->input('reccomended_by');                         
        $q->save();


        return redirect('/home/queue/edit/'.$q_id);          
    } 


}
