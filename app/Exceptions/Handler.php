<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        return parent::render($request, $exception);
    }


	/**
	 * @param Throwable $e
	 * @return array
	 */
    protected function convertExceptionToArray(Throwable $e)
    {
    	$code = $this->isHttpException($e) ? $e->getCode() : 500;

    	$statusTxt = (isset(Response::$statusTexts[$code]) ? Response::$statusTexts[$code] : 500);

    	$isDebugMode = config('app.debug');

		$errorData = [
			'status' => $statusTxt,
			'message' => $e->getMessage(),
			'code' => $code,
			'time' => time()
		];

    	if ($isDebugMode)
    	{
    		$errorData['file'] = $e->getFile();
    		$errorData['line'] = $e->getLine();
    		$errorData['exception'] = get_class($e);
    		$errorData['trace'] = collect($e->getTrace())->map(function ($trace) {
                return Arr::except($trace, ['args']);
            })->all();
		}

    	return $errorData;
    }
}
