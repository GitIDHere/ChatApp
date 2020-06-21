<?php namespace App\Http\Controllers;

use App\Http\Helpers\JSONResponse;
use App\Http\Requests\UserRegisterValidator;
use App\Services\Interfaces\IUserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
	private $_userService;


	public function __construct(IUserService $userService)
	{
		$this->_userService = $userService;
	}


	/**
	 * Delete an account
	 *
	 * @param Request $request
	 * @return array
	 */
	public function deleteAccount(Request $request)
	{
		$result = $this->_userService->delete(Auth::id());
		$isDeleted = ($result ? true : false);
		return JSONResponse::create(['success' => $isDeleted]);
	}


	/**
	 * Register a user
	 * @param UserRegisterValidator $request
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
