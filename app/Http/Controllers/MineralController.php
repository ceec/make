<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mineral;

use Auth;

class MineralController extends Controller {


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
     * Add minerals  UI
     *
     * @return \Illuminate\Http\Response
     */
    public function addDisplay() {
       $minerals = Mineral::pluck('name','id');

        return view('admin.mineralAdd')
        ->with('minerals',$minerals);
    } 

    /**
     * Add minerals
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request) {
        $g = new Mineral;
        $g->name = $request->input('name');       
        $g->formula = $request->input('formula');
        $g->save();

        return redirect('/home');          
    } 


    /**
     * List Mineral for eiting
     *
     * @return \Illuminate\Http\Response
     */
    public function listDisplay() {
        $minerals = Mineral::orderBy('created_at','desc')->get();

        return view('admin.mineralList')
        ->with('minerals',$minerals);
    } 

    /**
     * UI for eding
     *
     * @return \Illuminate\Http\Response
     */
    public function editDisplay($mineral_id) {
      $mineral = Mineral::find($mineral_id);
      
      return view('admin.mineralEdit')
        ->with('mineral',$mineral);
    } 


    /**
     * Edit mineral 
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request) {
        $mineral_id = $request->input('mineral_id');

        $up = Mineral::find($mineral_id);
        $up->name = $request->input('name');       
        $up->formula = $request->input('formula');     
        $up->save();


        return redirect('/home/mineral/edit/'.$mineral_id);          
    } 


}
