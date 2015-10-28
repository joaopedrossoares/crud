<?php
namespace App\CrudTest\Services;
/**
*
*/
use \Validator;
use App\CrudTest\Services\Contracts\AddressServiceInterface;
use App\CrudTest\Repositories\Contracts\AddressRepositoryInterface;
use App\CrudTest\Repositories\Contracts\ClientRepositoryInterface;

class AddressService implements AddressServiceInterface
{
	protected $address;
	protected $client;

	public function __construct( AddressRepositoryInterface $address,
								 ClientRepositoryInterface  $client
	) {
		$this->address = $address;
		$this->client  = $client;
	}

	public function save(array $data, $clientId)
	{
		if ($validator = $this->validator($data)) {
			return $validator;
		}

		$client = $this->client->find($clientId);
		$client->address()->create($data);
		return true;
	}

	public function update(array $data, $id)
	{
		if ($validator = $this->validator($data)) {
			return $validator;
		}

		$this->address->update($data, $id);
		return true;
	}


	private function validator(array $data)
	{
		$validator = Validator::make($data, [
            'street'   => 'required|String|max:250',
            'number'   => 'required|Integer|max:99999',
            'district' => 'required|String|max:50',
            'city'     => 'required|String|max:30',
            'state'    => 'required|String|max:30',
            'country'  => 'required|String|max:30',
        ]);

		if ($validator->fails()) {
			return $validator->errors()->all();
		}

		return false;

	}

	public function getListAddressClient($id)
	{
		return $this->address
					->getListAddressClient($id, 10);
	}

	public function getAddress($id)
	{
		return $this->address->find($id);
	}

	public function delete($id)
	{
		return $this->address->delete($id);
	}
}