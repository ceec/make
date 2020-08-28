<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Publisher;

use Auth;
use App\Album;

class AlbumController extends Controller {


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
     * Add album  UI
     *
     * @return \Illuminate\Http\Response
     */
    public function addDisplay() {

        return view('admin.albumAdd');
    } 

    /**
     * Add album
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request) {
        $g = new Album;
        $g->name = $request->input('name');                   
        $g->save();

        return redirect('/home');          
    } 


    /**
     * List album for eiting
     *
     * @return \Illuminate\Http\Response
     */
    public function listDisplay() {
           $albums = Album::orderBy('created_at','desc')->get();

            return view('admin.albumList')
            ->with('albums',$albums);
    } 

    /**
     * UI for eding
     *
     * @return \Illuminate\Http\Response
     */
    public function editDisplay($album_id) {
      $album = Album::find($album_id);
      
      return view('admin.albumEdit')
            ->with('album',$album);
    } 


    /**
     * Edit album 
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request) {
        $album_id = $request->input('album_id');

        $up = album::find($album_id);
        $up->name = $request->input('name');             
        $up->save();


        return redirect('/home/album/edit/'.$album_id);          
    } 


}
