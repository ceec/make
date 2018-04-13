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

use App\Note;

use Auth;

class NoteController extends Controller {


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
     * Add note  UI
     *
     * @return \Illuminate\Http\Response
     */
    public function addDisplay() {
            //get list of tags 

            //$tags = Project::pluck('name','id');;


            return view('admin.noteAdd');
    } 

    /**
     * Add blog post 
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request) {

        $this->validate($request, [
            'note' => 'required',
        
        ]);

        $n = new Note;
        $n->title = $request->input('title');
        $n->note = $request->input('note');
        $n->save();


        return redirect('/home');          
    } 


    /**
     * List notes for eiting
     *
     * @return \Illuminate\Http\Response
     */
    public function listDisplay() {
           $notes = Note::all();

            return view('admin.noteList')
            ->with('notes',$notes);
    } 

    /**
     * UI for eding
     *
     * @return \Illuminate\Http\Response
     */
    public function editDisplay($note_id) {
            $note = Note::find($note_id);

            return view('admin.noteEdit')
            ->with('note',$note);
    } 


    /**
     * Edit note 
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request) {
        $note_id = $request->input('note_id');

        $up = Note::find($note_id);
        $up->title = $request->input('title');
        $up->note = $request->input('note');
        $up->save();


        return redirect('/home');          
    } 


}
