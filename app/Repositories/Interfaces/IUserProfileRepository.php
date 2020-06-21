<?php namespace App\Repositories\Interfaces;

interface IUserProfileRepository extends IModelRepository
{
	/**
	 * Get UserProfile by user id
	 *
	 * @param int $userId
	 * @return mixed
	 */
	public function getByUser(int $userId);


	/**
	 * Create a UserProfile entry
	 *
	 * @param int $userId
	 * @param string $name
	 * @param string|null $desc
	 * @return mixed
	 */
	public function createProfile(int $userId, string $name, string $desc = null);

}