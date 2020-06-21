<?php namespace App\Http\Helpers;


class UserScopes
{
	private static $_scopeList = [
		'chat' => 'Chat',
		'add-friends' => 'Add friends',
	];


	public static function getList()
	{
		return self::$_scopeList;
	}


}