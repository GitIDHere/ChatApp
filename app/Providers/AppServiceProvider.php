<?php

namespace App\Providers;

use App\Http\Helpers\ErrorLogger;
use App\Repositories\Interfaces\IUserProfileRepository;
use App\Repositories\Interfaces\IUserRepository;
use App\Repositories\UserProfileRepository;
use App\Repositories\UserRepository;
use App\Services\Interfaces\IUserProfileService;
use App\Services\Interfaces\IUserService;
use App\Services\UserProfileService;
use App\Services\UserService;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;
use Psr\Log\LoggerInterface;

class AppServiceProvider extends ServiceProvider
{

		public $bindings = [
			IUserService::class => UserService::class,
			IUserProfileService::class => UserProfileService::class,


			IUserRepository::class => UserRepository::class,
			IUserProfileRepository::class => UserProfileRepository::class,
			LoggerInterface::class => ErrorLogger::class,
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
