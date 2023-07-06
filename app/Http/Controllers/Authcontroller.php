<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;




class Authcontroller extends Controller
{
    //
    public function loadRegister()
    {
        return view('register');
    }
    public function studentRegister(Request $request)
    {
        $request->validate([
            'name' => 'string|required|min:2',
            'email' => 'string|email|required|max:100|unique:users',
            'password' => 'string|required|confirmed|min:6'
        ]);
  
        $user = new user;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success','your Registration has been successful.');

    }

    public function loadLogin()
    {
        return view('login');
    }

    public function userlogin(Request $request)
    {
        $request->validate([
            'email'=> 'string|required|email',
            'password'=> 'string|required'
        ]);
        $userCredential = $request->only('email','password');

        if(Auth::attempt($userCredential))
        {

        }
        else{
            return back()->with('error' ,'Username & Password is incorrect');
        }

        
    }
}