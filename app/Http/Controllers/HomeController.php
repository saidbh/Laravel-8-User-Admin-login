<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
		$dev = DB::table('users')->where('is_admin', 2)->get();
		
		$client = DB::table('users')->where('is_admin', 0)->get();
		
		$project = DB::table('project')->select('id','client_name','developer_name','project_name','start_date','end_date','description')->get();
		
        return view('admin.adminHome',['dev' => $dev , 'client' => $client, 'prj' => $project]);
    }
	    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function devHome()
    {
		
        return view('dev.devHome');
    }

}
