<?php namespace App\Repositories;

use App\Models\User;


class UserRepository extends BaseRepository implements Interfaces\IUserRepository
{

	public function __construct(User $user)
	{
		parent::__construct($user);
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
			return null;
		}
	}

}