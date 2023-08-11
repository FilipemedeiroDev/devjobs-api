<?php

namespace App\Repositories;

use App\Models\Requests\CreateUserRequest;

interface UserRepository
{
    public function getUserById(int $id);

    public function createUser(CreateUserRequest $userRequest);

    public function findUserByEmail(string $email);
}