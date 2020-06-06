<?php namespace App\Services;


interface IUserService extends IModelService
{
	public function registerUser($email, $password);

}