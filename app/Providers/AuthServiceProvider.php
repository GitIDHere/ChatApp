<?php

namespace App\Providers;

use App\Http\Helpers;
use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /*
         * This method will register the routes necessary to issue access tokens
         * and revoke access tokens, clients, and personal access tokens:
         */
        Passport::routes();

		Passport::tokensExpireIn(now()->addDays(15));
	    Passport::refreshTokensExpireIn(now()->addDays(30));

    	Passport::personalAccessTokensExpireIn(now()->addMonths(6));

    	Passport::tokensCan(Helpers\UserScopes::getList());

    }
}
