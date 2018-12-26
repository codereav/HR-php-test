<?php
/**
 * Created by PhpStorm.
 * User: codereav
 * Date: 24.12.2018
 * Time: 16:51
 */

namespace App\Services;

use App;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class YandexWeatherService implements App\Contracts\WeatherInterface
{
    /**
     * @var string yandex api url.
     */
    private const YANDEX_API_URL = 'https://api.weather.yandex.ru/v1/forecast?';

    //private const YANDEX_WEATHER_ICON_URL_TEMPLATE = 'https://yastatic.net/weather/i/icons/blueye/color/svg/%s.svg';

    private const UNKNOWN_SETTLEMENT = 'Неизвестный населённый пункт';

    /**
     * @var GuzzleHttp\Client
     */
    private $httpClient;

    /**
     * @var string Yandex API key.
     */
    private $yandexApiKey;

    /**
     * @var string API call http method.
     */
    private $method = 'GET';

    private $settlement = 'Брянск';
    private $lat = '53.243325';
    private $lon = '34.363731';
    private $lang = 'ru_RU';
    private $limit = '7';
    private $hours = 'true';
    private $extra = 'true';

    /**
     * YandexWeatherService constructor.
     * @param \GuzzleHttp\Client $httpClient
     * @param Request $httpRequest
     */
    public function __construct(Client $httpClient, Request $httpRequest)
    {
        $this->httpClient = $httpClient;

        /** Get 'settlement' param if exists 'lat' or 'lon' param, if 'settlement' missing - stay 'unknown' from const*/
        if ($httpRequest->request->get('lat') || $httpRequest->request->get('lon')) {
            $this->settlement = $httpRequest->request->get('settlement') ?? self::UNKNOWN_SETTLEMENT;
        }

        /** Get other request params from url, if one of them missing - stay default value */
        $this->lat = $httpRequest->request->get('lat') ?? $this->lat;
        $this->lon = $httpRequest->request->get('lon') ?? $this->lon;
        $this->lang = $httpRequest->request->get('lang') ?? $this->lang;
        $this->limit = $httpRequest->request->get('limit') ?? $this->limit;
        $this->hours = $httpRequest->request->get('hours') ?? $this->hours;
        $this->extra = $httpRequest->request->get('extra') ?? $this->extra;

        /** Get yandex api key from .env file */
        $this->yandexApiKey = getenv('YANDEX_API_KEY');
    }

    /**
     * Return json-encoded weather data
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getWeather(): string
    {
        return $this->request();
    }

    /**
     * Call to yandex weather api and return json-encoded data.
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function request(): string
    {
        return $this->httpClient->request(
            $this->method,
            self::YANDEX_API_URL,
            [
                'headers' => [
                    'X-Yandex-API-Key' => $this->yandexApiKey
                ],
                'query' => [
                    'lat' => $this->lat,
                    'lon' => $this->lon,
                    'lang' => $this->lang,
                    'limit' => $this->limit,
                    'hours' => $this->hours,
                    'extra' => $this->extra
                ],
                'debug' => false
            ]
        )->getBody();
    }
}