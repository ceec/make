<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Book;
use App\Author;
use App\Publisher;
use App\Type;
use App\Group;

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
        $authors = Author::pluck('name','id');
        $publishers = Publisher::pluck('name','id');
        $types = Type::pluck('type','id');
        $groups = Group::pluck('title','id');

        //add none option for ones that dont beong to a series
        $groups->prepend('None');

            return view('admin.bookAdd')
            ->with('types',$types)
            ->with('publishers',$publishers)
            ->with('groups',$groups)             
            ->with('authors',$authors);
    } 

    /**
     * Add blog post 
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request) {
        
        $b = new Book;
        $b->title = $request->input('title');
        $b->author_id = 0;
        $b->publisher_id = 0;
        $b->type_id = 0;
        $b->group_id = 0;
        $b->isbn = $request->input('isbn');
        $b->original_price = 0;
        $b->date_acquired = '1999-01-1';
        $b->edition = 0;
        $b->edition_date = '1999-01-01';
        $b->price_yen = 0;
        $b->price_usd = 0;
        $b->location = '';                   
        //$v->updated_by = '1';
        $b->save();


        return redirect('/home');          
    } 


    /**
     * List notes for eiting
     *
     * @return \Illuminate\Http\Response
     */
    public function listDisplay() {
           $books = Book::orderBy('created_at','desc')->get();

            return view('admin.bookList')
            ->with('books',$books);
    } 

    /**
     * UI for eding
     *
     * @return \Illuminate\Http\Response
     */
    public function editDisplay($book_id) {
        $book = Book::find($book_id);
        $authors = Author::pluck('name','id');
        $publishers = Publisher::pluck('name','id');
        $types = Type::pluck('type','id');
        $groups = Group::pluck('title','id');

        //add none option for ones that dont beong to a series
        $groups->prepend('None');

        return view('admin.bookEdit')
            ->with('authors',$authors)
            ->with('publishers',$publishers)
            ->with('types',$types)  
            ->with('groups',$groups)                      
            ->with('book',$book);
    } 


    /**
     * Edit note 
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request) {
        $book_id = $request->input('book_id');

        $up = Book::find($book_id);
        $up->title = $request->input('title');
        $up->author_id = $request->input('author_id');        
        $up->publisher_id = $request->input('publisher_id');
        $up->type_id = $request->input('type_id');
        $up->group_id = $request->input('group_id');
        $up->isbn = $request->input('isbn');
        $up->original_price = $request->input('original_price');
        $up->date_acquired = $request->input('date_acquired');
        $up->edition = $request->input('edition');
        $up->edition_date = $request->input('edition_date');
        $up->price_yen = $request->input('price_yen');
        $up->price_usd = $request->input('price_usd');
        $up->location = $request->input('location');      
        $up->save();


        return redirect('/home/book/edit/'.$book_id);          
    } 


}
