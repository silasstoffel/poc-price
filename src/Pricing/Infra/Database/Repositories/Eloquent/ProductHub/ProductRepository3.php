<?php

namespace Pricing\Infra\Database\Repositories\Eloquent\ProductHub;

use DateTimeImmutable;
use Illuminate\Support\Facades\DB;
use Pricing\Application\ProductHub\UseCase\Products\ProductRepositoryInterface;
use Pricing\Entities\ProductHub\Product;


class ProductRepository3 implements ProductRepositoryInterface
{

    public function findAll(): array
    {
        $products = DB::table('products')->get()->toArray();
        $items = [];
        foreach ($products as $product) {
            $items[] = new Product(
                $product->id,
                $product->name,
                $product->description,
                $product->sku,
                (int) $product->category_id,
                (float) $product->price,
                new DateTimeImmutable($product->created_at),
                new DateTimeImmutable($product->updated_at)
            );
        }
        return $items;
    }
}
