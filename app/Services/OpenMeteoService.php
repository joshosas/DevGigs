<?php

// app/Services/OpenMeteoService.php

namespace App\Services;

use GuzzleHttp\Client;

class OpenMeteoService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client(['base_uri' => 'https://api.open-meteo.com/v1/']);
    }

    public function getCurrentWeather($latitude, $longitude)
    {
        $response = $this->client->request('GET', 'forecast', [
            'query' => [
                'latitude' => $latitude,
                'longitude' => $longitude,
                'current' => ['temperature_2m', 'weathercode'],
            ],
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}
