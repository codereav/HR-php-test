<?php
/**
 * Created by PhpStorm.
 * User: codereav
 * Date: 24.12.2018
 * Time: 16:51
 */

namespace App\Services;

use App\Contracts\WeatherServiceInterface;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;

/**
 * Class YandexWeatherService
 * @package App\Services
 */
class YandexWeatherService implements WeatherServiceInterface
{
    /**
     * @const string - yandex api url.
     */
    private const YANDEX_API_URL = 'https://api.weather.yandex.ru/v1/forecast?';

    /**
     * @const string - API call http method.
     */
    private const METHOD = 'GET';

    /**
     * @const string - Yandex icon url template, must be modified by sprintf() method with name of icon file.
     */
    private const YANDEX_WEATHER_ICON_URL_TEMPLATE = 'https://yastatic.net/weather/i/icons/blueye/color/svg/%s.svg';

    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @var string - Yandex API key.
     */
    private $yandexApiKey;


    /**
     * YandexWeatherService constructor.
     * @param string $api_key
     * @param ClientInterface $client
     */
    public function __construct(string $api_key, ClientInterface $client)
    {
        $this->yandexApiKey = $api_key;
        $this->client = $client;
    }

    /**
     * Return json-encoded weather data
     * @param WeatherRequest $weatherRequest
     * @return Weather
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getWeather(WeatherRequest $weatherRequest): Weather
    {
        /** GuzzleHttp\Psr7\Request */
        $request = new Request(
            self::METHOD,
            self::YANDEX_API_URL . http_build_query(
                [
                    'lat' => $weatherRequest->getLat(),
                    'lon' => $weatherRequest->getLon(),
                    'lang' => $weatherRequest->getLang(),
                    'limit' => $weatherRequest->getLimit(),
                    'hours' => $weatherRequest->getHours(),
                    'extra' => $weatherRequest->getExtra()
                ]
            ),
            ['X-Yandex-API-Key' => $this->yandexApiKey]
        );
        $result = $this->sendRequest($request);

        $weather = new Weather();
        $weather->setSettlement($weatherRequest->getSettlement());
        $weather->setFactTemp($result->fact->temp);
        $weather->setFactFeelsLike($result->fact->feels_like);
        $weather->setFactIcon(sprintf(self::YANDEX_WEATHER_ICON_URL_TEMPLATE,$result->fact->icon));

        return $weather;
    }

    /**
     * Call to yandex weather api and return json-encoded data.
     * @param RequestInterface $request
     * @return \StdClass json
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    private function sendRequest(RequestInterface $request): \StdClass
    {
        return json_decode($this->client->sendRequest($request)->getBody()->getContents());
    }
}