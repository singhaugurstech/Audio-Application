<?php

namespace App\Http\Controllers\UI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use Illuminate\Support\Facades\Session;
use App;

class AdvertisementController extends Controller
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
        $advertisement = Advertisement::all();
        return view('advertisement/index')->with('advertisements',$advertisement);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->getLocalLanguage();
        return view('advertisement.create');
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
            'valid_date' => 'required',
            'image' => 'mimes:mp3,jpg,png,jpeg'
        ]);

        $fileName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('document\advertisement'), $fileName);

        $advertisement= new Advertisement();
        $advertisement->name= $request['title'];
        $advertisement->description= $request['description'];
        $advertisement->valid_time= $request['valid_date'];
        $advertisement->image= $fileName;
        $advertisement->save();

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
        $advertisement = Advertisement::where('id',$id)->first();
        return view('advertisement.edit')->with('advertisement',$advertisement);
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
            'valid_date' => 'required',
        ]);

        $fileName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('document\advertisement'), $fileName);

        $data = array(
            'name' => $request['title'],
            'description' => $request['description'],
            'valid_time' => $request['valid_date'],
            'image' => $fileName,
        );



        $about = Advertisement::where('id',$request['edit_id'])->update($data);
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
        $query = Advertisement::where('id',$id)->delete();
        if($query == 1){
            return back()
            ->with('success','You have successfully upload.');
        }else{
            return back()
            ->with('error','You have some error.');
        }
    }
}
