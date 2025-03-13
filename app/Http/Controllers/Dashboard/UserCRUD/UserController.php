<?php

namespace App\Http\Controllers\Dashboard\UserCRUD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\CRUD\UserRequest;
use App\Models\User;



class UserController extends Controller
{
    public function showCreateForm(){
        return view('dashboard.user_CRUD.create_user_form');
    }
    public function createUser(UserRequest $request){
        User::create([
            'first_name'  => $request->first_name,
            'last_name'   => $request->last_name,
            'age'       => $request->age,
            'address'       => $request->address,
            'national_id'       => $request->national_id,
            'email'       => $request->email,
            'password'    => $request->password,
        ]);
        return redirect()->back()->with('success', 'User created successfully');
    }
    public function showEditForm($id){
        //dd($_SERVER['REQUEST_METHOD']);
        $user = User::find($id);
        return view('dashboard.user_CRUD.edit_user_form',compact('user'));
    }
    public function updateUser(UserRequest $request, $id){
        $user = User::find($id);
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
            $user->update(['image' => $imagepath]);
        }
        if($request->filled('new_password')){
            $user->update(['password' => $request->new_password]);
        }
        return redirect()->back()->with('success', 'User Updated successfully');;
    }
    public function deleteUser($id){
        //$user = User::find($id);
        //dd($user);
        //$user->truncate();
        //User::where('id',$id)->truncate();
        User::destroy($id);
        return redirect()->back()->with('success', 'User deleted successfully');
    }
    public function showUser($id){
        $user = User::find($id);
        return view('dashboard.user_CRUD.show_user', compact('user'));
    }
}
