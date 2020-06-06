<?php namespace App\Services;

use App\Repositories\Interfaces\IUserRepository;
use Carbon\Laravel\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class UserService implements Interfaces\IUserService
{
	private $_userRepo;


	public function __construct(IUserRepository $userRepo)
	{
		$this->_userRepo = $userRepo;
	}


	public function registerUser($email, $password)
	{
		// Check if email doesn't already exist
		if ($this->_userRepo->exists($email)) {
			//TODO - Throw exception
		}

		// Hash password
		$hashedPass = Hash::make($password);

		//Save the user
		$user = $this->_userRepo->createUser($email, $hashedPass);

		return ($user);
	}


	public function create($values)
	{

	}

	public function delete($id)
	{

	}

	public function update($values, Model $model)
	{

	}

	public function get($id)
	{

	}
}