<?php namespace App\Repositories\Interfaces;


interface IUserRepository extends IModelRepository
{
	/**
	 * Create a user
	 *
	 * @param $email
	 * @param $password
	 * @return mixed
	 */
	public function createUser($email, $password);
}