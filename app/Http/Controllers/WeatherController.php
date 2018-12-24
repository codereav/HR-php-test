<?php

namespace App\Http\Controllers;

use App\Contracts\WeatherInterface;

class WeatherController extends Controller
{
    /**
     * @var IWeather - weather service.
     */
    private $weather;

    public function __construct(WeatherInterface $weather)
    {
        $this->weather = $weather;
    }

    public function show()
    {
        $weatherData = $this->weather->getWeather();
        return view('weather.show', ['weather' => json_decode($weatherData)]);
    }
}
