<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    public function index(){
        return view('auth.login');
    }

    public function login(){
        $user = auth()->attempt([
            'phone'=>request('phone'),
            'password'=>request('password')
        ]);

        if ($user){
            return redirect(route('home.index'));
        }

        return back()->withInput()->withErrors('Identifiant ou mot de passe incorrect');
    }

}
