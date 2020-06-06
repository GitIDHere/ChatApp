<?php namespace App\Http\Controllers\User;

use App\Services\Interfaces\IUserService;
use App\Services\LogService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
	private $_userService;


	public function __construct(IUserService $userService)
	{
		$this->_userService = $userService;
	}



	public function register(Request $request)
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
