<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Blog;
use Faker\Core\Blood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function getUserDashboard(Request $request){
        $userBlogs = Blog::where('user_id', $request->session()->get('user_id'))->get();
        $user = User::where('id', Session::get('user_id'))->first();

        return view('user.dashboard', ["blogs" => $userBlogs, "user" => $user]);
    }
}
