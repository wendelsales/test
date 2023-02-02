<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Unit;
class AuthController extends Controller
{
   public function login(Request $request){
        $array = ['error'=>''];

        $validator = Validator::make($request->all(), [
            'cpf' =>'required|digits:11',
            'password'=>'required'
        ]);

        if(!$validator->fails()){
            $cpf=$request->input('cpf');
            $password=$request->input('password');

            $token=auth()->attempt([
                'cpf'=>$cpf,
                'password'=>$password
            ]);
            
            if(!$token) {
                $array['error'] = 'CPF OU SENHA ESTAO ERRADOS';
                return $array;
            }
            $array['token']=$token;

            $user = auth()->user();
            $array['user']=$user;

            $properties = Unit::select(['id','name'])
            ->where('id_owner',$user['id'])
            ->get();

            $array['user']['properties'] =$properties;
        }else{
            $array['error']=$validator->errors()->first();
            return $array;
        }
        return $array;
   }
}
