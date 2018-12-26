<?php
//TODO: Implement getter-setter methods for all params, generate PHPDoc for all params and methods

/**
 * Created by PhpStorm.
 * User: codereav
 * Date: 26.12.2018
 * Time: 19:20
 */

namespace App\Services;

/**
 * Class Weather
 * @package App\Services
 */
class Weather
{
    private $settlement;
    private $fact = [
        'temp' => null,
        'feels_like' => null,
        'icon' => null,
        'condition' => null,
        'wind_speed' => null,
        'wind_gust' => null,
        'wind_dir' => null,
        'pressure_mm' => null,
        'pressure_pa' => null,
        'humidity' => null,
        'daytime' => null,
        'season' => null,
        'prec_type' => null,
        'prec_strength' => null,
        'cloudness' => null
    ];

    public function __construct()
    {
    }

    public function setSettlement(string $settlement): void
    {
        $this->settlement = $settlement;
    }

    public function getSettlement(): string
    {
        return $this->settlement;
    }

    public function setFactTemp(int $temp): void
    {
        $this->fact['temp'] = $temp;
    }

    public function getFactTemp(): int
    {
        return $this->fact['temp'];
    }

    public function setFactFeelsLike(int $feelsLike): void
    {
        $this->fact['feels_like'] = $feelsLike;
    }

    public function getFactFeelsLike(): int
    {
        return $this->fact['feels_like'];
    }

    public function setFactIcon(string $icon): void
    {
        $this->fact['icon'] = $icon;
    }

    public function getFactIcon(): string
    {
        return $this->fact['icon'];
    }
}