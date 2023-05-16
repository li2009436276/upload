<?php

namespace Www\Upload\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function map()
    {

        Route::prefix('api')
            ->middleware('api')
            ->namespace('Www\Upload\Controllers')
            ->group(__DIR__.'/../routes/api.php');

    }
}