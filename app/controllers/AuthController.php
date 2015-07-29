<?php

class AuthController extends BaseController
{

    public function login()
    {
        $data = Input::only('email','password','remember');

        $credentials = ['email' => $data['email'],'password' => $data['password']];

        if(Auth::attempt($credentials))
        {
            return Redirect::route('home');
        }
        return Redirect::back()->with('login_error',1);

    }

    public function logout()
    {
        Auth::logout();
        return Redirect::route('login');
    }

}