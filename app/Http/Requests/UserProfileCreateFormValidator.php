<?php namespace App\Http\Requests;

use App\Models\UserProfile;
use Illuminate\Foundation\Http\FormRequest;

class UserProfileCreateFormValidator extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
    	//TODO - Add policy
		$profile = UserProfile::where('user_id', $this->user()->id)->first();
        return (empty($profile));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|between:2,50',
            'description' => 'nullable|max:550',
        ];
    }
}
