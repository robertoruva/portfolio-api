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

    /**
     * @OA\Get(
     *     path="/api/openweather",
     *     summary="Obtener el clima actual de una ciudad (OpenWeatherMap)",
     *     tags={"Clima - OpenWeatherMap"},
     *     @OA\Parameter(
     *         name="city",
     *         in="query",
     *         description="Nombre de la ciudad",
     *         required=false,
     *         @OA\Schema(type="string", example="Lima")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Datos del clima",
     *         @OA\JsonContent(
     *             @OA\Property(property="city", type="string", example="Lima"),
     *             @OA\Property(property="temperature", type="number", example=25.1),
     *             @OA\Property(property="humidity", type="integer", example=70)
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Error al obtener el clima"
     *     )
     * )
     */

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
