<?php namespace App\Services;

use App\Repositories\LogRepository;
use Illuminate\Database\Eloquent\Model;

class LogService extends BaseService
{
	public function __construct(LogRepository $logRepository)
	{
		parent::__construct($logRepository);
	}


	/**
	 * A simple way to add a log entry
	 * @param $values
	 */
	public static function addLog($values) {
		LogRepository::addEntry($values);
	}

}