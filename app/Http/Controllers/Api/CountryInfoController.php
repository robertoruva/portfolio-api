<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\CountryInfoService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CountryInfoController extends Controller {
    public function __construct(
        protected CountryInfoService $service
    ){}

    public function getCountryInfo(Request $request): JsonResponse {
        try {
            $iso = $request->query('iso', 'ES');

            $info = $this->service->getCountryInfo($iso);

            return response()->json([
                'name' => $info->name,
                'capital' => $info->capital,
                'currency' => $info->currency,
                'flag' => $info->flag,
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'error' => 'Error getting country info: ' . $e->getMessage()
            ], 500);
        }
    }
}
