<?php namespace App\Services;

use App\Models\UserProfile;
use App\Repositories\Interfaces\IUserProfileRepository;
use App\Services\Interfaces\IUserProfileService;

class UserProfileService extends BaseService implements IUserProfileService
{
	private $_userProfileRepo;


	public function __construct(IUserProfileRepository $userProfileRepo)
	{
		parent::__construct($userProfileRepo);
		$this->_userProfileRepo = $userProfileRepo;
	}


	/**
	 * @param $userId
	 * @param $name
	 * @param null $description
	 * @return UserProfile|null
	 */
	public function createProfile($userId, $name, $description = null)
	{
		$existParams[] = [
			'col' => 'user_id',
			'op' => '=',
			'val' => $userId,
		];

		//Check if an entry already doesn't exist
		if($this->_userProfileRepo->exists($existParams)) {
			//Return the existing profile
			return $this->_userProfileRepo->getByUser($userId);
		}

		return $this->_userProfileRepo->createProfile($userId, $name, $description);
	}

}