<?php

namespace Pricing\Infra\Database\Repositories\Eloquent\ProductHub;

use DateTimeImmutable;
use Pricing\Application\ProductHub\UseCase\Products\ProductRepository as ProductRepositoryInterface;
use Pricing\Entities\ProductHub\Product;
use App\Models\Product as ProductModel;

class ProductRepository implements ProductRepositoryInterface
{
    private ProductModel $model;

    public function __construct(ProductModel $model)
    {
        $this->model = $model;
    }

    public function findAll(): array
    {
        $products = $this->model::all();
        $items = [];
        foreach ($products as $product) {
            $p = new Product(
                $product->id,
                $product->name,
                $product->description,
                $product->sku,
                (int) $product->category_id,
                (float) $product->price,
                new DateTimeImmutable($product->created_at),
                new DateTimeImmutable($product->updated_at)
            );
            $items[] = $p;
        }
        return $items;
    }
}
