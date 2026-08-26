<?php

namespace App\Http\Controllers;

use App\Models\Indicator;
use App\Support\TenantLanguage;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class IndicatorController extends Controller
{
    public function index()
    {
        try {
            $indicators = Indicator::query()
                ->whereNull('parent_indicator_id')
                ->whereBetween('id', [1, 10])
                ->withCount('children')
                ->orderBy('id')
                ->get()
                ->map(function (Indicator $indicator) {
                    return [
                        'id' => $indicator->id,
                        'name' => TenantLanguage::indicator($indicator->name),
                        'description' => TenantLanguage::indicatorDescription($indicator->description),
                        'subindicators_count' => $indicator->children_count,
                    ];
                });

            return Response::json([
                'status' => 'success',
                'message' => TenantLanguage::text('Solicitud exitosa', 'Request completed successfully'),
                'data' => $indicators,
            ], 200, [], JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());

            return Response::json([
                'status' => 'error',
                'message' => TenantLanguage::text('Error En La Generacion De La Solicitud', 'Error generating the request'),
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    public function subindicators($indicatorId)
    {
        try {
            $indicator = Indicator::query()
                ->with('children')
                ->find($indicatorId);

            if (! $indicator) {
                return Response::json([
                    'status' => 'error',
                    'message' => TenantLanguage::text('El indicador no existe', 'The indicator does not exist'),
                ], 404, [], JSON_PRETTY_PRINT);
            }

            $subindicators = $indicator->children->map(function (Indicator $subindicator) {
                return [
                    'id' => $subindicator->id,
                    'name' => TenantLanguage::indicator($subindicator->name),
                    'description' => TenantLanguage::indicatorDescription($subindicator->description),
                    'parent_indicator_id' => $subindicator->parent_indicator_id,
                ];
            });

            return Response::json([
                'status' => 'success',
                'message' => TenantLanguage::text('Solicitud exitosa', 'Request completed successfully'),
                'data' => [
                    'indicator' => [
                        'id' => $indicator->id,
                        'name' => TenantLanguage::indicator($indicator->name),
                        'description' => TenantLanguage::indicatorDescription($indicator->description),
                    ],
                    'subindicators' => $subindicators,
                ],
            ], 200, [], JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());

            return Response::json([
                'status' => 'error',
                'message' => TenantLanguage::text('Error En La Generacion De La Solicitud', 'Error generating the request'),
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }
}
