<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Unit;
class AuthController extends Controller
{
    public function verifyAuth(){
        if(Auth::check()){
            $this->browser();
        }else{
             return view('login');
        }
    }
    public function browser(){
      
       return view('index');
   }
   public function login(Request $request){

    
        $credentials = $request->only('email','password');
       
        !empty($request->remember) ? $lembrar = true : $lembrar=false;
         if (Auth::attempt($credentials,$lembrar))
        {
            return redirect()->intended('index');
        }
   }
}
