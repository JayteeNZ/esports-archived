<?php

namespace App\Providers;

use Reflex\Challonge\Challonge;
use Illuminate\Support\ServiceProvider;

class ChallongeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('challonge', function ($app) {
            return new Challonge(env('CHALLONGE_KEY'));
        });
    }
}
