<?php

namespace App\Providers;

use App\Repositories\Interfaces\IUserRepository;
use App\Repositories\UserRepository;
use App\Services\Interfaces\IUserService;
use App\Services\UserService;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{


	public $bindings = [
		IUserService::class => UserService::class,


		IUserRepository::class => UserRepository::class,
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
