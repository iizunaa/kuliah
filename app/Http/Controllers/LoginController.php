<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Function_;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public Function index(){
        
        return view('login.login',[
            "title" => "Login",
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials= $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);

        if(auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->intended('/home');
        }
        return back()->with('loginerror','login failed ¯\_ʘᗜʘ_/¯');
       
    }

    public function logout(Request $request)
    {
        Auth::logout();
     
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/home');
    }
}
