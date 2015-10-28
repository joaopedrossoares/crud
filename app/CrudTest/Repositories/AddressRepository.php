<?php
namespace App\CrudTest\Repositories;

use App\CrudTest\Repositories\Contracts\AddressRepositoryInterface;
use App\CrudTest\Client\Address;

class AddressRepository extends BaseRepository implements AddressRepositoryInterface
{

	public function __construct(Address $model)
	{
		$this->model = $model;
	}

	public function getListAddressClient($id, $pages)
	{
		return $this->model
					->where('client_id', $id)
					->paginate(5);
	}

}