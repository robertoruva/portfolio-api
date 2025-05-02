<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\WebSocketWeatherService;
use Illuminate\Http\JsonResponse;

class WebSocketWheatherController extends Controller {
    public function __construct(
        protected WebSocketWeatherService $service
    ) {}

    public function index(): JsonResponse {
        try {
            $weather = $this->service->getCurrentWeather();

            return response()->json([
                'temperature' => $weather->temperature,
                'humidity' => $weather->humidity,
                'location' => $weather->location,
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'error' => 'WebSocket Error: ' . $e->getMessage()
            ], 500);
        }
    }
}
