<?php

namespace Tests\Feature;

use Mockery;
use Tests\TestCase;
use Illuminate\Support\Facades\Mail;

use App\User;
use App\Mail\NewUserNotification;
use App\Services\CreateUserService;

class CreateUserServiceTest extends TestCase
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
    public function testCreateUser()
    {
        Mail::fake();
        $this->userRepository->shouldReceive('findByEmail')->with('guiihdourado@gmail.com')->once()->andReturn(null);

        $this->userRepository->shouldReceive('create')->with(
            ['name' => 'Guilherme Henrique', 'email' => 'guiihdourado@gmail.com']
        )->once()->andReturn(new User([
            'id' => 1,
            'name' => 'Guilherme Henrique',
            'email' => 'guiihdourado@gmail.com',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]));

        $userService = new CreateUserService($this->userRepository);

        $response = $userService->execute(['name' => 'Guilherme Henrique', 'email' => 'guiihdourado@gmail.com']);

        Mail::assertSent(NewUserNotification::class, 1);

        $this->assertEquals(new User([
            'id' => 1,
            'name' => 'Guilherme Henrique',
            'email' => 'guiihdourado@gmail.com',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]), $response);
    }

    /**
    *    @expectedException App\Exceptions\ResponseApiException
    */
    public function testNotCreateUserWithEmailAlreadyUsed()
    {
        $this->userRepository->shouldReceive('findByEmail')->with('guiihdourado@gmail.com')->once()->andReturn(new User());

        $userService = new CreateUserService($this->userRepository);

        $userService->execute(['name' => 'Guilherme Henrique', 'email' => 'guiihdourado@gmail.com']);
    }
}
