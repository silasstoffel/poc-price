<?php

namespace Pricing\Application\ProductHub\UseCase\Products;

use Pricing\Entities\ProductHub\Product;

class LoadProduct
{
    private ProductRepositoryInterface $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
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
