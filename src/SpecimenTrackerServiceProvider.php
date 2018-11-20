<?php

namespace ILabAfrica\SpecimenTracker;

use Illuminate\Support\ServiceProvider;

class SpecimenTrackerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__.'/routes/api.php';
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('ILabAfrica\SpecimenTracker\Controllers\SpecimenTracker');
    }
}
