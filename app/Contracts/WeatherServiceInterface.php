<?php
/**
 * Created by PhpStorm.
 * User: codereav
 * Date: 24.12.2018
 * Time: 12:42
 */

namespace App\Contracts;

use Psr\Http\Client\ClientInterface;
use App\Services\Weather;
use App\Services\WeatherRequest;

/**
 * Interface WeatherServiceInterface
 * @package App\Contracts
 */
interface WeatherServiceInterface
{
    /**
     * WeatherServiceInterface constructor.
     * @param string $api_key
     * @param ClientInterface $client
     */
    public function __construct(string $api_key, ClientInterface $client);

    /**
     * @param WeatherRequest $weatherRequest
     * @return Weather
     */
    public function getWeather(WeatherRequest $weatherRequest): Weather;
}