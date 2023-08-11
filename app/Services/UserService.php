<?php

namespace App\Services;

use App\Models\Requests\CreateUserRequest;

interface UserService
{
    public function getUserById(int $id);

    public function createUser(CreateUserRequest $userRequest);

    public function findUserByEmail(string $email);
}