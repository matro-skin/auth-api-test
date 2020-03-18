<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{

    /** @var int Access Token expires at (days) */
    const TOKEN_EXPIRED = 30;

    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();
        Passport::tokensExpireIn( now()->addDays(self::TOKEN_EXPIRED) );
        Passport::refreshTokensExpireIn( now()->addMonth() );
        Passport::personalAccessTokensExpireIn( now()->addMonths(3) );
    }
}
