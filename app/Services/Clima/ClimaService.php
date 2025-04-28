<?php

namespace App\Services\Clima;

use Illuminate\Support\Facades\Http;

class ClimaService {
    public function obtenerClima(float $lat, float $lon): array {
        $apiKey = env('OPENWEATHER_API_KEY');

        $response = Http::get("https://api.openweathermap.org/data/2.5/weather", [
            'lat'   => $lat,
            'lon'   => $lon,
            'appid' => $apiKey,
            'units' => 'metric'
        ]);

        if ($response->failed()) {
            throw new \Exception('Error al consultar la API de clima');
        }

        return $response->json();
    }

    public function generarRecomendacion(float $temperatura): string {
        return match (true) {
            $temperatura < 15   => "Clima frío: Usa colores cálidos, alfombras y mantas.",
            $temperatura > 25   => "Clima cálido: Opta por tonos claros y materiales frescos.",
            default             => "Clima templado: Mantén un estilo equilibrado con tonos neutros."
        };
    }
}
