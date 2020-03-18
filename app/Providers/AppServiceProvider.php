<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
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
        Passport::routes();
        Passport::tokensExpireIn( now()->addWeeks(2) );
        Passport::refreshTokensExpireIn( now()->addMonth() );
        Passport::personalAccessTokensExpireIn( now()->addMonths(3) );
    }
}
