<?php

namespace App\Http\Controllers;

use App\Contracts\WeatherServiceInterface;
use App\Services\WeatherRequest;

class WeatherController extends Controller
{
    /**
     * @var WeatherServiceInterface - weather service.
     */
    private $weather;

    public function __construct(WeatherServiceInterface $weather)
    {
        $this->weather = $weather;
    }

    public function show()
    {
        $weatherRequest = new WeatherRequest();
        $weatherData = $this->weather->getWeather($weatherRequest);
        return view('weather.show', ['weather' => $weatherData]);
    }
}
