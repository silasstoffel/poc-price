<?php

namespace Pricing\Application\ProductHub\UseCase\Products;

use Pricing\Entities\ProductHub\Product;

interface ProductRepository
{
    /**
     * Find all products.
     * @return Product[]
     */
    public function findAll(): array;
}
