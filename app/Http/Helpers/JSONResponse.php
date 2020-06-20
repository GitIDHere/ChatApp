<?php namespace App\Http\Helpers;


class JSONResponse
{
	/**
	 * Get a json array to be used as a response resource
	 *
	 * @param array $values
	 * @return array
	 */
	public static function create($values)
	{
		$response = [
			'data' => $values,
			'time' => time()
		];

		return $response;
	}
}