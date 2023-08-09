<?php


namespace App\Http\Controllers;

use App\Services\UserService;
use App\Models\CreateUserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(private readonly UserService $userService)
    {
        $this->middleware('auth:api', ['except' => ['login', 'createUser']]);
    }

    public function me()
    {
        return response()->json(
            auth()->user()
        );
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

    public function login()
    {
        $credentials = request(['email', 'password']);
        if (!$token = auth()->attempt($credentials)) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        return $this->respondWithToken($token);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60 // default 1 hour
        ]);
    }
}
