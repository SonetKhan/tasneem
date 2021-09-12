<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{


    public function login(){

        return view('authentication.login');
    }
    public function session(Request $request){



        $credentials  = $request->validate([

            'mobile' => ['required'],

            'password' => ['required'],


        ]);

            $mobile  = $request->mobile;

            $password = $request->password;


        if (Auth::attempt(['mobile' => $mobile, 'password' => $password, 'user_active' => 1])) {


            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }
        else{


            return back()->with('errors','The provided credentials do not match our records or You are deactivated by our authorities');
        }



    }

    public function logout(Request $request){

        Auth::logout();

        $request->session()->invalidate();

        return redirect('/');


    }
}
