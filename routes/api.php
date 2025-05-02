<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ClimaController;
use App\Http\Controllers\Api\CountryInfoController;
use App\Http\Controllers\Api\OpenWeatherController;
use App\Http\Controllers\Api\WebSocketWheatherController;

Route::post('/clima-recomendaciones',[ClimaController::class, 'obtenerDatos'])->name('clima.datos');
Route::get('/openweather', [OpenWeatherController::class, 'getCurrentWeather']);
Route::get('/soap/country-info', [CountryInfoController::class, 'getCountryInfo']);
Route::get('/websocket/weather', [WebSocketWheatherController::class, 'index']);
