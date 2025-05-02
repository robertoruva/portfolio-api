<?php

namespace App\DTOs;

final class OpenWeatherDTO {
    public function __construct(
        public readonly string $city,
        public readonly float $temperature,
        public readonly int $humidity
    ){}
}
