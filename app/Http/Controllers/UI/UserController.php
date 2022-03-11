<?php

namespace App\Http\Controllers\UI;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Language;
use Illuminate\Support\Facades\Session;
use App;

class UserController extends Controller
{

    public function getLocalLanguage(){

        $user = auth()->user();
        $locale = $user->language;
        Session::put('locale', $locale);
        app()->setLocale(Session::get('locale'));
    }
 
    public function index(){

        $this->getLocalLanguage();
        $users = User::all();
        return view('user/index')->with('users',$users);

    }

    public function profile(){

        $this->getLocalLanguage();
        $language = Language::all();
        $user = auth()->user();
        return view('user/profile')->with('user',$user)
                                   ->with('languages',$language);
    }

    public function editProfile(Request $request){

        $this->getLocalLanguage();
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'language' => 'required',
        ]);

        $user_id = auth()->user()->id;

        if($request->image != ''){
            $fileName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('document\user'), $fileName);
        }else{
            $fileName = '';
        }

        if($request['current_password'] !='' && $request['change_password'] != ''){

            $user= User::where('id', $user_id)->first();
            if (!$user || !Hash::check($request['current_password'], $user->password)) {
                return back()
                ->with('error','Current password not match');
            }
        }

        $data = [
                    'name' => $request['name'],
                    'email' => $request['email'],
                    'password' => Hash::make($request['change_password']),
                    'language' => $request['language'],
                    'profession' => $request['profession'],
                    'profile_image' => $fileName
                ];
        
        $query = User::where('id',$user_id)->update($data);
        if($query == 1){
            return back()
            ->with('success','You have successfully upload.');
        }else{
            return back()
            ->with('error','You have some error.');
        }
        //$user->save();
        

    }
}
