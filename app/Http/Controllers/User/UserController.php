<?php namespace App\Http\Controllers\User;

use App\Http\Requests\UserRegisterValidator;
use App\Services\Interfaces\IUserService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
	private $_userService;


	public function __construct(IUserService $userService)
	{
		$this->_userService = $userService;
	}


	/**
	 * Register a user
	 * @param Request $request
	 * @return array
	 */
	public function register(UserRegisterValidator $request)
	{
		$email = $request->input('email');
		$password = $request->input('password');

		$success = $this->_userService->registerUser($email, $password);

		//TODO - Create a class to send JSON responses
		return [
			'created' => $success,
			'time' => time()
		];
	}

}
