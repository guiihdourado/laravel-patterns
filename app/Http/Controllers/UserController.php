<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\ListUsersService;
use App\Services\CreateUserService;

class UserController extends Controller
{
    private $createUserService;

    public function __construct(
        ListUsersService $listUsersService,
        CreateUserService $createUserService
    )
    {
        $this->listUsersService     = $listUsersService;
        $this->createUserService    = $createUserService;
    }

    public function index()
    {
        return $this->listUsersService->execute();
    }

    public function store(Request $request)
    {
        return $this->createUserService->execute($request->all());
    }
}
