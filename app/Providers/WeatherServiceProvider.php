<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App;
use App\Services\YandexWeatherService;
use App\Contracts\WeatherInterface;

class WeatherServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(WeatherInterface::class, YandexWeatherService::class);
    }
}
