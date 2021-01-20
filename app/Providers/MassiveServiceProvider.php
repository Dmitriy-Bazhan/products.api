<?php

namespace App\Providers;

use App\Helpers\GetArray;
use App\Helpers\GetCacheArray;
use Illuminate\Support\ServiceProvider;

class MassiveServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Helpers\Interfaces\SimpleNumberArray', function (){

//            return new GetArray;
            return new GetCacheArray();

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
