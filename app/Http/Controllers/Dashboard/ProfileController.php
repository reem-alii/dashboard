<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;



class ProfileController extends Controller
{   
    public function goToProfile(){

        $admin = auth('admin')->user();
        return view('dashboard.profile', compact('admin'));
    }
    public function updateProfile(AdminRequest $request){
        $admin = auth('admin')->user();
        $admin->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
        if(!empty($request->file('image'))){
            $imagepath = $request->file('image')->store('images','public');
            $admin->update(['image' => $imagepath,]);
        }
        if($request->filled('new_password')){
            $admin->update(['password' => $request->new_password]);
        }
        return redirect()->back()->with('success', 'Profile Updated Successfully');
    }
}
