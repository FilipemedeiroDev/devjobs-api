<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Models\CreateUserRequest;

class DefaultUserService implements UserService
{

    public function __construct(private readonly UserRepository $userRepository)
    {
    }

    public function getUserById(int $id)
    {
        return $this->userRepository->getUserById($id);
    }

    public function createUser(CreateUserRequest $userRequest)
    {
        return $this->userRepository->createUser($userRequest);
    }
}
