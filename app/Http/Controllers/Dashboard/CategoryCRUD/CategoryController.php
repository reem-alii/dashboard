<?php

namespace App\Http\Controllers\Dashboard\CategoryCRUD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\Dashboard\CRUD\CatRequest;

class CategoryController extends Controller
{
    public function showCreateForm(){
        return view('dashboard.category_CRUD.create_category_form');
    }
    public function createCategory(CatRequest $request){
        Category::create([
            'name'        => $request->name,
            'description' => $request->description,
            'allow_ads'   => $request->allow_ads,
        ]);
        return redirect()->back()->with('success', 'Category created successfully');
    }
    public function showEditForm($id){
        $category = Category::find($id);
        return view('dashboard.category_CRUD.edit_category_form',compact('category'));
    }
    public function updateCategory(CatRequest $request, $id){
        $category = Category::find($id);
        $category->update([
            'name'        => $request->name,
            'description' => $request->description,
            'allow_ads'   => $request->allow_ads,
        ]);

        return redirect()->back()->with('success', 'Category Updated successfully');;
    }
    public function deleteCategory($id){
        Category::destroy($id);
        return redirect()->back()->with('success', 'Category deleted successfully');
    }
}
