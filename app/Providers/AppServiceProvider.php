<?php

namespace App\Providers;

use Laravel\Cashier\Cashier;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(UrlGenerator $url)
    {
        /**
         * Use to force HTTPS assets rendering
         */
        if(request()->secure()){
            $url->forceScheme('https');
        }
        Schema::defaultStringLength(191);
        Cashier::calculateTaxes();
    }
}
