<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;

class UserController extends Controller
{
    
    public function register(Request $request){

        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
           
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $register= new User();
        $register->name= $request['name'];
        $register->email= $request['email'];
        $register->password = Hash::make($request['password']);
        $register->save();
        
        $user= User::where('email', $request->email)->first();
        $token = $user->createToken('my-app-token')->plainTextToken;
        

        $response = [
            'user' => $user,
            'token' => $token
        ];
    
        return response()->json([
            'success' => true,
            'data' => $response,
        ]);
        
    }

    public function login(Request $request){


        $validator = \Validator::make($request->all(), [

            'email' => 'required',
            'password' => 'required',
           
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }
        $user= User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 404);
        }
        $token = $user->createToken('my-app-token')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token
        ];
    
        return response($response, 201);

    }
    
}
