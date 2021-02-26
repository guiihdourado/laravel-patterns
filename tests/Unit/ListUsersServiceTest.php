<?php

namespace Tests\Feature;

use Mockery;
use Tests\TestCase;

use App\User;
use App\Services\ListUsersService;

class ListUsersServiceTest extends TestCase
{
    public function tearDown()
    {
        Mockery::close();
    }

    public function setUp()
    {
        parent::setUp();

        $this->userRepository = Mockery::mock('App\Contracts\UserRepositoryInterface');
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testListUsers()
    {
        $this->userRepository->shouldReceive('all')->once()->andReturn([new User(), new User()]);

        $listUserService = new ListUsersService($this->userRepository);

        $response = $listUserService->execute();

        $this->assertEquals([new User(), new User()], $response);
    }
}
