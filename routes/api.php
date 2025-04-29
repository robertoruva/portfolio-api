<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ClimaController;
use App\Http\Controllers\Api\CountryInfoController;

Route::post('/clima-recomendaciones',[ClimaController::class, 'obtenerDatos'])->name('clima.datos');
Route::get('/soap/country-info', [CountryInfoController::class, 'getCountryInfo']);
