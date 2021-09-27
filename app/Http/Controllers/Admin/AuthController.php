<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('admin.auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function auth(Request $request)
    {
        $request->validate([
            "email"=>"required|email",
            "password"=>"required|min:6"
        ]);
        $credentials = ['email'=>$request->input('email'),'password'=>$request->input('password')];
        if(auth()->guard('admin')->attempt($credentials, true)){
            return redirect(aurl('/'));
        }
    }

    public function logout(Request $request) {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        return redirect()->route('auth.login-view');
    }

}
