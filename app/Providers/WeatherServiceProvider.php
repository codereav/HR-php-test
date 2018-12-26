<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\YandexWeatherService;
use App\Contracts\WeatherServiceInterface;
use Http\Adapter\Guzzle6\Client as HttpClient;

/**
 * Class WeatherServiceProvider
 * @package App\Providers
 */
class WeatherServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(WeatherServiceInterface::class, function () {
            return new YandexWeatherService(
                env('YANDEX_API_KEY'),
                new HttpClient()
            );
        });
    }
}
