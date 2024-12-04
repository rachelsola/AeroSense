<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(){
        return view('register');
    }

    public function registerLogin(Request $request){
        if(Auth::attempt($request->only('name','password'))){
            return redirect('/admin');
        } else{
        return redirect()->back()->with('gagal', 'email atau password anda masih salah');
    }
}
}