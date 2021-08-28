<?php

namespace App;
use App\Songartist;
use App\Spotifyplay;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{

    public function artist() {
        return $this->belongsTo('App\Artist');
    }

    public function album() {
        return $this->belongsTo('App\Album');
    }  
    
    
    public function findartist() {
        // mix of spotify and non spotify stuff
        // old non spotify stuff will have the artist_id right on the song
        // spotfity has them in the lookup table songartists
        // TODO: convert them all to spotiy style cause songs do have multiple artists

        if ($this->artist_id === 0) {
            // lets check spotify id 
        //..dd($this);
            $songartist = SongArtist::where('song_id','=',$this->id)->get();

            if ($songartist->isNotEmpty()) {
                $artists = '';
                foreach($songartist as $thisartist) {

                    $artist = Artist::where('id','=',$thisartist->artist_id)->first();
                    $artists .= $artist->name.' ';
                }
                $artist = $artists;
            } else {
                $artist = 'what';
            }


        } else {
            $artist = '';
        }


        return $artist;
    }

    public function spotifyplays() {
        // get a count from the spotifyplays table
        if ($this->artist_id === 0) {
            $plays = Spotifyplay::where('song_id','=',$this->spotify_id)->count();
            
        } else {
            $plays = 0;
        }
        return $plays;
    }

}
