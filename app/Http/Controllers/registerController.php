<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class registerController extends Controller
{
    //
    public function register(Request $request)
    {
		
        $request->validate([
            'name' => 'bail|required',
            'email' => 'bail|required|email|unique:users',
            'password' => 'bail|required|min:6',
            'type' => 'bail|required',

        ]);
		if($request->password === $request->repassword)
		{
			//
		 if(User::insert(['name' => $request->name,'email' => $request->email,'is_admin' => $request->type,'password' => Hash::make($request->password)])){
            //
			return response()->json(['data' => true]);
			
        }else{
            //
			return response()->json(['data' => false]);
        }
			//
		}else
		{
			//
			return response()->json(['data' => false]);
		}
    }


}
