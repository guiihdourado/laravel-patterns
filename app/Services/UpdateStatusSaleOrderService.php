<?php

namespace App\Services;

use App\Exceptions\ResponseApiException;
use App\Contracts\SaleOrderRepositoryInterface;

class UpdateStatusSaleOrderService
{
    private $saleOrderRepository;

    public function __construct(SaleOrderRepositoryInterface $saleOrderRepository)
    {
        $this->saleOrderRepository = $saleOrderRepository;
    }

    public function execute($id, $attributes)
    {
        if($attributes['status'] !== 'BILLED' && $attributes['status'] !== 'CANCELED') {
            throw new ResponseApiException('Status not allowed.', 400);
        }

        $saleOrder = $this->saleOrderRepository->update($attributes, $id);

        return $saleOrder;
    }
}
