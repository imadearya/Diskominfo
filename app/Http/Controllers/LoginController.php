<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Routing\Controller;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function index(){
        return view('pages.sign-in');
    }

    public function auth(Request $request){
        $creadentials = $request->validate([
            'email'=>'required|email:dns',
            'password'=>'required'
        ]);

        if(Auth::attempt($creadentials)){
            $request->session()->regenerate();
            
            // return redirect()->intended('/admin');
            if( auth()->user()->role == 1 ){
                return redirect()->route('admin');
            }
            elseif( auth()->user()->role == 2 ){
                return redirect()->route('subadmin');
            }
            elseif( auth()->user()->role == 3 ){
                return redirect()->route('pemkot');
            }
    
        }
        return back()->with('loginError', 'Login Failed!');
    }

    public function logout(){
        Auth::logout();
 
        request()->session()->invalidate();
     
        request()->session()->regenerateToken();
     
        return redirect('/');
    }

}

