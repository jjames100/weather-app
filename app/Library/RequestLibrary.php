<?php

namespace App\Library;

use Illuminate\Support\Facades\Http;

class RequestLibrary
{
    private const SERVER_ERROR = [
        'code' => 500,
        'message' => 'server error'
    ];

    public static function request($method, $url, $data = [], $fourSquare = false, $jsonHeader = false)
    {
        $http = Http::withHeaders([
            'Accept' => 'application/json',
        ]);

        if ($fourSquare === true) {
            $http->withHeaders([
                'Authorization' => env('FOURSQUARE_API_KEY')
            ]);
        }

        if ($jsonHeader === true) {
            $http->withHeaders([
                'Content-Type' => 'application/json'
            ]);
        }

        $response = $http->{$method}($url, $data);

        if ($response->ok() === true || $response->created() === true) {
            return [
                'code' => 200,
                'data' => $response->json()
            ];
        }

        return self::SERVER_ERROR;
    }
}