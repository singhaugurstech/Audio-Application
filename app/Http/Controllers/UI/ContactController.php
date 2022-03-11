<?php

namespace App\Http\Controllers\UI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Session;
use App;

class ContactController extends Controller
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
        $contact = Contact::all();
        return view('contact/index')->with('contacts',$contact);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->getLocalLanguage();
        return view('contact.create');
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

        $contact= new Contact();
        $contact->title= $request['title'];
        $contact->description= $request['description'];
        $contact->save();

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
        $contact = Contact::where('id',$id)->first();
        return view('contact.edit')->with('contact',$contact);
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

        $contact = Contact::where('id',$request['edit_id'])->update($data);
        if($contact == 1){
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
        $query = Contact::where('id',$id)->delete();
        if($query == 1){
            return back()
            ->with('success','You have successfully upload.');
        }else{
            return back()
            ->with('error','You have some error.');
        }
    }
}
