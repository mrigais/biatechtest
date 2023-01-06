<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Input\Input;

class BlogController extends Controller
{

    public function getCreateBlog(Request $request){
        $user = User::where('id', $request->session()->get('user_id'))->first();
        return view('blog.create', ['user' => $user]);
    }


    public function postCreateBlog(Request $request){

        $request->validate([
            'title' => 'required|string',
            'image' => 'required',
            'description' => 'required|string|min:6',
            'author' => 'required'
        ]);
                
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->user_id = $request->session()->get('user_id');
        $blog->description = $request->description;
        //storing the image path.
        $blog->image = $request->image;
        $blog->author = $request->author;
        $blog->published = 0;

        $blog_created = $blog->save();

        if($blog_created){
            return redirect('/all-blogs')->with('message', 'Blog Created Successfully!'); 
        }else{
            return back()->with('message', 'User does not exist');
        }
    }

    public function getAllBlogs(){
        $blogs = Blog::where('user_id', Session::get('user_id'))->get();
        $user = User::where('id', Session::get('user_id'))->first();
        return view('user.blogs', ['blogs' => $blogs, 'user' => $user]);
    }

    public function deleteBlog($blog_id){
        
        $existing_blog = Blog::where('id', $blog_id)->first();
        if($existing_blog){
            $delete = Blog::where('id', $blog_id)->delete();
            if($delete){
                return redirect()->back()->with('message', 'Blog deleted successfully');
            }else{
                return redirect()->back()->with('message', 'Something went wrong, blog was not deleted.');
            }            
        }else{
            return redirect()->back()->with('message', 'Oops, no such blog was found in the db.');
        }    
    }

    public function editBlog($blog_id){
        
        $blog_data = Blog::where('id', $blog_id)->first();
        $user = User::where('id', Session::get('user_id'))->first();
        if($blog_data){
            return view('blog.edit', ['blog' => $blog_data, 'user' => $user]);
        }
    }

    public function postEditBlog(Request $request){

        $request->validate([
            'title' => 'required|string',
            'image' => 'required',
            'description' => 'required|string|min:6',
            'author' => 'required'
        ]);
        
        $blog = Blog::where('id', $request->blog_id)->first();

        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->image = $request->image;
        $blog->author = $request->author;
        $blog_updated = $blog->save();

        if($blog_updated){
            return redirect('/all-blogs')->with('message', 'Blog Updated Successfully!'); 
        }else{
            return redirect('/all-blogs')->with('message', 'Something went wrong, could not update the blog!'); 
        }
    }
}
