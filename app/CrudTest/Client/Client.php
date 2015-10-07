<?php

namespace App\CrudTest\Client;

use Illuminate\Database\Eloquent\Model;

use App\Helpers\Mask;


class Client extends Model
{
    protected $fillable = ['name', 'cnpj'];

    public function address()
   {
    	return $this->hasMany('App\CrudTest\Client\Address', 'client_id');
   }

   public function setCnpjAttribute($value)
   {
    	$this->attributes['cnpj'] = preg_replace('/\D/', '', $value);
   }


    public function getCnpjAttribute($value)
    {
    	$mask = new Mask;
    	return $mask->format($value, '##.###.###/####-##');
    }

    public function getCreatedAtAttribute($value)
    {
       return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d/m/Y H:i:s');
    }

}
