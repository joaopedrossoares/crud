<?php
namespace App\CrudTest\Services\Contracts;
/**
* 
*/
interface ClientServiceInterface
{
	public function save(array $data);
	public function update(array $data, $id);
	public function getList();
	public function getClient($id);

}