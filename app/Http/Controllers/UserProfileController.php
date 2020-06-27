<?php namespace App\Http\Controllers;

use App\Http\Helpers\JsonResponse;
use App\Http\Requests\UpdateUserProfileValidator;
use App\Http\Requests\UserProfileCreateValidator;
use App\Services\Interfaces\IUserProfileService;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

class UserProfileController extends Controller
{
	/*
	 * TODO
	 * - Add Scope
	 * - Add default profile image or get an uploaded one
	 */

	private $_userProfileService;


	public function __construct(IUserProfileService $userProfileService)
	{
		$this->_userProfileService = $userProfileService;
	}


	/**
	 * @param UserProfileCreateValidator $request
	 * @return array
	 */
	public function createUserProfile(UserProfileCreateValidator $request)
	{
		$userId = Auth::id();
		$name = $request->get('name');
		$description = $request->get('description');

		$userProfile = $this->_userProfileService->createProfile($userId, $name, $description);

		return JsonResponse::resourceResponse($userProfile);
	}


	/**
	 * Update the UserProfile
	 *
	 * @param UpdateUserProfileValidator $request
	 * @return array
	 */
	public function updateUserProfile(UpdateUserProfileValidator $request)
	{
		$name = $request->get('name', '');
		$description = $request->get('description', '');

		$user = Auth::user();

		$userProfile = $user->userProfile()->first();
		if(empty($userProfile)) {
			throw new ResourceNotFoundException('Profile not found');
		}

		$updateValues = [];

		if(!empty($name)) $updateValues['name'] = $name;
		if(!empty($description)) $updateValues['description'] = $description;

		$this->_userProfileService->update($userProfile->id, $updateValues);

		// Grab the latest profile after the update
		$updatedUserProfile = $user->userProfile()->first();

		return JsonResponse::resourceResponse($updatedUserProfile);
	}


	//updateProfilePic();


}