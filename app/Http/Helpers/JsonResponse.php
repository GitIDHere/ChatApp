<?php namespace App\Http\Helpers;


class JsonResponse extends \Symfony\Component\HttpFoundation\JsonResponse
{
	/**
	 * Get a json array to be used as a response resource
	 *
	 * @param array $values
	 * @return array
	 */
	public static function resourceResponse($values, $code = 200)
	{
		$response = response([
			'data' => $values,
			'code' => $code,
			'time' => time()
		], $code)
			->header('Content-Type', 'application/json')
		;
		return $response;
	}
}