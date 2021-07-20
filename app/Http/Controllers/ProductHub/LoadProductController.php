<?php

namespace App\Http\Controllers\ProductHub;

use App\Models\Product;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Pricing\Application\ProductHub\UseCase\Products\LoadProduct;
use Pricing\Infra\Database\Repositories\Eloquent\ProductHub\ProductRepository;
use Pricing\Infra\Database\Repositories\Eloquent\ProductHub\ProductRepository2;

class LoadProductController extends Controller
{
    public function take1(): JsonResponse
    {
        //ini_set('memory_limit', -1);
        $start = microtime(true);

        $model = new Product();
        $productRepository = new ProductRepository($model);
        $useCase = new LoadProduct($productRepository);
        /**@var \Pricing\Entities\ProductHub\Product[] */
        $results = $useCase->execute();

        $products = [];
        foreach ($results as $result) {
            $products[] = $result->toArray();
        }
        $end = microtime(true);
        $memory = memory_get_usage(true);
        $memoryPeak = memory_get_peak_usage(true);
        return $this->responseToJsonSuccess([
            'start' => $start,
            'end' => $end,
            'seconds' => $end - $start,
            'products_count' => count($products),
            'memory' => $memory,
            'memory_peak' => $memoryPeak
        ]);
    }

    public function take2(): JsonResponse
    {
        $start = microtime(true);

        $productRepository = new ProductRepository2();
        $useCase = new LoadProduct($productRepository);
        /**@var \Pricing\Entities\ProductHub\Product[] */
        $products = $useCase->execute();

        $end = microtime(true);
        $memory = memory_get_usage(true);
        $memoryPeak = memory_get_peak_usage(true);
        return $this->responseToJsonSuccess([
            'start' => $start,
            'end' => $end,
            'seconds' => $end - $start,
            'products_count' => count($products),
            'memory' => $memory,
            'memory_peak' => $memoryPeak
        ]);
    }

}
