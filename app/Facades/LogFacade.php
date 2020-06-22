<?php namespace App\Facades;

use App\Models\Log;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\URL;

class LogFacade extends Facade
{
	/**
	 * @param $type
	 * @param $severity
	 * @param \Exception $exception
	 * @return Log
	 */
	public static function addEntry($severity, array $context)
	{
		$trace = '';
		if(isset($context['exception'])) {
			$trace = $context['exception']->getTraceAsString();
		}

		$url = URL::current();

		$log = new Log();
		$log->severity = $severity;
		$log->url = $url;
		$log->trace = $trace;
		$log->save();
		return $log;
	}
}