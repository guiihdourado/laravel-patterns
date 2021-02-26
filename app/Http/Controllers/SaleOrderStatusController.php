<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\UpdateStatusSaleOrderService;

class SaleOrderStatusController extends Controller
{
    private $updateSaleOrderService;

    public function __construct(
        UpdateStatusSaleOrderService $updateSaleOrderService
    )
    {
        $this->updateSaleOrderService = $updateSaleOrderService;
    }

    public function update($id, Request $request)
    {
        return $this->updateSaleOrderService->execute($id, $request->all());
    }
}
