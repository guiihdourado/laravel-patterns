<?php

namespace App\Repositories;

use App\Product;
use App\Repositories\BaseRepository;
use App\Contracts\ProductRepositoryInterface;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    /**
    * ProductRepository constructor.
    *
    * @param Product $model
    */
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }
}
