<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        require_once app_path() . '/Helpers/functions.php';

        // Always redirect to https.
        if($this->app->environment() === 'production') {
            $this->app['request']->server->set('HTTPS', true);
        }

        \Validator::extend('current_password', function ($attribute, $value, $parameters, $validator) {
            $user = \Auth::user();

            return $user && \Hash::check($value, $user->password);
        });

        \Validator::extend('same_password', function ($attribute, $value, $parameters, $validator) {
            $user = \Auth::user();

            return $user && !\Hash::check($value, $user->password);
        });
    }
}
