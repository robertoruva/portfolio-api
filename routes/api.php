<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ClimaController;

Route::post('/clima-recomendaciones',[ClimaController::class, 'obtenerDatos'])->name('clima.datos');
