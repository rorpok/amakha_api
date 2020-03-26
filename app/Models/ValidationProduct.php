<?php

namespace App\Models;

class ValidationProduct
{
	const RULE_PRODUCT = [
	
		'id' => 'max:64',
		'name' => 'required',
		'code' => 'required',
		
	]; 
}