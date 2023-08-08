<?php

namespace App\Repositories;

use App\Models\CreateUserRequest;

interface UserRepository
{
    public function getUserById(int $id);

    public function createUser(CreateUserRequest $userRequest);
}
