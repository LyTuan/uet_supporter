<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\User;
// use App\Socials;

class LoginController extends Controller
{
    //
    public function getLogin(){
    	if(!Auth::check()){//Kiểm tra login chưa
    		return view('login');
    	}else{
    		return redirect()->route('trangchu');
    	}	
    }
    public function postLogin(LoginRequest $request){
    	if (Auth::attempt(['email' => $request->txtMail, 'password' => $request->txtPass])) {
            // Authentication passed...
            return redirect()->route('trangchu');
        }else{
        	return redirect()->back();
        }
    }
    public function getLogout(){
    	Auth::logout();
    	return redirect()->route('getLogin');
    }
}
