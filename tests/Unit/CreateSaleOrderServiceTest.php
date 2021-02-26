<?php

namespace Tests\Feature;

use Mockery;
use Tests\TestCase;

use App\User;
use App\SaleOrder;
use App\Services\CreateSaleOrderService;

class CreateSaleOrderServiceTest extends TestCase
{
    public function tearDown()
    {
        Mockery::close();
    }

    public function setUp()
    {
        parent::setUp();

        $this->userRepository = Mockery::mock('App\Contracts\UserRepositoryInterface');
        $this->saleOrderRepository = Mockery::mock('App\Contracts\SaleOrderRepositoryInterface');
        $this->saleOrderProductRepository = Mockery::mock('App\Contracts\SaleOrderProductRepositoryInterface');
        $this->createOrderService = Mockery::mock('App\Services\CreateSaleOrderService');
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreateSaleOrder()
    {
        $this->userRepository->shouldReceive('getById')->once()->andReturn(new User([
            'id' => 1,
            'name' => 'Guilherme Henrique',
            'email' => 'guiihdourado@gmail.com',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]));

        $this->saleOrderRepository->shouldReceive('create')->once()->andReturn(new SaleOrder([
            'id' => 1,
            'user_id' => 1,
            'name' => 'Guilherme Henrique',
            'email' => 'guiihdourado@gmail.com',
            'total' => 140,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]));

        $this->saleOrderProductRepository->shouldReceive('createMany')->once()->andReturn(true);

        $createSaleOrderService = new CreateSaleOrderService($this->userRepository, $this->saleOrderRepository, $this->saleOrderProductRepository);
        $response = $createSaleOrderService->execute([
            'user_id' => 1,
            'products' => [
                [
                    'id' => 1,
                    'name' => 'Produto 01',
                    'value' => 10,
                    'quantity' => 5
                ],
                [
                    'id' => 2,
                    'name' => 'Produto 02',
                    'value' => 10,
                    'quantity' => 9
                ]
            ]
        ]);

        $this->assertEquals(new SaleOrder([
            'id' => 1,
            'user_id' => 1,
            'name' => 'Guilherme Henrique',
            'email' => 'guiihdourado@gmail.com',
            'total' => 140,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]), $response);
    }

    /**
    *    @expectedException App\Exceptions\ResponseApiException
    */
    public function testNotCreateSaleOrderWithoutProducts()
    {
        $createSaleOrderService = new CreateSaleOrderService($this->userRepository, $this->saleOrderRepository, $this->saleOrderProductRepository);
        $createSaleOrderService->execute([
            'user_id' => 1,
            'products' => []
        ]);
    }
}
