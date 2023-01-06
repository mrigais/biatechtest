<?php

namespace App\Http\Controllers;

// use App\User;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Session\Session as ContractsSessionSession;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\TryCatch;
use Session;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;

class AuthenticationController extends Controller
{

    public function login(){
        return view('authentication.login');
    }

    public function register(Request $request){
        return view('authentication.register');
    }

    public function registerUser(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'contact_number' => 'required|integer|unique:users|digits:10',
            'password' => 'required|min:6',
        ]);

            $user = new User();

            $user->name = $request->name;
            $user->email = $request->email;
            $user->contact_number = $request->contact_number;
            $user->password = Hash::make($request->password);

            $registration = $user->save();
            if($registration){
                return redirect('/login')->with('message', 'Registration Successfull, please login!');
            }else{
                return redirect('/login')->with('message', 'Something went wrong.');
            }
            
    }

    public function loginUser(Request $request) {
        $request->validate([
            'contact_number' => 'required|integer|digits:10',
            'password' => 'required|min:6',
        ]);

        $user = User::where('contact_number', '=', $request->contact_number)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                //maintaining a session on login
                $request->session()->put('user_id', $user->id);
                return view('blog.create', ['user' => $user]);
            }else{
                return back()->with('message', 'Incorrect Password, try again!');
            }
        }else{
            return back()->with('message', 'User does not exist');
        }
    }

    public function logout(Request $request){
        if($request->session()->has('user_id')){
            $request->session()->pull('user_id', 'default');
            return redirect ('login');
        }
    }
}
