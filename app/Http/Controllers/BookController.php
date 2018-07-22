<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Book;
use App\Author;
use App\Publisher;
use App\Type;

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

            return view('admin.bookAdd')
            ->with('types',$types)
            ->with('publishers',$publishers)
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
        $b->author_id = $request->input('author_id');
        $b->publisher_id = $request->input('publisher_id');
        $b->type_id = $request->input('type_id');
        $b->isbn = $request->input('isbn');                      
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

        return view('admin.bookEdit')
            ->with('authors',$authors)
            ->with('publishers',$publishers)
            ->with('types',$types)                        
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
        $up->isbn = $request->input('isbn');
        $up->save();


        return redirect('/home/book/edit/'.$book_id);          
    } 


}
