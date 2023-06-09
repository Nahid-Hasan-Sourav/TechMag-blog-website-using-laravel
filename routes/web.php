<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\WelcomeController;
use \App\Http\Controllers\DashboardController;
use \App\Http\Controllers\UserAuthController;
use \App\Http\Controllers\BlogController;
use \App\Http\Controllers\CategoryController;
use \App\Http\Controllers\AdminController;
use \App\Http\Controllers\ProfileController;

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
Route::get('/blog/blog-details/{id}',[BlogController::class,'blogDetails'])->name('blog.details');
Route::get('/blog/blogger-profile/{id}',[BlogController::class,'bloggerProfile'])->name('blogger.profile');
Route::get('/category-wise/blogg/{id}',[BlogController::class,'categoryWiseBlog'])->name('category-wise.blog');

Route::get('/edit/profile/{id}',[ProfileController::class,'EditProfile'])->name('edit.profile');
Route::post('/update/profile/{id}',[ProfileController::class,'updateProfile'])->name('update.profile');

//this is for admin route
Route::middleware(['checkUserRole:Admin'])->group(function () {
    Route::get('/admin-dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin-dashboard/all-user', [AdminController::class, 'allUser'])->name('admin.all-user');
    Route::get('/admin-dashboard/all-blogger', [AdminController::class, 'allBlogger'])->name('admin.all-blogger');
});

//this is for blogger route
Route::middleware(['checkUserRole:Blogger'])->group(function () {
    Route::get('/blogger-dashboard', [BlogController::class, 'index'])->name('blogger.dashboard');


    Route::post('/dashboard/create-new-blog',[BlogController::class,'createNewBlog'])->name('create.blog');
    Route::get('/dashboard/manage-blog',[BlogController::class,'manageBlog'])->name('manage.blog');
    Route::get('/dashboard/edit-blog/{id}',[BlogController::class,'editBlog'])->name('edit.blog');


    // edit blog using ajax route start here
    Route::get('/dashboard/ad/edit-blog/{id}',[BlogController::class,'editBlogAjax'])->name('blog.edit');
    Route::post('/dashboard/ed/update/{id}',[BlogController::class,'updateBlogAjax'])->name('blog.update');
     // edit blog using ajax route end here

    Route::post('/dashboard/ed/update/featureStatus/{id}',[BlogController::class,'fetureStatusUpdate'])->name('featureStatus.update');

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

