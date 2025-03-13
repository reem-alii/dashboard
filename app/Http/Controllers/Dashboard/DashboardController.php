<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Cart;
use App\Models\Category;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\Comment;

class DashboardController extends Controller
{
    public function showDashboard(){

        // $count_users = User::all(); لو هحتاج كل بيانات اليوزر
        // $count_users->count(); عدد الكولكشن

        $count_users = User::count(); 
        $count_products = Product::count();
        $count_orders = Order::count();
         
        $latest_users = User::orderBy('id', 'desc')->take(3)->get();
        $latest_orders = Order::orderBy('id', 'desc')->take(3)->get();
        $latest_products = Product::orderBy('id', 'desc')->take(3)->get();

        return view('dashboard.dashboard', compact('latest_users', 'latest_orders', 'latest_products', 'count_users', 'count_products', 'count_orders'));

    }
    public function showAdminsTable(){
        $admins = Admin::all();
        return view('dashboard.admin_CRUD.admins_table', compact('admins'));
    }
    public function showUsersTable(){
        $users = User::all();
        return view('dashboard.user_CRUD.users_table', compact('users'));
    }
    public function uploadPhoto(Request $request){
        dd('click');
        $request->validate([
            'image' => 'required|image|max:2048',
        ]);
        $imagepath = $request->file('image')->store('images','public');
        $admin = auth('admin')->user();
        $admin->image = $imagepath;
        $admin->save();
        return back()->with('success', 'Image uploaded successfully');
    }

    public function showProductsTable(){
        $products = Product::all();
        return view('dashboard.product_CRUD.products_table', compact('products'));
    }

    public function showCategoriesTable(){
        $categories = Category::all();
        return view('dashboard.category_CRUD.categories_table', compact('categories'));
    }
    public function showCommentsTable(){
        $comments = Comment::all();
        return view('dashboard.comment_CRUD.comments_table', compact('comments'));
    }
    public function showOrdersTable(){
        $orders = Order::all();
        return view('dashboard.order_CRUD.orders_table', compact('orders'));
    }
}
