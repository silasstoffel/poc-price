<?php

namespace Pricing\Infra\Database\Repositories\Eloquent\ProductHub;

use Illuminate\Support\Facades\DB;
use Pricing\Application\ProductHub\UseCase\Products\ProductRepositoryInterface;


class ProductRepository2 implements ProductRepositoryInterface
{

    public function findAll(): array
    {
        return DB::table('products')->get()->toArray();
    }
}
