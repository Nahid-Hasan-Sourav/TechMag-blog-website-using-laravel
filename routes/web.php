<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\WelcomeController;
use \App\Http\Controllers\DashboardController;
use \App\Http\Controllers\UserAuthController;

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
    Route::get('/blogger-dashboard', [DashboardController::class, 'bloggerDashboard'])->name('blogger.dashboard');


    Route::post('/dashboard/create-new-blog',[DashboardController::class,'createNewBlog'])->name('create.blog');
    Route::get('/dashboard/manage-blog',[DashboardController::class,'manageBlog'])->name('manage.blog');


    Route::post('/dashboard/add-category',[DashboardController::class,'addCategory'])->name('add.category');
    Route::get('/dashboard/add-blog-category',[DashboardController::class,'addBlogCategory'])->name('add.blog.category');
    Route::get('/dashboard/manage-blog-category',[DashboardController::class,'manageCategory'])->name('manage.category');
    Route::get('/dashboard/edit-category/{id}',[DashboardController::class,'editCategory'])->name('edit.category');
    Route::post('/dashboard/update-category/{id}',[DashboardController::class,'updateCategory'])->name('update.category');
    Route::post('/dashboard/delete-category/{id}',[DashboardController::class,'deleteCategory'])->name('delete.category');


});


//this is for user route
Route::middleware(['checkUserRole:User'])->group(function () {
    Route::get('/user-dashboard', [DashboardController::class, 'userDashboard'])->name('user.dashboard');
});

