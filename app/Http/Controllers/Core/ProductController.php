<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Pricing\Entities\Product;

class ProductController extends Controllers\Controller
{
    public function all(): JsonResponse
    {
        try {
            return response()->json([
                'message' => Product::paginate(),
            ]);
        } catch (Exception $exception) {
            return response()->json(
                [
                    'message' => $exception->getMessage(),
                ],
                400
            );
        }
    }

    public function store(Request $request): JsonResponse
    {
        try {
            if (!$request->has('title')) {
                return response()->json(
                    [
                        'message' => 'Título é um campo obrigatório',
                    ],
                    422
                );
            }

            return response()->json([
                'message' => $request->all(),
            ]);
        } catch (Exception $exception) {
            return response()->json(
                [
                    'message' => $exception->getMessage(),
                ],
                400
            );
        }
    }
}
