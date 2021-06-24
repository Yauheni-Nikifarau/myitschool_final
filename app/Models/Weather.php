<?php

namespace App\Models;


use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class Weather
{
    const url = "https://api.openweathermap.org/data/2.5/onecall";

    /**
     * Returns 7-day weather forecast for given geolocation from cache or from weather API
     *
     * @param $lat - latitude
     * @param $lon - longitude
     * @return array|mixed
     */
    public static function getWeather ($lat, $lon)
    {
        $today = Carbon::today()->getTimestamp();

        $cacheKey = "{$today}_{$lat}_{$lon}";

        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        $response = self::getWeatherFromApi($lat, $lon);

        if (!$response) {
            return null;
        }

        $data = self::transformWeatherData($response);
        Cache::put($cacheKey, $data);

        return $data;
    }

    /**
     * returns 7-day forecast for given geolocation from weather API
     *
     * @param $lat - latitude
     * @param $lon - longitude
     * @return array|mixed
     */
    private static function getWeatherFromApi ($lat, $lon)
    {
        $key = config('api.weatherKey');

        if (!$key) {
            Log::error('Api key is not installed in your application');
            return null;
        }

        $response = Http::get(self::url, [
            'lat' => $lat,
            'lon' => $lon,
            'appid' => $key,
            'units' => 'metric',
            'exclude' => 'hourly,minutely',
        ]);
        $response = $response->json();
        return $response;
    }

    /**
     * transform Weather API response data to necessary format
     *
     * @param $data
     * @return array
     */
    private static function transformWeatherData ($data)
    {
        $data = $data['daily'];
        $response = [];
        foreach ($data as $dayData) {
            $response[] = [
                'date' => Carbon::parse($dayData["dt"])->format('d.m'),
                'weather' => $dayData['weather'][0]['description'],
                'day' => $dayData['temp']['day'] < 0 ? round($dayData['temp']['day']) : "+" . round($dayData['temp']['day']),
                'night' => $dayData['temp']['night'] < 0 ? round($dayData['temp']['night']) : "+" . round($dayData['temp']['night']),
                'evening' => $dayData['temp']['eve'] < 0 ? round($dayData['temp']['eve']) : "+" . round($dayData['temp']['eve']),
                'morning' => $dayData['temp']['morn'] < 0 ? round($dayData['temp']['morn']) : "+" . round($dayData['temp']['morn'])
            ];
        }
        return $response;
    }
}
