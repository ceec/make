<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Group;
use App\Volume;


use Auth;

class BookController extends Controller {


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
            //get list of tags 

            $groups = Group::pluck('title','id');;
            return view('admin.bookAdd')
            ->with('groups',$groups);
    } 

    /**
     * Add blog post 
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request) {


        $v = new Volume;
        $v->user_id = 0;
        $v->group_id = $request->input('group_id');
        $v->volume = $request->input('volume');
        $v->title_j = $request->input('title_j');
        $v->title_e = $request->input('title_e');
        $v->published_date = $request->input('published_date');
        $v->isbn = $request->input('isbn');
        $v->pairing_id = 0;   
        $v->original_price = $request->input('original_price');  
        $v->have = 0;                     
        $v->date_acquired = '2000-01-01';         
        $v->edition = 0;          
        $v->edition_date = '2000-01-01';           
        $v->price_yen = 0;   
        $v->price_usd = 0;
        $v->location = '';                        
        $v->updated_by = '1';
        $v->save();


        return redirect('/home');          
    } 


    /**
     * List notes for eiting
     *
     * @return \Illuminate\Http\Response
     */
    public function listDisplay() {
           $purchases = Purchase::orderBy('created_at','desc')->get();

            return view('admin.purchaseList')
            ->with('purchases',$purchases);
    } 

    /**
     * UI for eding
     *
     * @return \Illuminate\Http\Response
     */
    public function editDisplay($purchase_id) {
            $purchase = Purchase::find($purchase_id);
            $projects = Project::pluck('name','id');;
            $stores = Store::pluck('store','id');

            return view('admin.purchaseEdit')
            ->with('purchase',$purchase)
            ->with('projects',$projects)
            ->with('stores',$stores);
    } 


    /**
     * Edit note 
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request) {
        $purchase_id = $request->input('purchase_id');

        $up = Purchase::find($purchase_id);
        $up->name = $request->input('name');
        $up->price = $request->input('price');
        $up->store_id = $request->input('store_id');
        $up->project_id = $request->input('project_id');
        $up->save();


        return redirect('/home/purchase/edit/'.$purchase_id);          
    } 


}
