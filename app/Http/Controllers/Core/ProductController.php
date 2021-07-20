<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Pricing\Entities\Product;
use Illuminate\Support\Str;

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
            Product::create([
                'id' => Str::uuid()->toString(),
                'name' => $request->get('name'),
                'description' => $request->get('description'),
                'sku' => $request->get('sku'),
                'category_id' => $request->get('category_id'),
                'price' => $request->get('price'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

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
