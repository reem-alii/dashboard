<?php

namespace App\Http\Controllers\Dashboard\ProductCRUD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\CRUD\ProductRequest;
use App\Models\Product;
use App\Models\Admin;
use App\Models\Category;

class ProductController extends Controller
{
    public function showCreateForm(){
        $admins = Admin::all();
        $categories = Category::all();

        return view('dashboard.product_CRUD.create_product_form', compact('admins', 'categories'));
    }
    public function createProduct(ProductRequest $request){
        $imagepath = $request->file('image')->store('images','public');
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'size' => $request->size,
            'color' => $request->color,
            'image' => $imagepath,
            'quantity' => $request->quantity,
            'admin_id' => $request->admin_id,
            'category_id' => $request->category_id,
        ]);
        return redirect()->back()->with('success', 'Product created successfully');
    }
    public function showEditForm($id){
        $product = Product::find($id);
        $admins = Admin::all();
        return view('dashboard.product_CRUD.edit_product_form',compact('product','admins'));
    }
    public function updateProduct(ProductRequest $request, $id){
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'size' => 'required',
            'color' => 'required',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'quantity' =>'required|numeric',
        ]);
        $product = Product::find($id);
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'size' => $request->size,
            'color' => $request->color,
            'quantity' => $request->quantity,
            'admin_id' => $request->admin_id,
            'category_id' => $request->category_id
        ]);
        if(!empty($request->file('image'))){
            $imagepath = $request->file('image')->store('images','public');
            $product->update(['image' => $imagepath]);
        }
        return redirect()->back()->with('success', 'Product Updated successfully');;
    }
    public function deleteProduct($id){
        Product::destroy($id);
        return redirect()->back()->with('success', 'Product deleted successfully');
    }
    public function showProduct($id){
        $product = Product::find($id);
        return view('dashboard.product_CRUD.show_product', compact('product'));
    }
    public function approveProduct($id){
        $product = Product::find($id);
        $product->update(['Approve' => 1]);
        return redirect()->back()->with('success', 'Product approved successfully');
    }
}
