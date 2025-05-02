<?php

namespace App\Services;

use App\Repositories\OpenWeatherRepository;
use App\DTOs\OpenWeatherDTO;

class OpenWeatherService
{
    public function __construct(
        protected OpenWeatherRepository $repository
    ) {}

    public function getWeather(string $city): OpenWeatherDTO
    {
        return $this->repository->getWeatherByCity($city);
    }
}
