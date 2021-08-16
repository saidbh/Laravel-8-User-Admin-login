<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ClientController extends Controller
{

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateClient(Request $request, $id)
    {
        //
		$request->post();
		$request->validate([
		'name' => 'bail|required|string',
		'email' => 'bail|required|email',
		'type' => 'bail|required|numeric',
		]);
		if(User::where('id',$id)->update(['name' => $request->name,'email' => $request->email,'is_admin' => $request->type,]))
		{
			//
			return back()->with('success','Client updated !');
			
		}else
		{
			//
			return back()->with('fail','Client not updated !');
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyClient(Request $request, $id)
    {
        //
		if(User::where('id', $id)->delete())
		{
			//
			return back()->with('success','Developer Deleted !');
			
		}else
		{
			//
			return back()->with('fail','Developer not Deleted !');
		}
    }
}
