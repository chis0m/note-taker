<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Response;
use Lang;

class LoginController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
    {
        $credentials = $request->only('email', 'password');
        if (!$token = $this->guard()->attempt($credentials)) {
            return $this->error(null, Lang::get('auth.failed'));
        }
        $user = $this->guard()->user();
        $user->update(['login_at' => now()]);
        return $this->respondWithToken($token, $user, Response::HTTP_ACCEPTED);
    }

    /**
     * Log the user out (Invalidate the token)
     *
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        $this->guard()->logout();
        return $this->success(null, Lang::get('auth.logout'));
    }
}
