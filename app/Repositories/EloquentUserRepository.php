<?php

namespace App\Repositories;

use App\Repositories\UserRepository;
use App\Models\User;
use App\Models\CreateUserRequest;


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
}
