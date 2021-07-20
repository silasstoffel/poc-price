<?php

namespace Pricing\Application\ProductHub\UseCase\Products;

use Pricing\Entities\ProductHub\Product;

class LoadProduct
{
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @return Product[]
     */
    public function execute(): array
    {
        return $this->productRepository->findAll();
    }

}
