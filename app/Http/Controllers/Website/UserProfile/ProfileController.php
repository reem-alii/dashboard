<?php

namespace App\Http\Controllers\Website\UserProfile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Website\User\UserRequest;


class ProfileController extends Controller
{   
    public function goToProfile(){

        return view('website.profile.profile');
    }
    
    public function updateProfile(UserRequest $request){
        $user = auth()->user();
        $user->update([
            'first_name'  => $request->first_name,
            'last_name'   => $request->last_name,
            'email'       => $request->email,
            'age'         => $request->age,
            'address'     => $request->address,
            'national_id' => $request->national_id,
        ]);
        if(!empty($request->file('image'))){
            $imagepath = $request->file('image')->store('images','public');
            $user->update(['image' => $imagepath,]);
        }
        if($request->filled('new_password')){
            $user->update(['password' => $request->new_password]);
        }
        
        return redirect()->back()->with('success', 'Profile Updated Successfully');
    }
}
