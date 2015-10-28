<?php
namespace App\CrudTest\Repositories;

use App\CrudTest\Repositories\Contracts\ClientRepositoryInterface;
use App\CrudTest\Client\Client;

class ClientRepository extends BaseRepository implements ClientRepositoryInterface
{
	public function __construct(client $model)
	{
		$this->model = $model;
	}
}