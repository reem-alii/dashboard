<?php

namespace App\Http\Controllers\Website\UserAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Website\User\LoginRequest;

class LoginController extends Controller
{
    public function showUserLoginForm(){
        return view('website.auth.login');
    }
    public function authenticateUser(LoginRequest $request){        
        if (auth()->attempt($request->only('email','password'))){
            return redirect()->route('user.Index');
        }
        return back()->withInput($request->only('email'))
        ->withErrors([
        'email' => 'Wrong Email or Password',]);
    }  
}
