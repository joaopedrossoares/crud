<?php
namespace App\CrudTest\Services\Contracts;
/**
* 
*/

interface AddressServiceInterface
{
	public function save(array $data, $client_id);
	public function update(array $data, $id);
	public function getAddress($id);
	public function getListAddressClient($id);

}