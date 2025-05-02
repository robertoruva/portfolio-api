<?php

namespace App\Repositories;

use App\DTOs\WebSocketWeatherDTO;
use WebSocket\Client;

class WebSocketWeatherRepository {
    protected Client $client;

    public function __construct(){
        $this->client = new Client('wss://echo.websocket.events');
    }

    public function getLatestWeatherData(): WebSocketWeatherDTO {
        $payload = [
            'location' => 'Madrid',
            'temperature' => rand(15, 30),
            'humidity' => rand(40, 80),
        ];

        //$json = json_encode($payload);
        //$this->client->send($json);

        //$message = $this->client->receive();

        //$data = json_decode($message, true);

        return new WebSocketWeatherDTO (
            temperature: (float) ($payload['temperature'] ?? 0),
            humidity: (float) ($payload['humidity'] ?? 0),
            location: (string) ($payload['location'] ?? 'Unknown')
        );
    }
}
