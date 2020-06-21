<?php namespace App\Repositories\Interfaces;

use App\Models\Log;

interface ILogRepository extends IModelRepository
{
	/**
	 * Create a log entry
	 *
	 * @param array $values
	 * @return Log
	 */
	public static function addEntry(array $values);
}