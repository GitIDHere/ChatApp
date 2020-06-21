<?php namespace App\Services;

use App\Repositories\Interfaces\ILogRepository;
use App\Repositories\LogRepository;
use App\Services\Interfaces\ILogService;

class LogService extends BaseService implements ILogService
{

	public function __construct(ILogRepository $logRepository)
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