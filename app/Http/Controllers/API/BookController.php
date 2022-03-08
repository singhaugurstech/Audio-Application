<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;

class BookController extends Controller
{
    
    public function index(){

        $books = Book::all();
        foreach($books as $book){
            $book->category_id = Category::select('name')->where('id',$book->category_id)->first();
        }
        return response()->json([
            'success' => true,
            'data' => $books,
        ]);

    }
}
