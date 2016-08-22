<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
// use App\Http\Requests\LoginRequest;
class AuthController extends Controller
{

     public function login()
    {
    	return view('users.userLogin');
    }

    public function userLogin(Request $request)
    {

    	// $validationRules=[
     //            'email' => 'required|unique|max:255',
     //            'password' => 'required',
     //    ];

       // echo $request;die();  

    	if (auth()->attempt(['email'=>$request->input('email'),'password'=>$request->input('password')]))
    	{
            $users=auth()->id();

            // echo $users;die();
            
    		return view('users.userProfile')->with(['user'=>$users]);
    	}
    		return redirect(route('login'))->with(['message'=>'Invalid User-Id or Password ']); 
    }

    public function userProfile()
    {
    	return view('users.userProfile');
    }

    public function userLogout()
    {
    	auth()->logout();//This function will do session destroy 

        return redirect(route('login'))->with(['message'=>'Logout Successfully']);
    	
    }

    public function userLike(Request $request)
    {


    }
}
