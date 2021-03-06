<?php

namespace App\Http\Controllers\UI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\Support\Facades\Session;
use App;

class AboutController extends Controller
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
        $about = About::all();
        return view('about/index')->with('abouts',$about);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->getLocalLanguage();
        return view('about.create');
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
            'title' => 'required',
            'description' => 'required',
        ]);

        $about= new About();
        $about->title= $request['title'];
        $about->description= $request['description'];
        $about->save();

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
        $about = About::where('id',$id)->first();
        return view('about.edit')->with('about',$about);
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
            'title' => 'required',
            'description' => 'required',
        ]);

        $data = array(
            'title' => $request['title'],
            'description' => $request['description']
        );

        $about = About::where('id',$request['edit_id'])->update($data);
        if($about == 1){
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
        $query = About::where('id',$id)->delete();
        if($query == 1){
            return back()
            ->with('success','You have successfully upload.');
        }else{
            return back()
            ->with('error','You have some error.');
        }
    }
}
