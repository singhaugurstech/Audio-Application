<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use App;


class HomeController extends Controller
{
    public function getLocalLanguage(){

        $user = auth()->user();
        $locale = $user->language;
        Session::put('locale', $locale);
        app()->setLocale(Session::get('locale'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $this->getLocalLanguage();
        $users = User::count();
        $books = Book::count();
        $category = Category::count();
        return view('dashboard')->with('users' , $users)
                                ->with('books' , $books)
                                ->with('category' , $category);
    }
}
