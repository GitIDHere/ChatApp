<?php namespace App\Services\Interfaces;

interface ILogService extends IModelService
{
	public static function addLog(array $values);
}