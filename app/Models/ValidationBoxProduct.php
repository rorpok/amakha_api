<?php

namespace App\Models;

class ValidationBoxProduct
{
	const RULE_BOX_PRODUCT = [
	
		'idBox' => 'max:64 | required',
		'howMuchFit' => 'max:32',
		
	]; 
}