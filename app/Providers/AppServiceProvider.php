<?php

namespace App\Providers;

use App\Repositories\Interfaces\ILogRepository;
use App\Repositories\Interfaces\IUserProfileRepository;
use App\Repositories\Interfaces\IUserRepository;
use App\Repositories\LogRepository;
use App\Repositories\UserProfileRepository;
use App\Repositories\UserRepository;
use App\Services\Interfaces\ILogService;
use App\Services\Interfaces\IUserProfileService;
use App\Services\Interfaces\IUserService;
use App\Services\LogService;
use App\Services\UserProfileService;
use App\Services\UserService;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{

		public $bindings = [
			IUserService::class => UserService::class,
			ILogService::class => LogService::class,
			IUserProfileService::class => UserProfileService::class,


			ILogRepository::class => LogRepository::class,
			IUserRepository::class => UserRepository::class,
			IUserProfileRepository::class => UserProfileRepository::class,
	];

	/**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

	/**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
		Schema::defaultStringLength(191);

		// Hash client secret keys in DB
		Passport::hashClientSecrets();
    }
}
