<?php

namespace App\Http\Controllers\Dashboard\AdminCRUD;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CRUD\AdminRequest;
use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function showCreateForm(){
        return view('dashboard.admin_CRUD.create_admin_form');
    }
    public function createAdmin(AdminRequest $request){
        Admin::create([
            'first_name'  => $request->first_name,
            'last_name'   => $request->last_name,
            'phone'       => $request->phone,
            'email'       => $request->email,
            'password'    => $request->password,
        ]);
        return redirect()->back()->with('success', 'Admin created successfully');
    }
    public function showEditForm($id){
        $admin = Admin::find($id);
        return view('dashboard.admin_CRUD.edit_admin_form',compact('admin'));
    }
    public function updateAdmin(AdminRequest $request, $id){
        $admin = Admin::find($id);
        $admin->update([
            'first_name'  => $request->first_name,
            'last_name'   => $request->last_name,
            'phone'       => $request->phone,
            'email'       => $request->email,
        ]);
        if(!empty($request->file('image'))){
            $imagepath = $request->file('image')->store('images','public');
            $admin->update(['image' => $imagepath]);
        }
        if($request->filled('new_password')){
            $admin->update(['password' => $request->new_password]);
        }
        return redirect()->back()->with('success', 'Admin Updated successfully');;
    }
    public function deleteAdmin($id){
        //$admin = Admin::find($id);
        //$admin->truncate();
        //$admin = Admin::where('id',$id)->first();
        //$admin ->truncate();
        Admin::destroy($id);
        return redirect()->back()->with('success', 'Admin deleted successfully');
    }
    public function showAdmin($id){
        $admin = Admin::find($id);
        return view('dashboard.admin_CRUD.show_admin',compact('admin'));
    }
}
