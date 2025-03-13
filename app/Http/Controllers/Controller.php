<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Category;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function __construct(){
        $categories = Category::all();
        view()->share('categories', $categories);
        
        /*share data across all views. 
          This means that the categories variable will be available to all views in the application, 
          and you can reference it as $categories in any Blade view.
        */
    }
}


