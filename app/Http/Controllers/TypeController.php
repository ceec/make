<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Type;

use Auth;

class TypeController extends Controller {


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

        return view('admin.typeAdd');
    } 

    /**
     * Add Type
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request) {
        $g = new Type;
        $g->type = $request->input('type');                   
        $g->updated_by = '1';
        $g->save();

        return redirect('/home');          
    } 


    /**
     * List Type for eiting
     *
     * @return \Illuminate\Http\Response
     */
    public function listDisplay() {
           $types = Type::orderBy('created_at','desc')->get();

            return view('admin.typeList')
            ->with('types',$types);
    } 

    /**
     * UI for eding
     *
     * @return \Illuminate\Http\Response
     */
    public function editDisplay($type_id) {
      $type = Type::find($type_id);
      
      return view('admin.typeEdit')
            ->with('type',$type);
    } 


    /**
     * Edit Type 
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request) {
        $type_id = $request->input('type_id');

        $up = Type::find($type_id);
        $up->type = $request->input('type');             
        $up->save();


        return redirect('/home/type/edit/'.$type_id);          
    } 


}
