<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Wordcount;
use App\Document;

class HomeController extends Controller
{
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }


    /**
     * Show the wordcount editor, maybe move to its own controller if needd
     *
     * @return \Illuminate\Http\Response
     */
    public function wordcount()
    {


        $documents = Document::orderBy('created_at','desc')->pluck('name','id');

        $alldocuments = Document::orderBy('created_at','desc')->get();

        foreach ($alldocuments as $document) {
            $words = Wordcount::where('document_id','=',$document->id)->orderBy('created_at','desc')->first();
            $document->count = $words;
        }   

        return view('admin.wordcountEdit')
        ->with('documents',$documents)
        ->with('alldocuments',$alldocuments);

    }

    public function wordcountUpdate(Request $request) {
        $w = new Wordcount;
        $w->document_id = $request->input('document_id');
        $w->count = $request->input('wordcount');
        $w->updated_by = 1;  
        date_default_timezone_set('America/Denver');    
        $now = date('Y-m-d H:i:s');
        $w->updated_at = $now;
        $w->created_at = $now;
        $w->save();

        //send back to wordcounts
        return redirect('/home/wordcount')->with('message', 'Wordcount added!');
    } 


}
