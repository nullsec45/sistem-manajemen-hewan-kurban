<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;


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
        Validator::extend('letters', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/[a-zA-Z]/', $value);
        });

        Validator::extend('mixed', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/[a-z]/', $value) && preg_match('/[A-Z]/', $value);
        });

        Validator::extend('numbers', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/[0-9]/', $value);
        });

        Validator::extend('symbols', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/[!@#$%^&*(),.?":{}|<>]/', $value);
        });
    }
}
