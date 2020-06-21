<?php namespace App\Repositories;

use App\Models\Log;

class LogRepository extends BaseRepository implements Interfaces\ILogRepository
{
	public function __construct(Log $log)
	{
		parent::__construct($log);
	}

	/**
	 * @param array $values
	 * @return mixed
	 */
	public static function addEntry(array $values)
	{
		return Log::create($values);
	}
}