<?php
namespace App\CrudTest\Repositories\Contracts;
/**
* 
*/
interface AddressRepositoryInterface
{
	public function find($id);
	public function create(array $data);
	public function update(array $data, $id);
	public function getListAddressClient($id, $pages);
	public function paginate($pages);
	public function delete($id);
}