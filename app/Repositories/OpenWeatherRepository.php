<?php

namespace App\Repositories;

use App\DTOs\OpenWeatherDTO;
use Illuminate\Support\Facades\Http;

class OpenWeatherRepository {
    public function getWeatherByCity(string $city): OpenWeatherDTO {
        $response = Http::get('https://api.openweathermap.org/data/2.5/weather', [
            'q' => $city,
            'appid' => config('services.openweather.key'),
            'units' => 'metric',
            'lang' => 'es'
        ]);

        if ($response->failed()) {
            throw new \RuntimeException('API error: ' . $response->body());
        }

        $data = $response->json();

        return new OpenWeatherDTO(
            city: $data['name'] ?? 'Unknown',
            temperature: $data['main']['temp'] ?? 0,
            humidity: $data['main']['humidity'] ?? 0
        );
    }
}
