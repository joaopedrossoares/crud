<?php

namespace App\CrudTest\Client;

use Illuminate\Database\Eloquent\Model;


class Address extends Model
{
	protected $fillable = [
		'street',   
		'number' ,  
		'district', 
		'city',
		'state',
		'country',
	];
   public function client()
   {
    	return $this->belongsTo('App\CrudTest\Client\Client', 'client_id');
   }
}
