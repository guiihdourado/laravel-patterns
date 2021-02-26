<?php

namespace App\Services;

use App\Contracts\UserRepositoryInterface;

class ListUsersService
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute()
    {
        $users = $this->userRepository->all();

        return $users;
    }
}
