<?php

namespace App\Http\Controllers\UI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        foreach($books as $book){
            $book->category_id = Category::select('name')->where('id',$book->category_id)->first();
        }
        return view('book/index')->with('books',$books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('book.add')->with('categoryes',$category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required',
            'document' => 'required|mimes:pdf,mp3,jpg,png',
            'summary' => 'required',
            'category' => 'required',
            'description' => 'required',
            'cover_page' => 'required|mimes:jpg,png,jpeg',
            
        ]);

        $fileName = time().'.'.$request->document->extension();  
        $request->document->move(public_path('document\books'), $fileName);

        $coverpage = time().'.'.$request->cover_page->extension();  
        $request->cover_page->move(public_path('document\book_cover'), $coverpage);

        $book= new Book();
        $book->title= $request['title'];
        $book->author= $request['author'];
        $book->file = $fileName;
        $book->description = $request['description'];
        $book->category_id = $request['category'];
        $book->summary = $request['summary'];
        $book->cover_page = $coverpage;
        $book->save();

        return back()
            ->with('success','You have successfully upload.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::where('id',$id)->first();
        $category = Category::all();
        return view('book.create')->with('book',$book)
                                  ->with('categoryes',$category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required',
            'document' => 'required|mimes:pdf,mp3,jpg,png',
            'category' => 'required',
            'summary' => 'required',
            'description' => 'required',
            'cover_page' => 'required|mimes:jpg,png,jpeg',
        ]);

        $fileName = time().'.'.$request->document->extension();  
        $request->document->move(public_path('document\books'), $fileName);

        $coverpage = time().'.'.$request->cover_page->extension();  
        $request->cover_page->move(public_path('document\book_cover'), $coverpage);


        $data = array(
            'title' => $request['title'],
            'author'=> $request['author'],
            'category_id' => $request['category'],
            'summary' => $request['summary'],
            'description' => $request['description'],
            'file' => $fileName,
            'cover_page' => $coverpage,
        );

        $book=Book::where('id',$request['edit_id'])->update($data);
        if($book == 1){
            return back()
            ->with('success','You have successfully upload.');
        }else{
            return back()
            ->with('error','You have some error.');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $query = Book::where('id',$id)->delete();
        if($query == 1){
            return back()
            ->with('success','You have successfully upload.');
        }else{
            return back()
            ->with('error','You have some error.');
        }
    }
}
