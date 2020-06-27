<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', 'UserController@register');

/*
 * Laravel includes an authentication guard that will automatically validate API tokens on incoming requests.
 */
Route::middleware('auth:api')->group(function()
{
	Route::post('/profile/create', 'UserProfileController@createUserProfile');
	Route::post('/profile/update', 'UserProfileController@updateUserProfile');

	Route::post('/user/delete', 'UserController@deleteAccount');
});