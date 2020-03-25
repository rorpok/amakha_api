<?php

namespace App\Models;

class ValidationBox
{
	
	const RULE_BOX = [
	
		'idBox' => 'max:64',
		'name' => 'required',
		'width' => 'max:32',
		'height' => 'max:32',
		'deph' => 'max:32'
	
	];

}