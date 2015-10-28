<?php
namespace App\CrudTest\Services;
/**
*
*/
use \Validator;
use App\CrudTest\Services\Contracts\ClientServiceInterface;
use App\CrudTest\Repositories\Contracts\ClientRepositoryInterface;

class ClientService implements ClientServiceInterface
{
	protected $client;

	public function __construct(ClientRepositoryInterface $client)
	{
		$this->client = $client;
	}

	public function save(array $data)
	{
		$data['cnpj'] = preg_replace('/\D/', '', $data['cnpj']);

		$validator = Validator::make($data, [
		    'name' => 'required|unique:clients|max:100',
		    'cnpj' => 'required|integer|unique:clients|cnpj',
		]);

		if ($validator->fails()) {
			return $validator->errors()->all();
		}

		$this->client->create($data);
		return true;
	}

	public function update(array $data, $id)
	{
		$data['cnpj'] = preg_replace('/\D/', '', $data['cnpj']);

		$validator = Validator::make($data, [
			'name' => 'required|max:100',
			'cnpj' => 'required|cnpj',
		]);

		if ($validator->fails()) {
			return $validator->errors()->all();
		}

		$this->client->update($data, $id);
		return true;
	}

	public function getList()
	{
		return $this->client->orderBy('name', 'asc')->paginate(5);
	}

	public function getClient($id)
	{
		return $this->client->find($id);
	}

	public function delete($id)
	{
		return $this->client->delete($id);
	}
}