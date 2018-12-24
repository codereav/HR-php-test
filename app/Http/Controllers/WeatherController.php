<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\IWeather;

class WeatherController extends Controller
{
    /*
     * @var IWeather - weather service.
     */
    private $weather;

    public function __construct(IWeather $weather)
    {
        $this->weather = $weather;
    }

    public function show()
    {
        $weatherData = $this->weather->getWeather();
        return view('weather.show', ['weather' => $weatherData]);
    }
}
