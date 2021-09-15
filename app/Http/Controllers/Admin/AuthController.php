<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        $data = $this->validate($request , [
            "email"=>"required|email",
            "password"=>"required|min:6"
        ]);

        if(auth()->guard('admin')->attempt($data,true)){
            return redirect(aurl('/'));
        }
        return back();
    }

}
