<?php namespace App\Repositories;


interface IUserRepository extends IModelRepository
{
	public function createUser($email, $password);
}