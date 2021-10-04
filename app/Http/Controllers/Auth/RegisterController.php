<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Traits\TResponder;
use Illuminate\Http\JsonResponse;

/**
 * Class RegisterController
 * @package App\Http\Controllers\Auth
 */
class RegisterController extends Controller
{
    use TResponder;

    /**
     * @param RegisterRequest $request
     * @return JsonResponse
     */
    public function store(RegisterRequest $request): JsonResponse
    {
        $password = $request['password'];
        $credentials = $request->only(['first_name', 'last_name', 'email']);
        $user = User::create(array_merge($credentials, ['password' => bcrypt($password)]));
        //@phpstan-ignore-next-line
        $token = $this->guard()->fromUser($user);
        return $this->respondWithToken($token, $user);
    }
}
