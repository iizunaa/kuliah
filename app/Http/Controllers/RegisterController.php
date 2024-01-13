<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index(){
        return view('register.register',[
            "title" => "Register",
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
        'name' => 'required|max:225',
        'username' => 'required|min:4|max:max225',
        'email' => 'required|email:dns|unique:users',
        'password' => 'required|min:5|max:255'
       ]);

       $validateData['password'] = bcrypt($validateData['password']);

       user::create($validateData);
       $request->session()->flash('success', 'You Successfully Registered!! please login (o^▽^o)');
       return redirect('/login');
    }
}
