<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\WelcomeController;
use \App\Http\Controllers\DashboardController;
use \App\Http\Controllers\UserAuthController;
use \App\Http\Controllers\BlogController;
use \App\Http\Controllers\CategoryController;

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

Route::get('/',[WelcomeController::class,'index'])->name('home');
Route::get('/login',[UserAuthController::class,'index'])->name('login');
Route::get('/logout',[UserAuthController::class,'logout'])->name('logout');
Route::post('/login',[UserAuthController::class,'login'])->name('login');
Route::get('/sign-up',[UserAuthController::class,'registration'])->name('signUp');
Route::post('/create-user',[UserAuthController::class,'createUser'])->name('user.signUp');


//this is for admin route
Route::middleware(['checkUserRole:Admin'])->group(function () {
    Route::get('/admin-dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
});

//this is for blogger route
Route::middleware(['checkUserRole:Blogger'])->group(function () {
    Route::get('/blogger-dashboard', [BlogController::class, 'index'])->name('blogger.dashboard');


    Route::post('/dashboard/create-new-blog',[BlogController::class,'createNewBlog'])->name('create.blog');
    Route::get('/dashboard/manage-blog',[BlogController::class,'manageBlog'])->name('manage.blog');
    Route::get('/dashboard/edit-blog/{id}',[BlogController::class,'editBlog'])->name('edit.blog');
    Route::post('/dashboard/update-blog/{id}',[BlogController::class,'updateBlog'])->name('update.blog');
    Route::post('/dashboard/delete-blog/{id}',[BlogController::class,'deleteBlog'])->name('delete.blog');


    Route::post('/dashboard/add-category',[CategoryController::class,'addCategory'])->name('add.category');
    Route::get('/dashboard/add-blog-category',[CategoryController::class,'addBlogCategory'])->name('add.blog.category');
    Route::get('/dashboard/manage-blog-category',[CategoryController::class,'manageCategory'])->name('manage.category');
    Route::get('/dashboard/edit-category/{id}',[CategoryController::class,'editCategory'])->name('edit.category');
    Route::post('/dashboard/update-category/{id}',[CategoryController::class,'updateCategory'])->name('update.category');
    Route::post('/dashboard/delete-category/{id}',[CategoryController::class,'deleteCategory'])->name('delete.category');


});


//this is for user route
Route::middleware(['checkUserRole:User'])->group(function () {
    Route::get('/user-dashboard', [DashboardController::class, 'userDashboard'])->name('user.dashboard');
});

