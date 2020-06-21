<?php namespace App\Services\Interfaces;

interface IUserProfileService extends IModelService
{
	public function createProfile($userId, $name, $description = null);

}