<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;

use Auth;

class ItemController extends Controller {


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
     * Add Items  UI
     *
     * @return \Illuminate\Http\Response
     */
    public function addDisplay() {
       $items = Item::pluck('name','id');

        return view('admin.itemAdd')
        ->with('items',$items);
    } 

    /**
     * Add Items
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request) {
        $i = new Item;
        $i->name = $request->input('name');       
        $i->type_id = 0;
        $i->mineral_id = 0;
        $i->image = $request->input('image');
        $i->price = 0;
        $i->source_location = "";
        $i->seller_id = 0;
        $i->buy_location = "";
        $i->buy_date = "1999-01-01";
        $i->description = "";
        $i->save();

        return redirect('/home');          
    } 


    /**
     * List Item for eiting
     *
     * @return \Illuminate\Http\Response
     */
    public function listDisplay() {
        $items = Item::orderBy('created_at','desc')->get();

        return view('admin.itemList')
        ->with('items',$items);
    } 

    /**
     * UI for eding
     *
     * @return \Illuminate\Http\Response
     */
    public function editDisplay($item_id) {
      $item = Item::find($item_id);
      
      return view('admin.itemEdit')
        ->with('item',$item);
    } 


    /**
     * Edit Item 
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request) {
        $item_id = $request->input('item_id');

        $up = Item::find($item_id);
        $up->name = $request->input('name');       
        $up->image = $request->input('image');     
        $up->save();


        return redirect('/home/item/edit/'.$item_id);          
    } 


}
