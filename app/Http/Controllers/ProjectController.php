<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectModel;

class ProjectController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
		$request->post();
		$request->validate([
		  'clientname' =>'bail|required|string',
		  'devname' =>'bail|required|string',
		  'idclient' =>'bail|required|numeric',
		  'iddeveloper' =>'bail|required|numeric',
		  'projectname' =>'bail|required|string',
		  'startdate' =>'bail|required|date',
		  'enddate' =>'bail|required|date',
		  'description' =>'bail|required|string',
		]);
		if(ProjectModel::create(['id_client'=> $request->idclient, 'id_developer'=> $request->iddeveloper,'client_name'=> $request->clientname, 'developer_name'=> $request->devname, 'project_name'=> $request->projectname, 'start_date'=> $request->startdate, 'end_date'=> $request->enddate, 'description'=> $request->description]))
		{
			//
			return back()->with('success','Project affected !');
		}else
		{
			//
			return back()->with('fail','Project not affected !');
		}
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProject(Request $request, $id)
    {
        //

		$request->post();
		$request->validate([
		  'clientname' =>'bail|required|string',
		  'devname' =>'bail|required|string',
		  'idclient' =>'bail|required|numeric',
		  'iddeveloper' =>'bail|required|numeric',
		  'projectname' =>'bail|required|string',
		  'startdate' =>'bail|required|date',
		  'enddate' =>'bail|required|date',
		  'description' =>'bail|required|string',
		]);
		if(ProjectModel::where('id',$id)->update(['id_client'=> $request->idclient, 'id_developer'=> $request->iddeveloper,'client_name'=> $request->clientname, 'developer_name'=> $request->devname, 'project_name'=> $request->projectname, 'start_date'=> $request->startdate, 'end_date'=> $request->enddate, 'description'=> $request->description]))
		{
			//
			return back()->with('success','Project updated !');
		}else
		{
			//
			return back()->with('fail','Project not updated !');
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyProject($id)
    {
        //

		if(ProjectModel::where('id', $id)->delete())
		{
			//
			return back()->with('success','Project Deleted !');

		}else
		{
			//
			return back()->with('fail','Project not Deleted !');
		}
    }
	
	
	 /**
     * Get the specified resource from storage USING axios.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	 
	 Public function getClientProject(Request $request)
	 {
		 //
		 
		 $id = $request->data;
		 $data = ProjectModel::where('id_client',$id)->get();
		 
		 return response()->json(['data' => $data]);
		 
	 }
	 
	 /**
     * Get the specified resource from storage USING axios.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	 
	 	 Public function getDevelopersProject(Request $request)
	 {
		 //
		 
		 $id = $request->data;
		 $data = ProjectModel::where('id_developer',$id)->get();
		 
		 return response()->json(['data' => $data]);
	 }
}
