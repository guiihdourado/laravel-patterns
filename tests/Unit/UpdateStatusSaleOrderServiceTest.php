<?php

namespace Tests\Feature;

use Mockery;
use Tests\TestCase;

use App\SaleOrder;
use App\Services\UpdateStatusSaleOrderService;

class UpdateStatusSaleOrderServiceTest extends TestCase
{
    public function tearDown()
    {
        Mockery::close();
    }

    public function setUp()
    {
        parent::setUp();

        $this->saleOrderRepository = Mockery::mock('App\Contracts\SaleOrderRepositoryInterface');
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUpdateStatusSaleOrder()
    {
        $this->saleOrderRepository->shouldReceive('update')->once()->andReturn(new SaleOrder([
            'id' => 1,
            'user_id' => 1,
            'name' => 'Guilherme Henrique',
            'email' => 'guiihdourado@gmail.com',
            'status' => 'BILLED',
            'total' => 140,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]));

        $updateStatusSaleOrderService = new UpdateStatusSaleOrderService($this->saleOrderRepository);
        $response = $updateStatusSaleOrderService->execute(1, [
            'status' => 'BILLED'
        ]);

        $this->assertEquals(new SaleOrder([
            'id' => 1,
            'user_id' => 1,
            'name' => 'Guilherme Henrique',
            'email' => 'guiihdourado@gmail.com',
            'status' => 'BILLED',
            'total' => 140,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]), $response);
    }

    /**
    *    @expectedException App\Exceptions\ResponseApiException
    */
    public function testNotUpdateStatusSaleOrderWithoutStatusAllowed()
    {
        $updateStatusSaleOrderService = new UpdateStatusSaleOrderService($this->saleOrderRepository);
        $updateStatusSaleOrderService->execute(1, [
            'status' => 'INVALID_STATUS'
        ]);
    }
}
