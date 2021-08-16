<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectModel extends Model
{
    use HasFactory;
	//
	
	public $timestamps = true;
	
	//
	protected $table = 'project';
	
	//
	protected $fillable = [

	'id_client',
	'id_developer',
	'client_name',
	'developer_name',
	'project_name',
	'start_date',
	'end_date',
	'description'
	];
	
	//
	
	 /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'timestamp',
		'updated_at' => 'timestamp',
    ];
	
}
