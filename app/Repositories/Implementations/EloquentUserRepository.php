<?php

namespace App\Repositories\Implementations;

use App\Repositories\UserRepository;
use App\Models\User;
use App\Models\Requests\CreateUserRequest;
use App\Repositories\UserRespository;

class EloquentUserRepository implements UserRepository
{
    public function getUserById(int $id)
    {
        return User::find($id);
    }

    public function createUser(CreateUserRequest $userRequest)
    {
        $newUser = new User();
        $newUser->fill($userRequest->toArray());
        $newUser->password = app('hash')->make($userRequest->getPassword());

        $newUser->save();

        return $newUser;
    }

    public function findUserByEmail(string $email)
    {
        $user = User::where('email', $email)->first();

        return $user;
    }
}