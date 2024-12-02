<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        Paginator::useBootstrap();
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
        //check that app is local
//        if ($this->app->isLocal()) {
//            //if local register your services you require for development
//            $this->app->register('Barryvdh\Debugbar\ServiceProvider');
//        } else {
//            //else register your services you require for production
//            $this->app['request']->server->set('HTTPS', true);
//        }
    }
}
