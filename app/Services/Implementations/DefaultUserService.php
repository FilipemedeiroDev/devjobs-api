<?php

namespace App\Services\Implementations;

use App\Repositories\UserRepository;
use App\Models\Requests\CreateUserRequest;
use App\Services\UserService;

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
        $user = $this->findUserByEmail($userRequest->getEmail());

        if($user) {
            abort(422, 'The email sent already exists');
        }

        return $this->userRepository->createUser($userRequest);
    }

    public function findUserByEmail(string $email)
    {
        return $this->userRepository->findUserByEmail($email);
    }

}