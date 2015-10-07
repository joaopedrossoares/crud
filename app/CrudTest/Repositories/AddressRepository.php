<?php
namespace App\CrudTest\Repositories;

use App\CrudTest\Repositories\Contracts\AddressRepositoryInterface;
use App\CrudTest\Client\Address;

class AddressRepository implements AddressRepositoryInterface
{

	protected $model;

	public function __construct(Address $model)
	{
		$this->model = $model;
	}

	public function paginate($pages)
	{
		return $this->model->paginate($pages);
	}

	public function find($id)
	{
		return $this->model->find($id);
	}

	public function create(array $data)
	{
		return $this->model->create($data);
	}

	public function update(array $data, $id)
	{
		return $this->model
					->where('id', $id)
					->update($data);
	}

	public function getListAddressClient($id, $pages)
	{
		return $this->model
					->where('client_id', $id)
					->paginate(5);
	}

	public function delete($id)
	{
		return $this->model
					->find($id)
					->delete();
	}
}