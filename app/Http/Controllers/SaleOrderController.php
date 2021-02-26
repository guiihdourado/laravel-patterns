<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\CreateSaleOrderService;

class SaleOrderController extends Controller
{
    private $createSaleOrderService;

    public function __construct(
        CreateSaleOrderService $createSaleOrderService
    )
    {
        $this->createSaleOrderService = $createSaleOrderService;
    }

    public function store(Request $request)
    {
        return $this->createSaleOrderService->execute($request->all());
    }
}
