<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\AdminLoginRequest;

class LoginController extends Controller
{
    public function showLoginForm(){
        return view('dashboard.auth.login');
    }
    public function authinticateAdmin(AdminLoginRequest $request){
        
        if(auth('admin')->attempt($request->only('email','password'))){
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->back()->withInput($request->only('email'))->withErrors([
                'email' => 'Invalid email or password',
            ]);
        }
    }
    
}
