<?php

namespace App\Services;

use App\Exceptions\ResponseApiException;

use App\Contracts\UserRepositoryInterface;
use App\Contracts\SaleOrderRepositoryInterface;
use App\Contracts\SaleOrderProductRepositoryInterface;

class CreateSaleOrderService
{
    private $userRepository;
    private $saleOrderRepository;
    private $saleOrderProductRepository;

    public function __construct(
        UserRepositoryInterface $userRepository,
        SaleOrderRepositoryInterface $saleOrderRepository,
        SaleOrderProductRepositoryInterface $saleOrderProductRepository
    )
    {
        $this->userRepository = $userRepository;
        $this->saleOrderRepository = $saleOrderRepository;
        $this->saleOrderProductRepository = $saleOrderProductRepository;
    }

    public function execute($data)
    {
        $products = $data['products'];

        if(count($products) === 0) {
            throw new ResponseApiException('Not have products.', 400);
        }

        $user = $this->userRepository->getById($data['user_id']);
        $totalProducts = $this->sumTotalProducts($products);

        $dataSaleOrder = [
            'user_id'   => $user->id,
            'name'      => $user->name,
            'email'     => $user->email,
            'total'     => $totalProducts,
        ];

        $saleOrder = $this->saleOrderRepository->create($dataSaleOrder);

        $dataSaleOrderProducts = array_map(function($product) use($saleOrder) {
            return [
                'sale_order_id'     => $saleOrder->id,
                'product_id'        => $product['id'],
                'quantity'          => $product['quantity'],
                'value'             => $product['value'],
                'total'             => $product['quantity'] * $product['value'],
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ];
        }, $products);

        $this->saleOrderProductRepository->createMany($dataSaleOrderProducts);

        return $saleOrder;
    }

    private function sumTotalProducts(array $products): float
    {
        return array_reduce($products, function($finalValue, $product) {
            $finalValue += $product['value'] * $product['quantity'];
            return $finalValue;
        });
    }
}
