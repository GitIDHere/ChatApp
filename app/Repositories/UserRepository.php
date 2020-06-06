<?php namespace App\Repositories;

use App\User;


class UserRepository implements Interfaces\IUserRepository
{

	public function __construct()
	{

	}


	/**
	 * @param $email
	 * @param $password
	 * @return User|bool
	 */
	public function createUser($email, $password)
	{
		$user = new User();
		$user->email = $email;
		$user->password = $password;

		if($user->save()) {
			return $user;
		} else {
			//TODO - throw exception
			return false;
		}
	}


	/**
	 * @param $email
	 * @return bool
	 */
	public function exists($email)
	{
		return User::query()->where('email', '=', $email)->exists();
	}
}