<?php namespace App\Repositories;

use App\Exceptions\User\ResourceCreateException;
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
	 * @throws ResourceCreateException
	 */
	public function createUser($email, $password)
	{
		$user = new User();
		$user->email = $email;
		$user->password = $password;

		if($user->save()) {
			return $user;
		} else {
			throw new ResourceCreateException("Failed to create account");
		}
	}

}