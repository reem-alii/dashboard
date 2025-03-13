<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class PermissionController extends Controller
{
    public function __construct()
    {
       
    }

    public function index()
    {
        $permissions = Admin::get();
        return view('role-permission.permission.index', ['permissions' => $permissions]);
    }

    public function create()
    {
        return view('role-permission.permission.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:permissions,name'
            ]
        ]);

       
        return redirect('permissions')->with('status','Permission Created Successfully');
    }

    public function edit()
    {
    }

    public function update()
    {
        
        return redirect('permissions')->with('status','Permission Updated Successfully');
    }

    public function destroy($permissionId)
    {
        return redirect('permissions')->with('status','Permission Deleted Successfully');
    }

}
