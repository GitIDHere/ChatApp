<?php namespace App\Http\Controllers\User;

use App\Http\Helpers\JSONResponse;
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

		$newUser = $this->_userService->registerUser($email, $password);

		return JSONResponse::create($newUser);
	}

}
