<?php namespace App\Services;

use App\Repositories\Interfaces\LogRepository;
use Illuminate\Database\Eloquent\Model;

class LogService
{

	private $_logRepo;

	public function __construct(LogRepository $logRepository)
	{
		$this->_logRepo = $logRepository;
	}


	public static function create($logValues)
	{
		LogRepository::addEntry($logValues);
	}


	public function delete($id)
	{
		// TODO: Implement delete() method.
	}

	public function update($values, Model $model)
	{
		// TODO: Implement update() method.
	}

	public function get($id)
	{
		// TODO: Implement get() method.
	}
}