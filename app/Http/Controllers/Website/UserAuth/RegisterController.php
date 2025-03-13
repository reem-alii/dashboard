<?php

namespace App\Http\Controllers\Website\UserAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Website\User\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function showRegisterationForm(){
        return view('website.auth.register');
    }
    public function userRegister(UserRequest $request){
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        Auth::login($user);
        return redirect()->route('user.Index');

    }
}
