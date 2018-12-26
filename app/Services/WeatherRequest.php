<?php
//TODO: generate PHPDoc for all params and methods
/**
 * Created by PhpStorm.
 * User: codereav
 * Date: 26.12.2018
 * Time: 20:58
 */

namespace App\Services;

/**
 * Class WeatherRequest
 * @package App\Services
 */
class WeatherRequest
{
    private const UNKNOWN_SETTLEMENT = 'Неизвестный населённый пункт';

    private $settlement = 'Брянск';
    private $lat = '53.243325';
    private $lon = '34.363731';
    private $lang = 'ru_RU';
    private $limit = '7';
    private $hours = true;
    private $extra = true;

    public function __construct(float $lat = null, float $lon = null, string $settlement = null)
    {
        /** Get 'settlement' param if exists 'lat' or 'lon' param, if 'settlement' missing - stay 'unknown' from const*/
        if ($lat || $lon) {
            $this->lat = $lat ?? $this->lat;
            $this->lon = $lon ?? $this->lon;
            $this->settlement = $settlement ?? self::UNKNOWN_SETTLEMENT;
        }
    }

    public function getSettlement(): string
    {
        return $this->settlement;
    }

    public function getLat(): float
    {
        return $this->lat;
    }

    public function getLon(): float
    {
        return $this->lon;
    }

    public function setLang(string $lang): void
    {
        $this->lang = $lang;
    }

    public function getLang(): string
    {
        return $this->lang;
    }

    public function setLimit(int $limit): void
    {
        $this->limit = $limit;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function setHours(bool $hours): void
    {
        $this->hours = $hours;
    }

    public function getHours(): bool
    {
        return $this->hours;
    }

    public function setExtra(bool $extra): void
    {
        $this->extra = $extra;
    }

    public function getExtra(): bool
    {
        return $this->extra;
    }
}