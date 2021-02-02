<?php

namespace CTSoft\Laravel\LetterXpress\Providers;

use CTSoft\Laravel\LetterXpress\Client;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class LetterXpressProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/letterxpress.php', 'letterxpress'
        );

        $this->app->singleton(Client::class, function (Application $app) {
            return new Client(
                $app['config']['letterxpress.api_url'],
                $app['config']['letterxpress.api_user'],
                $app['config']['letterxpress.api_key']
            );
        });
    }

    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../../config/letterxpress.php' => $this->app->configPath('letterxpress.php'),
        ], 'config');
    }
}
