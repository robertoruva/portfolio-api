<?php

namespace App\DTOs;

final class WebSocketWeatherDTO {
    public function __construct(
        public readonly float $temperature,
        public readonly float $humidity,
        public readonly string $location
    ){}
}
