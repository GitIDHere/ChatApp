<?php namespace App\Services;

use App\Repositories\Interfaces\IUserRepository;
use Illuminate\Support\Facades\Hash;

class UserService extends BaseService implements Interfaces\IUserService
{

	private $_userRepo;

	public function __construct(IUserRepository $userRepo)
	{
		$this->_userRepo = $userRepo;

		parent::__construct($userRepo);
	}


	/**
	 * Register a new user
	 *
	 * @param $email
	 * @param $password
	 * @return mixed
	 */
	public function registerUser($email, $password)
	{
		$userExistParams[] = [
			'col' => 'email',
			'op' => '=',
			'val' => $email
		];

		// Check if email doesn't already exist
		if ($this->_repo->exists($userExistParams)) {
			//TODO - Throw exception
		}

		// Hash password
		$hashedPass = Hash::make($password);

		//Save the user
		$user = $this->_userRepo->createUser($email, $hashedPass);

		return $user;
	}
}