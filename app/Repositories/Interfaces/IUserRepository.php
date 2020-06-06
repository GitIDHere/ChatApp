<?php namespace App\Repositories\Interfaces;


interface IUserRepository extends IModelRepository
{
	public function createUser($email, $password);
}