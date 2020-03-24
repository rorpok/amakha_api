<?php

namespace APP\Models;

use Illuminate\Database\Eloquent\Model;

class BoxModel extends Model
{
	protected $table = 'box';
	
	protected $primaryKey = 'idBox';

	protected $fillable = [
		'idBox',
		'name'
	];
	
	public $timestamps = false;
}
	
	