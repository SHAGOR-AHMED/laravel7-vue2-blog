<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::ADMIN_DASHBOARD;

    public function showLoginForm(){

        return view('admin.login.login');
    }

    public function login(Request $request){

        //validate login data
        $request->validate([
            'email' => 'required|max:50',
            'password' => 'required'
        ]);
        //attempt to login
        if(Auth::guard('admin')->attempt([ 'email'=>$request->email,'password'=>$request->password])){
            //redirect to dashboard
            session()->flash('message','Successfully logged in');
            return redirect()->intended(route('admin.dashboard'));
        }else{
            //search using username or phone
            if(Auth::guard('admin')->attempt([ 'username'=>$request->email,'password'=>$request->password])){
                //redirect to dashboard
                session()->flash('message','Successfully logged in');
                return redirect()->intended(route('admin.dashboard'));
            }
            //error
            session()->flash('message','Invalid Credentials');
            return back();
        }
        
    }

    
    public function logout(){

        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }


}//LoginController