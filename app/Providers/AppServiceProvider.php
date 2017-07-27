<?php

namespace App\Providers;

use Blade;
use Reflex\Challonge\Challonge;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('access', function ($permission) {
            return "<?php if (auth()->user()->hasPermissionOrRoleHasPermission($permission)): ?>";
        });

        Blade::directive('endaccess', function () {
            return "<?php endif; ?>";
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Challonge', function ($app) {
            return new Challonge($app['config']['services.challonge.key']);
        });
    }
}
