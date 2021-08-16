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

        $data = $request->all();
        $check = $this->create($data);
        if($check){
            return back()->with('success','You have registred !');
        }else{
            return back()->with('fail','You have not registred !');
        }
    }


    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
			'is_admin' => $data['type'],
            'password' => Hash::make($data['password']),
            
        ]);
    }
}
