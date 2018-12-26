<?php
/**
 * Created by PhpStorm.
 * User: codereav
 * Date: 24.12.2018
 * Time: 12:42
 */

namespace App\Contracts;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

interface WeatherInterface
{
    public function __construct(Client $httpClient, Request $httpRequest);

    public function getWeather(): string;
}