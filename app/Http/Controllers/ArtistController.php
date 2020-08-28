<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Publisher;

use Auth;
use App\Artist;

class ArtistController extends Controller {


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
     * Add artist  UI
     *
     * @return \Illuminate\Http\Response
     */
    public function addDisplay() {

        return view('admin.artistAdd');
    } 

    /**
     * Add artist
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request) {
        $g = new Artist;
        $g->name = $request->input('name');                   
        $g->save();

        return redirect('/home');          
    } 


    /**
     * List Artist for eiting
     *
     * @return \Illuminate\Http\Response
     */
    public function listDisplay() {
           $artists = Artist::orderBy('created_at','desc')->get();

            return view('admin.artistList')
            ->with('artists',$artists);
    } 

    /**
     * UI for eding
     *
     * @return \Illuminate\Http\Response
     */
    public function editDisplay($artist_id) {
      $artist = Artist::find($artist_id);
      
      return view('admin.artistEdit')
            ->with('artist',$artist);
    } 


    /**
     * Edit artist 
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request) {
        $artist_id = $request->input('artist_id');

        $up = Artist::find($artist_id);
        $up->name = $request->input('name');             
        $up->save();


        return redirect('/home/artist/edit/'.$artist_id);          
    } 


}
