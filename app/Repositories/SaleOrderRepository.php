<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

use App\SaleOrder;
use App\Repositories\BaseRepository;
use App\Contracts\SaleOrderRepositoryInterface;

class SaleOrderRepository extends BaseRepository implements SaleOrderRepositoryInterface
{
    /**
    * SaleOrderRepository constructor.
    *
    * @param SaleOrder $model
    */
    public function __construct(SaleOrder $model)
    {
        parent::__construct($model);
    }

    /**
     * Returns a given
     *
     * @param array $attributes
     * @return Model
     */
    public function createOrderProducts($attributes): Model
    {
        return $this->model->saleOrderProducts()->createMany($attributes);
    }
}
