<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(){
        return view('register');
    }

    public function simpanuser(Request $request){
        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt ($request ->password)
        ]);

        return redirect('/register');
    }

    public function login(){
        return view('login');
    }

    public function ceklogin(Request $request){
        if (!Auth::attempt([
            'nama' => $request -> nama,
            'password' => $request -> password
        ])){
            return redirect('/login');
        }
        else{
            return ("Berhasil Login");
        }
    }
}
