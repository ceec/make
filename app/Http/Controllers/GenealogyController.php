<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\People;

use Auth;

class GenealogyController extends Controller {


    /**
     * List people
     *
     * @return \Illuminate\Http\Response
     */
    public function tree() {
        $people = People::all();

        return view('genealogy.tree')
        ->with('people',$people);
    }


    /**
     * Add store UI
     *
     * @return \Illuminate\Http\Response
     */
    public function addDisplay() {

            return view('admin.storeAdd');
    } 

    /**
     * Add store
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request) {

        $this->validate($request, [
            'store' => 'required',
        
        ]);

        $n = new Store;
        $n->store = $request->input('store');
        $n->url = $request->input('url');
        $n->save();

        return redirect('/home');          
    } 


    /**
     * List stores for eiting
     *
     * @return \Illuminate\Http\Response
     */
    public function listDisplay() {
           $stores = Store::orderBy('created_at','desc')->get();

            return view('admin.storeList')
            ->with('stores',$stores);
    } 

    /**
     * UI for eding
     *
     * @return \Illuminate\Http\Response
     */
    public function editDisplay($store_id) {
            $store = Store::find($store_id);

            return view('admin.storeEdit')
            ->with('store',$store);
    } 


    /**
     * Edit store 
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request) {
        $store_id = $request->input('store_id');

        $up = Store::find($store_id);
        $up->store = $request->input('store');
        $up->url = $request->input('url');
        $up->save();


        return redirect('/home/store/edit/'.$store_id);          
    } 


}
