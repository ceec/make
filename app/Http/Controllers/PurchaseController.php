<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Card;
use App\Boy;
use App\Skill;
use App\Minievent;
use App\Minieventchoice;
use App\Event;

use App\Cardtag;
use App\Tag;
use App\Unit;

use App\Story;
use App\Chapter;
use App\Slide;

use App\Blog;
use App\Projectstep;
use App\Project;

use App\Note;
use App\Store;
use App\Purchase;

use Auth;

class PurchaseController extends Controller {


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
     * Add note  UI
     *
     * @return \Illuminate\Http\Response
     */
    public function addDisplay() {
            //get list of tags 

            $projects = Project::pluck('name','id');;
            $stores = Store::pluck('store','id');


            return view('admin.purchaseAdd')
            ->with('projects',$projects)
            ->with('stores',$stores);
    } 

    /**
     * Add blog post 
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request) {

        $this->validate($request, [
            'name' => 'required',
        
        ]);

        $n = new Purchase;
        $n->name = $request->input('name');
        $n->price = $request->input('price');
        $n->store_id = $request->input('store_id');
        $n->project_id = $request->input('project_id');
        $n->save();


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
