<?php

namespace App\Services;

use App\Constants\WeatherConstants;
use App\Interfaces\FetchDataInterface;
use App\Library\RequestLibrary;
use Illuminate\Support\Arr;

class WeatherService implements FetchDataInterface
{
    public function getData($params)
    {
        $slug = Arr::get($params, WeatherConstants::SLUG);

        $data = [
            WeatherConstants::QUERY  => $slug . ',JP',
            WeatherConstants::APP_ID => env('OPEN_WEATHER_API_KEY')
        ];

        return RequestLibrary::request('get', WeatherConstants::API_URL, $data);
    }
}