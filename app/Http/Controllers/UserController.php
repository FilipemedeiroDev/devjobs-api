<?php


namespace App\Http\Controllers;

use App\Services\UserService;
use App\Models\CreateUserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(private readonly UserService $userService)
    {
    }

    public function getUserById($id)
    {
        return $this->userService->getUserById($id);
    }

    public function createUser(Request $request)
    {
        $creationRequest = new CreateUserRequest($request);

        $user = $this->userService->createUser($creationRequest);

        return response()->json([
            'user' => $user,
            'message' => 'CREATED'
        ], 201);
    }
}
