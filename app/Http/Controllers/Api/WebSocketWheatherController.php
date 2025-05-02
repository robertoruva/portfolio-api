<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\WebSocketWeatherService;
use Illuminate\Http\JsonResponse;

class WebSocketWheatherController extends Controller {
    public function __construct(
        protected WebSocketWeatherService $service
    ) {}

    /**
     * @OA\Get(
     *     path="/api/websocket/weather",
     *     summary="Obtener clima simulado por WebSocket",
     *     tags={"Clima - WebSocket Simulado"},
     *     @OA\Response(
     *         response=200,
     *         description="Clima simulado",
     *         @OA\JsonContent(
     *             @OA\Property(property="temperature", type="number", example=23.5),
     *             @OA\Property(property="humidity", type="integer", example=62),
     *             @OA\Property(property="location", type="string", example="Madrid")
     *         )
     *     )
     * )
     */
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
