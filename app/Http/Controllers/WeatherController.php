<?php

// app/Http/Controllers/WeatherController.php

namespace App\Http\Controllers;

use App\Services\OpenMeteoService;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    protected $openMeteoService;

    public function __construct(OpenMeteoService $openMeteoService)
    {
        $this->openMeteoService = $openMeteoService;
    }

    public function weather(Request $request)
    {
        $latitude = $request->input('latitude', 52.52);
        $longitude = $request->input('longitude', 13.41);

        $weather = $this->openMeteoService->getCurrentWeather($latitude, $longitude);

        return view('pages.weather', ['weather' => $weather]);
    }
}
