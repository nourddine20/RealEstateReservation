<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
Use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;


class AdminAuthController extends Controller
{
    //


    public function formlogin()
    {
        return view('auth.login');
    }

    public function postlogin(Request $request)
    {
        request()->validate([
            'email' => 'required',
            'password' => 'required',
            ]);

            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                // Authentication passed...



                return redirect('/admin');
            }
         return redirect("admin/login")->with('error_msg','Oppes! You have entered invalid credentials');
    }

    public function logout()
    {


        session()->flush();
        Auth::logout();
        return redirect("admin/login");
    }

    public function __construct()
    {

        $this->middleware('guest:web')->except('logout');
    }


}