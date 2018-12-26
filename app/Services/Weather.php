<?php
/**
 * Created by PhpStorm.
 * User: codereav
 * Date: 26.12.2018
 * Time: 19:20
 */

namespace App\Services;

use App\Contracts\WeatherInterface;

class WeatherService implements WeatherInterface
{
    public function __construct($request,$sa)
    {
        var_dump($request,$sa);
    }

    public function getTemp(): void
    {

    }
}