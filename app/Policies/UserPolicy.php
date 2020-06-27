<?php namespace App\Policies;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

	/**
	 * @param User $user
	 * @return mixed
	 */
    public function createUserProfile(User $user)
	{
		$userProfileRecord = UserProfile::where('user_id', $user->id)->first();
		return empty($userProfileRecord);
	}


	/**
	 * @param User $user
	 * @return bool
	 */
	public function updateUserProfile(User $user)
	{
    	$userProfileRecord = UserProfile::where('user_id', $user->id)->first();
    	return (empty($userProfileRecord) == false);
	}

}
