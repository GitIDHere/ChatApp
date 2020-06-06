<?php namespace App\Services\Interfaces;


interface IUserService extends IModelService
{
	public function registerUser($email, $password);

}