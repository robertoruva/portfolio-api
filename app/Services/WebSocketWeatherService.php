<?php

namespace App\Services;

use App\DTOs\WebSocketWeatherDTO;
use App\Repositories\WebSocketWeatherRepository;

class WebSocketWeatherService {
    public function __construct(
        protected WebSocketWeatherRepository $repository
    ) {}

    public function getCurrentWeather(): WebSocketWeatherDTO {
        return $this->repository->getLatestWeatherData();
    }
}
