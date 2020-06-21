<?php namespace App\Http\Requests;

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
        return $this->user()->can('createUserProfile', $this->user());
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
