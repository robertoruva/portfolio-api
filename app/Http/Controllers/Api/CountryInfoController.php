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

    /**
     * @OA\Get(
     *     path="/api/soap/country-info",
     *     summary="Obtener información de un país vía SOAP",
     *     tags={"CountryInfo - SOAP"},
     *     @OA\Parameter(
     *         name="iso",
     *         in="query",
     *         required=false,
     *         description="Código ISO del país (ej: ES)",
     *         @OA\Schema(type="string", example="ES")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Datos del país",
     *         @OA\JsonContent(
     *             @OA\Property(property="name", type="string", example="Spain"),
     *             @OA\Property(property="capital", type="string", example="Madrid"),
     *             @OA\Property(property="currency", type="string", example="EUR"),
     *             @OA\Property(property="flag", type="string", example="http://.../Spain.jpg")
     *         )
     *     )
     * )
     */

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
