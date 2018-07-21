<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Publisher;

use Auth;

class PublisherController extends Controller {


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

        return view('admin.publisherAdd');
    } 

    /**
     * Add group
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request) {
        $g = new Publisher;
        $g->name = $request->input('name');                   
        $g->updated_by = '1';
        $g->save();

        return redirect('/home');          
    } 


    /**
     * List Publisher for eiting
     *
     * @return \Illuminate\Http\Response
     */
    public function listDisplay() {
           $publishers = Publisher::orderBy('created_at','desc')->get();

            return view('admin.publisherList')
            ->with('publishers',$publishers);
    } 

    /**
     * UI for eding
     *
     * @return \Illuminate\Http\Response
     */
    public function editDisplay($publisher_id) {
      $publisher = Publisher::find($publisher_id);
      
      return view('admin.publisherEdit')
            ->with('publisher',$publisher);
    } 


    /**
     * Edit publisher 
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request) {
        $publisher_id = $request->input('publisher_id');

        $up = Publisher::find($publisher_id);
        $up->name = $request->input('name');             
        $up->save();


        return redirect('/home/publisher/edit/'.$publisher_id);          
    } 


}
