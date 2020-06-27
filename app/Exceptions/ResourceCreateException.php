<?php namespace App\Exceptions\User;

use Throwable;

class ResourceCreateException extends \Exception
{
	public function __construct($message = "Failed to create resource", $code = 500, Throwable $previous = null)
	{
		parent::__construct($message, $code, $previous);
	}
}