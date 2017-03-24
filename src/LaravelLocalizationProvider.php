<?php

namespace Yk\LaravelLocalization;

use Illuminate\Support\ServiceProvider;

class LaravelLocalizationProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return  void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/resources/views', 'Yk\LaravelLocalization');

        $this->app->router->group(['namespace' => 'Yk\LaravelLocalization\App\Http\Controllers', 'middleware' => ['web']],
            function(){
                require __DIR__.'/routes/web.php';
            }
        );

        $this->publishes([
            __DIR__.'/resources/assets' => public_path('vendor/yk/laravel-localization'),
        ], 'public');
    }
    /**
     * Register the application services.
     *
     * @return  void
     */
    public function register()
    {

    }
}