<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use App\Models\Blog;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('authentication.register');
});

Route::get('/login', [AuthenticationController::class, 'login']);
Route::get('/logout', [AuthenticationController::class, 'logout']);
Route::get('/register', [AuthenticationController::class, 'register']);

Route::post('/post-register', [AuthenticationController::class, 'registerUser']);
Route::post('/post-login', [AuthenticationController::class, 'loginUser']);

Route::get('/admin-dashboard', [UserController::class, 'getUserDashboard']);

Route::get('/blog', [BlogController::class, 'getCreateBlog']);
Route::post('/create-blog', [BlogController::class, 'postCreateBlog']);

Route::get('/all-blogs', [BlogController::class, 'getAllBlogs']);

Route::get('/delete-blog/{blog_id}', [BlogController::class, 'deleteBlog']);
Route::get('/edit-blog/{blog_id}', [BlogController::class, 'editBlog']);
Route::post('/edit-blog/{blog_id}', [BlogController::class, 'postEditBlog']);