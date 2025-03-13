<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Website\Cart\CartController;
use App\Http\Controllers\Website\Comment\CommentController;
use Illuminate\Support\Facades\App;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;



use App\Http\Controllers\Website\UserAuth\LoginController;
use App\Http\Controllers\Website\UserAuth\RegisterController;
use App\Http\Controllers\Website\UserAuth\LogoutController;
use App\Http\Controllers\Website\UserProfile\ProfileController;
use App\Http\Controllers\Website\Index\IndexController;
use App\Http\Controllers\Website\Order\OrderController;
use App\Http\Controllers\Website\Products\ProductController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('dashboard');
// })->name('dashboard');


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','localize' ]
    ],
    function()
    {
        /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
        // Homepage and Index Routes
        Route::get('/',[IndexController::class, 'showIndex'])->name('user.Index');
        Route::get('/cat/{id}',[IndexController::class, 'showCategory'])->name('user.category');
        Route::get('/product/all',[IndexController::class, 'all'])->name('all.products');

        // Products Routes
        Route::get('/products', [ProductController::class, 'showAllProducts'])->name('products.index');
        Route::get('/products/{id}', [ProductController::class, 'showProductDetails'])->name('product.details');

        // Auth Routes
        Route::get('/register/user',[RegisterController::class,'showRegisterationForm'])->name('user.register.form');
        Route::post('/register/user',[RegisterController::class, 'userRegister'])->name('user.register');
        Route::get('/login/user',[LoginController::class, 'showUserLoginForm'])->name('user.login.form');
        Route::post('/login/user',[LoginController::class, 'authenticateUser'])->name('user.authenticate');
        Route::get('/logout/user',LogoutController::class)->name('user.logout');
        Route::post('/store/post',[PostController::class, 'storePost'])->name('posts.store');
        Route::get('/show/posts',[PostController::class,'showPosts'])->name('showposts');

        Route::middleware(['auth'])->group(function () {
            Route::get('/cart',[CartController::class, 'showCart'])->name('show.user.cart');

        });


    });
    

Route::middleware(['auth'])->group(function () {
    
    // Profile Routes
    Route::get('/profile',[ProfileController::class, 'goToProfile'])->name('user.profile');
    Route::put('/profile/update',[ProfileController::class, 'updateProfile'])->name('user.update.profile');
    Route::post('/profile/settings',[ProfileController::class, 'updateSettings'])->name('user.update.settings');

    // Cart Routes
    Route::post('/cart/add/{id}',[CartController::class, 'addToCart'])->name('add.to.cart');
    Route::delete('/cart/remove/{id}',[CartController::class, 'removeFromCart'])->name('remove.from.cart');
    //Route::put('/cart/update/{id}',[CartController::class, 'updateQuantity'])->name('update.cart.quantity');

    // Order Routes
    Route::get('/orders',[OrderController::class, 'showAllOrders'])->name('user.orders');
    Route::get('/create/order',[OrderController::class, 'createOrder'])->name('create.order');
    Route::put('/update/order',[OrderController::class, 'updateOrder'])->name('update.order');

    // Check order Owner
    //Route::middleware(['verify_owner'])->group(function () {
         Route::get('/order/{id}',[OrderController::class, 'showOrderDetails'])->name('user.order.details');
         Route::delete('/delete/order/{id}',[OrderController::class, 'deleteOrder'])->name('user.delete.order');
    //});

    // Comments Routes
    Route::post('/save/comment',[CommentController::class,'saveComment'])->name('save.comment');

});

