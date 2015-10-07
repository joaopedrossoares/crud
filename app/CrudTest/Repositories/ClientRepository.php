<?php
namespace App\CrudTest\Repositories;

use App\CrudTest\Repositories\Contracts\ClientRepositoryInterface;
use App\CrudTest\Client\Client;

class ClientRepository implements ClientRepositoryInterface
{

	protected $model;

	public function __construct(client $model)
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

	public function orderBy($col, $type)
	{
		return $this->model->orderBy($col, $type);
	}

	public function delete($id)
	{
		return $this->model
					->find($id)
					->delete();
	}

	public function update(array $data, $id)
	{
		return $this->model
					->where('id', $id)
					->update($data);
	}
}