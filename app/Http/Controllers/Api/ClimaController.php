<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Clima\ClimaService;
use Illuminate\Http\Request;

class ClimaController extends Controller
{
    private ClimaService $climaService;

    public function __construct(ClimaService $climaService) {
        $this->climaService =  $climaService;
    }

    /**
     * @OA\Post(
     *     path="/api/clima-recomendaciones",
     *     summary="Obtener recomendaciones según el clima",
     *     tags={"Clima - OpenWeatherMap"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"ciudad"},
     *             @OA\Property(property="ciudad", type="string", example="Madrid")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Datos del clima",
     *         @OA\JsonContent(
     *             @OA\Property(property="ciudad", type="string", example="Madrid"),
     *             @OA\Property(property="temperatura", type="number", example=22.3),
     *             @OA\Property(property="humedad", type="integer", example=56)
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Error al obtener datos"
     *     )
     * )
     */

	public function obtenerDatos (Request $request) {
        $validated = $request->validate([
            'lat' => 'required|numeric',
            'lon' => 'required|numeric',
        ]);

        $clima = $this->climaService->obtenerClima($validated['lat'], $validated['lon']);

        $temperatura = $clima['main']['temp'];
        $descripcion = $clima['weather'][0]['description'];
        $ciudad = $clima['name'];
        $pais = $clima['sys']['country'];

        $recomendacion = $this->climaService->generarRecomendacion($temperatura);

        return response()->json([
            'clima' => [
                'temperatura' => $temperatura,
                'descripcion' => $descripcion
            ],
            'ciudad' => $ciudad,
            'pais' => $pais,
            'recomendacion' => $recomendacion
        ]);
	}
}
