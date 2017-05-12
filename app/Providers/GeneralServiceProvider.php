<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class GeneralServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', 'App\Http\ViewComposers\SuccessComposer');
        View::composer('*', 'App\Http\ViewComposers\ProvidertypeComposer');
        View::composer('*', 'App\Http\ViewComposers\TreatmentComposer');
        View::composer('*', 'App\Http\ViewComposers\CityComposer');
        View::composer('*', 'App\Http\ViewComposers\GeneralComposer');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
