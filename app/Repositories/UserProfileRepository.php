<?php namespace App\Repositories;

use App\Exceptions\User\ResourceCreateException;
use App\Models\UserProfile;

class UserProfileRepository extends BaseRepository implements Interfaces\IUserProfileRepository
{


	public function __construct(UserProfile $userProfile)
	{
		parent::__construct($userProfile);
	}


	/**
	 * @param int $userId
	 * @return UserProfile|null
	 */
	public function getByUser(int $userId)
	{
		return UserProfile::where('user_id', $userId)->first();
	}


	/**
	 * Create a UserProfile entry
	 *
	 * @param int $userId
	 * @param string $name
	 * @param string|null $desc
	 * @return UserProfile|null
	 * @throws ResourceCreateException
	 */
	public function createProfile(int $userId, string $name, string $desc = null)
	{
		$userProfile = new UserProfile();

		$userProfile->user_id = $userId;
		$userProfile->name = $name;
		$userProfile->description = $desc;

		if($userProfile->save()) {
			return $userProfile;
		} else {
			throw new ResourceCreateException("Failed to create user profile");
		}
	}
}