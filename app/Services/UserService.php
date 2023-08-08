<?php

namespace App\Services;

use App\Models\CreateUserRequest;

interface UserService
{
    public function getUserById(int $id);

    public function createUser(CreateUserRequest $userRequest);
}
