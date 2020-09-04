<?php

namespace Dekiakbar\IndonesiaRegionsPhpClient\Adapter\Laravel;

use Dekiakbar\IndonesiaRegionsPhpClient\Region;
use Illuminate\Support\ServiceProvider;

class RegionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('region', function ($app) {
            return new Region();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
