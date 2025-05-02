<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\OpenWeatherService;
use Illuminate\Http\JsonResponse;

class OpenWeatherController extends Controller
{
    public function __construct(
        protected OpenWeatherService $service
    ) {}

    public function getCurrentWeather(Request $request): JsonResponse
    {
        $city = $request->query('city', 'Madrid');

        try {
            $weather = $this->service->getWeather($city);

            return response()->json([
                'city' => $weather->city,
                'temperature' => $weather->temperature,
                'humidity' => $weather->humidity,
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'error' => 'Error fetching weather: ' . $e->getMessage()
            ], 500);
        }
    }
}
