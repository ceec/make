<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SpotifyWebAPI;
use App\Spotifyplay;
use App\Song;
use App\Album;

class SpotifyController extends Controller {


 
     /**
     * spotify test
     *
     * @return \Illuminate\Http\Response
     */
    public function test(){

      $session = new SpotifyWebAPI\Session(
        '2969b21eb1724877b88498acf8445a55',
        '5f3cfbe4db014c3fb68dd7659313a527',
        'http://ccmake.local/spotify'
      );

      $api = new SpotifyWebAPI\SpotifyWebAPI();

      if (isset($_GET['code'])) {
          $session->requestAccessToken($_GET['code']);
          $api->setAccessToken($session->getAccessToken());

          $recent = $api->getMyRecentTracks(['limit' => 5]);

          foreach ($recent->items as $track) {
              // Album info
              $info['album_name'] = $track->track->album->name;
              $info['album_tracks'] = $track->track->album->total_tracks;
              $info['album_id'] = $track->track->album->id;
              // Artist info - looks like its always an array?
              //$info['artist_id'] = $track->artists;
              // Played info
              $info['song_length'] = $track->track->duration_ms;
              $info['song_id'] = $track->track->id;
              $info['song_name'] = $track->track->name;

             // dd($track->track);

              $info['song_place'] = $track->track->track_number;
              // Actual played info
              $info['played_at'] = $track->played_at;

              // Check if this album is already in albums
              $albumcheck = Album::where('spotify_id','=',$info['album_id'])->first();


              if (!isset($albumcheck)) {
                // If its not there, add to albums
                $a = new Album;
                $a->name = $info['album_name'];
                $a->spotify_id = $info['album_id'];
                $a->save();

                $album_id = $a->id;
              } else {
                $album_id = $albumcheck->id;
              }

              // Artists
              // Songs can have multiple artists, what to do here


              // Check if this song is already in songs
              $songcheck = Song::where('spotify_id','=',$info['song_id'])->first();

              if (!isset($songcheck)) {
                // If its not there, add to songs
                $s = new Song;
                $s->name = $info['song_name'];
                //$s->artist_id = $artistcheck->id;
                $s->artist_id = 0;
                $s->album_id = $album_id;
                $s->track = $info['song_place'];
                $s->length = $info['song_length'];
                $s->plays = 0;
                $s->spotify_id = $info['song_id'];
                $s->save();
              }



              // Add to spotify play
              $s = new Spotifyplay;
              $s->song_id = $info['song_id'];
              $s->played_at = date('Y-m-d H:i:s',strtotime($info['played_at']));
              $s->updated_by = 1;
              $s->save();



              $data[] = $info;
          }

          
              print '<pre>';
              print_r($data);
              print '</pre>';
              print '<hr>';
      } else {
          $options = [
              'scope' => [
                  'user-read-email',
                  'user-read-recently-played'
              ],
          ];

          header('Location: ' . $session->getAuthorizeUrl($options));
          die();
      } 

    }
}