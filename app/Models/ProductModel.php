<?php

namespace APP\Models;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
	protected $table = 'product';
	
	protected $primaryKey = 'idProduct';

	protected $fillable = [
		'idProduct',
		'name',
		'code'
	];
	
	public $timestamps = false;
}