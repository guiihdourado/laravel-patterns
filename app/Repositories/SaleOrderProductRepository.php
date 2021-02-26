<?php

namespace App\Repositories;

use App\SaleOrderProduct;
use App\Repositories\BaseRepository;
use App\Contracts\SaleOrderProductRepositoryInterface;

class SaleOrderProductRepository extends BaseRepository implements SaleOrderProductRepositoryInterface
{
    /**
    * SaleOrderProductRepository constructor.
    *
    * @param SaleOrderProduct $model
    */
    public function __construct(SaleOrderProduct $model)
    {
        parent::__construct($model);
    }
}
