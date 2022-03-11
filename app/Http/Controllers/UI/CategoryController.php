<?php

namespace App\Http\Controllers\UI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;
use Illuminate\Support\Facades\Session;
use App;

class CategoryController extends Controller
{

    public function getLocalLanguage(){

        $user = auth()->user();
        $locale = $user->language;
        Session::put('locale', $locale);
        app()->setLocale(Session::get('locale'));
    }

    public function index()
    {
        $this->getLocalLanguage();
        $category = Category::all();
        return view('Category/index')->with('categoryes',$category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->getLocalLanguage();
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->getLocalLanguage();
        $validated = $request->validate([
            'category' => 'required|unique:categories,name',
        ]);

        $book= new Category();
        $book->name= $request['category'];
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
        $this->getLocalLanguage();
        $category = Category::where('id',$id)->first();
        return view('category.edit')->with('category',$category);
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
        $this->getLocalLanguage();
        $validated = $request->validate([
            'category' => 'required|unique:categories,name',
        ]);

        $data = array(
            'name' => $request['category'],
        );

        $category=Category::where('id',$request['edit_id'])->update($data);
        if($category == 1){
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
        $this->getLocalLanguage();
        $book = Book::where('category_id',$id)->count();
        if($book > 0){
            return back()
            ->with('error','This category have attach with Book.');
        }else{
            $query = category::where('id',$id)->delete();
            if($query == 1){
                return back()
                ->with('success','You have successfully upload.');
            }else{
                return back()
                ->with('error','You have some error.');
            }
        }
    }
}
