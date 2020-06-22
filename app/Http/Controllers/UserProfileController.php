<?php namespace App\Http\Controllers;

use App\Http\Helpers\JsonResponse;
use App\Http\Requests\UserProfileCreateFormValidator;
use App\Services\Interfaces\IUserProfileService;
use Illuminate\Support\Facades\Auth;

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
	 * @param UserProfileCreateFormValidator $request
	 * @return array
	 */
	public function createUserProfile(UserProfileCreateFormValidator $request)
	{
		$userId = Auth::id();
		$name = $request->get('name');
		$description = $request->get('description');

		$userProfile = $this->_userProfileService->createProfile($userId, $name, $description);

		return JsonResponse::resourceResponse($userProfile);
	}


	//updateProfile();


	//updateProfilePic();


}