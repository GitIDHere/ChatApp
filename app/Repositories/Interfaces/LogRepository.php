<?php namespace App\Repositories\Interfaces;


use App\Models\Log;

class LogRepository
{
	public static function addEntry($values)
	{
		$log = new Log();
		$log->fill($values);
		return $log->save();
	}
}