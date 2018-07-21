<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Group;
use App\Author;
use App\Publisher;
use App\Type;


use Auth;

class AuthorController extends Controller {


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

        return view('admin.authorAdd');
    } 

    /**
     * Add group
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request) {
        $g = new Author;
        $g->name = $request->input('name');                   
        $g->updated_by = '1';
        $g->save();

        return redirect('/home');          
    } 


    /**
     * List notes for eiting
     *
     * @return \Illuminate\Http\Response
     */
    public function listDisplay() {
           $authors = Author::orderBy('created_at','desc')->get();

            return view('admin.authorList')
            ->with('authors',$authors);
    } 

    /**
     * UI for eding
     *
     * @return \Illuminate\Http\Response
     */
    public function editDisplay($author_id) {
      $author = Author::find($author_id);
      
      return view('admin.authorEdit')
            ->with('author',$author);
    } 


    /**
     * Edit author 
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request) {
        $author_id = $request->input('author_id');

        $up = Author::find($author_id);
        $up->name = $request->input('name');             
        $up->save();


        return redirect('/home/author/edit/'.$author_id);          
    } 


}
