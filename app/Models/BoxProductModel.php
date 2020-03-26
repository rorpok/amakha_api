<?php

namespace APP\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;;

class BoxProductModel extends Model
{
	protected $table = 'box_product';
	

	protected $fillable = [
		'idProduct',
		'idBox',
		'howMuchFit'
	];
	
	public $timestamps = false;
	
	protected function setKeysForSaveQuery( Builder $query )
    {
        $query
            ->where('idProduct', '=', $this->getAttribute( 'idProduct' ))
            ->where('idBox', '=', $this->getAttribute( 'idBox' ));

        return $query;
    }
}
	