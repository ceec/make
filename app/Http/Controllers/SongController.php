<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Publisher;

use Auth;
use App\Song;

class SongController extends Controller {


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
     * Add song  UI
     *
     * @return \Illuminate\Http\Response
     */
    public function addDisplay() {

        return view('admin.songAdd');
    } 

    /**
     * Add song
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request) {
        $s = new Song;
        $s->name = $request->input('name');         
        $s->artist_id = 0;
        $s->album_id = 0;
        $s->track = 0;
        $s->length = 0;
        $s->plays = 0;        
        $s->save();

        return redirect('/home');          
    } 


    /**
     * List song for eiting
     *
     * @return \Illuminate\Http\Response
     */
    public function listDisplay() {
           $songs = Song::orderBy('created_at','desc')->get();

            return view('admin.songList')
            ->with('songs',$songs);
    } 

    /**
     * UI for eding
     *
     * @return \Illuminate\Http\Response
     */
    public function editDisplay($song_id) {
      $song = Song::find($song_id);
      
      return view('admin.songEdit')
            ->with('song',$song);
    } 


    /**
     * Edit song 
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request) {
        $song_id = $request->input('song_id');

        $s = song::find($song_id);
        $s->name = $request->input('name');      
        $s->artist_id = $request->input('artist_id');         
        $s->album_id = $request->input('album_id');                
        $s->track = $request->input('track');         
        $s->length = $request->input('length');        
        $s->plays = $request->input('plays');                  
        $s->save();


        return redirect('/home/song/edit/'.$song_id);          
    } 


}
