<?php

namespace App\Http\Controllers\Website\UserAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function __invoke(){
        auth()->logout();
        return redirect()->route('user.login.form');
       }
}
