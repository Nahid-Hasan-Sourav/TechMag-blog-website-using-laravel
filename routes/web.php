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

//
//Route::get('/user-dashboard',[DashboardController::class,'userDashboard'])->name('user.dashboard');
//Route::get('/admin-dashboard',[DashboardController::class,'adminDashboard'])->name('admin.dashboard');
//Route::get('/blogger-dashboard',[DashboardController::class,'bloggerDashboard'])->name('blogger.dashboard');
//Route::get('/dashboard/add',[DashboardController::class,'addBlog'])->name('add.blog');
//Route::get('/dashboard/manage',[DashboardController::class,'manageBlog'])->name('manage.blog');

//Route::middleware(['checkUserRole'])->group(function (){
//    Route::get('/user-dashboard',[DashboardController::class,'userDashboard'])->name('user.dashboard');
//    Route::get('/admin-dashboard',[DashboardController::class,'adminDashboard'])->name('admin.dashboard');
//    Route::get('/blogger-dashboard',[DashboardController::class,'bloggerDashboard'])->name('blogger.dashboard');
//
//});

Route::middleware(['checkUserRole:Admin'])->group(function () {
    Route::get('/admin-dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
});

Route::middleware(['checkUserRole:Blogger'])->group(function () {
    Route::get('/blogger-dashboard', [DashboardController::class, 'bloggerDashboard'])->name('blogger.dashboard');
    Route::post('/dashboard/add-category',[DashboardController::class,'addCategory'])->name('add.category');
    Route::get('/dashboard/manage-blog',[DashboardController::class,'manageBlog'])->name('manage.blog');
    Route::get('/dashboard/add-blog-category',[DashboardController::class,'addBlogCategory'])->name('add.blog.category');
});

Route::middleware(['checkUserRole:User'])->group(function () {
    Route::get('/user-dashboard', [DashboardController::class, 'userDashboard'])->name('user.dashboard');
});

