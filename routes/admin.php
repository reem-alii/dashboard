<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Dashboard\Auth\LoginController;
use App\Http\Controllers\Dashboard\Auth\LogoutController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\AdminCRUD\AdminController;
use App\Http\Controllers\Dashboard\UserCRUD\UserController;
use App\Http\Controllers\Dashboard\ProductCRUD\ProductController;
use App\Http\Controllers\Dashboard\CategoryCRUD\CategoryController;
use App\Http\Controllers\Dashboard\CommentCRUD\CommentController;
use App\Http\Controllers\Dashboard\Order\OrderController;
use Symfony\Component\HttpKernel\Profiler\Profile;

/*

|--------------------------------------------------------------------------

| Admin Routes

|--------------------------------------------------------------------------

|

| Here is where you can register admin routes for your application. These

| routes are loaded by the RouteServiceProvider within a group which

| contains the "admin" middleware group. Now create something great!

|

*/


// Route::get('/a', function () {
//     return view('Auth.admin.login');
// });

//Auth Routes
Route::get('/login',[LoginController::class, 'showLoginForm'])->name('admin.login.form');
Route::post('/login',[LoginController::class, 'authinticateAdmin'])->name('admin.login.submit');
Route::get('/logout',LogoutController::class)->name('admin.logout');

Route::middleware(['isAdmin'])->group(function () {
     
     //Dashboard & Profile
     Route::get('/dashboard',[DashboardController::class, 'showDashboard'])->name('admin.dashboard');
     Route::get('/profile',[ProfileController::class, 'goToProfile'])->name('admin.profile');
     Route::put('/profile/update',[ProfileController::class, 'updateProfile'])->name('admin.update.profile');
     Route::post('/profile/settings',[ProfileController::class, 'updateSettings'])->name('admin.update.settings');
     //side navbar camera icon
     Route::post('/upload/photo',[DashboardController::class, 'uploadPhoto'])->name('upload.photo');

     //Admin CRUD
     Route::get('/admin', [DashboardController::class, 'showAdminsTable'])->name('admins.table');
     Route::get('/admin/create', [AdminController::class, 'showCreateForm'])->name('create.admin.form');
     Route::post('/admin/create', [AdminController::class, 'createAdmin'])->name('store.admin');
     Route::get('/admin/{id}/edit', [AdminController::class, 'showEditForm'])->name('edit.admin.form');
     Route::put('/admin/{id}/edit', [AdminController::class, 'updateAdmin'])->name('update.admin');
     Route::delete('/admin/{id}/delete', [AdminController::class, 'deleteAdmin'])->name('delete.admin');
     Route::get('/admin/{id}/show', [AdminController::class, 'showAdmin'])->name('show.admin');

     //User CRUD
     Route::get('/user', [DashboardController::class, 'showUsersTable'])->name('users.table');
     Route::get('/user/create', [UserController::class, 'showCreateForm'])->name('create.user.form');
     Route::post('/user/create', [UserController::class, 'createUser'])->name('store.user');
     Route::get('/user/{id}/edit', [UserController::class, 'showEditForm'])->name('edit.user.form');
     Route::put('/user/{id}/edit', [UserController::class, 'updateUser'])->name('update.user');
     Route::delete('/user/{id}/delete', [UserController::class, 'deleteUser'])->name('delete.user');
     Route::get('/user/{id}/show', [UserController::class, 'showUser'])->name('show.user');

     //Product CRUD
     Route::get('/product', [DashboardController::class, 'showProductsTable'])->name('products.table');
     Route::get('/product/create', [ProductController::class, 'showCreateForm'])->name('create.product.form');
     Route::post('/product/create', [ProductController::class, 'createProduct'])->name('store.product');
     Route::get('/product/{id}/edit', [ProductController::class, 'showEditForm'])->name('edit.product.form');
     Route::put('/product/{id}/edit', [ProductController::class, 'updateProduct'])->name('update.product');
     Route::delete('/product/{id}/delete', [ProductController::class, 'deleteProduct'])->name('delete.product');
     Route::get('/product/{id}/show', [ProductController::class, 'showProduct'])->name('show.product');
     Route::get('/product/{id}/approve', [ProductController::class, 'approveProduct'])->name('approve.product');

     //Category CRUD
     Route::get('/category', [DashboardController::class, 'showCategoriesTable'])->name('categories.table');
     Route::get('/category/create', [CategoryController::class, 'showCreateForm'])->name('create.category.form');
     Route::post('/category/create', [CategoryController::class, 'createCategory'])->name('store.category');
     Route::get('/category/{id}/edit', [CategoryController::class, 'showEditForm'])->name('edit.category.form');
     Route::put('/category/{id}/edit', [CategoryController::class, 'updateCategory'])->name('update.category');
     Route::delete('/category/{id}/delete', [CategoryController::class, 'deleteCategory'])->name('delete.category');

     //Comment CRUD
     Route::get('/comment', [DashboardController::class, 'showCommentsTable'])->name('comments.table');
     Route::delete('/comment/{id}/delete', [CommentController::class, 'deleteComment'])->name('delete.comment');

     //Order CRUD
     Route::get('/order', [DashboardController::class, 'showOrdersTable'])->name('orders.table');
     //Route::delete('/order/{id}/delete', [OrderController::class, 'deleteOrder'])->name('delete.order');
     Route::get('/order/{id}/show', [OrderController::class, 'showOrderDetails'])->name('show.order');
     Route::put('/order/{id}/edit', [OrderController::class, 'editOrder'])->name('edit.order');

     //Order_items Routes
     Route::get('/order-item/{id}/remove', [OrderController::class, 'removeItem'])->name('remove.item');
     Route::post('/update/{id}/quantity',[OrderController::class, 'updateQuntity'])->name('update.quantity');

     Route::resource('permissions', App\Http\Controllers\PermissionController::class);
    Route::get('permissions/{permissionId}/delete', [App\Http\Controllers\PermissionController::class, 'destroy']);

    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::get('roles/{roleId}/delete', [App\Http\Controllers\RoleController::class, 'destroy']);
    Route::get('roles/{roleId}/give-permissions', [App\Http\Controllers\RoleController::class, 'addPermissionToRole']);
    Route::put('roles/{roleId}/give-permissions', [App\Http\Controllers\RoleController::class, 'givePermissionToRole']);

    Route::resource('users', App\Http\Controllers\AdminController::class);
    Route::get('users/{userId}/delete', [App\Http\Controllers\AdminController::class, 'destroy']);


     
});