<?php

namespace Pk\Basic;

use Illuminate\Support\ServiceProvider;

class BasicServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Pk\Basic\BasicController');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');

        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/pk/basic'),
        ]);
    }
}
