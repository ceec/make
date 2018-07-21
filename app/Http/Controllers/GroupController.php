<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Group;
use App\Author;
use App\Publisher;
use App\Type;


use Auth;

class GroupController extends Controller {


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
        //get list of authors 
        $authors = Author::pluck('name','id');

        $publishers = Publisher::pluck('name','id');
        $types = Type::pluck('type','id');

        return view('admin.groupAdd')
          ->with('publishers',$publishers)
          ->with('types',$types)
          ->with('authors',$authors);
    } 

    /**
     * Add group
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request) {
        $g = new Group;
        $g->title = $request->input('title');
        $g->author_id = $request->input('author_id');
        $g->publisher_id = $request->input('publisher_id');
        $g->type_id = $request->input('type_id');                      
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
           $groups = Group::orderBy('created_at','desc')->get();

            return view('admin.groupList')
            ->with('groups',$groups);
    } 

    /**
     * UI for eding
     *
     * @return \Illuminate\Http\Response
     */
    public function editDisplay($group_id) {
      $group = Group::find($group_id);

      //get list of authors 
      $authors = Author::pluck('name','id');

      $publishers = Publisher::pluck('name','id');
      $types = Type::pluck('type','id');
      
      return view('admin.groupEdit')
            ->with('group',$group)
          ->with('publishers',$publishers)
          ->with('types',$types)
          ->with('authors',$authors);
    } 


    /**
     * Edit group 
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request) {
        $group_id = $request->input('group_id');

        $up = Group::find($group_id);
        $up->title = $request->input('title');        
        $up->author_id = $request->input('author_id');
        $up->publisher_id = $request->input('publisher_id');
        $up->type_id = $request->input('type_id');       
        $up->save();


        return redirect('/home/group/edit/'.$group_id);          
    } 


}
