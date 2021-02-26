<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;

use App\Mail\NewUserNotification;
use App\Exceptions\ResponseApiException;
use App\Contracts\UserRepositoryInterface;

class CreateUserService
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute($data)
    {
        $existsUser = $this->userRepository->findByEmail($data['email']);

        if(isset($existsUser)) {
            throw new ResponseApiException('Email address already used.', 400);
        }

        $user = $this->userRepository->create($data);

        Mail::to($data['email'])->send(new NewUserNotification($user));

        return $user;
    }
}
