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
