<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
	protected $table = 'user_profiles';

	protected $fillable = [
		'name',
		'description',
	];

	protected $appends = [
		'user_profile_id',
	];

	protected $hidden = [
		'id'
	];


	/**
	 * UserProfile belongs to one User
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user()
	{
		return $this->belongsTo('App\Models\User');
	}


	public function getUserProfileIdAttribute() {
		return $this->id;
	}

}