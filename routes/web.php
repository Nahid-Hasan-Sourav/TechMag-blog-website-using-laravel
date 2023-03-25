<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\WelcomeController;
use \App\Http\Controllers\DashboardController;

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
Route::get('/login',[WelcomeController::class,'login'])->name('login');
Route::get('/sign-up',[WelcomeController::class,'registration'])->name('signUp');
Route::post('/create-user',[WelcomeController::class,'createUser'])->name('user.signUp');
Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
Route::get('/dashboard/add',[DashboardController::class,'addBlog'])->name('add.blog');
Route::get('/dashboard/manage',[DashboardController::class,'manageBlog'])->name('manage.blog');
