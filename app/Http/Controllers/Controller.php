<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use App\Traits\TResponder;
use Illuminate\Routing\Controller as BaseController;
use Lang;

/**
 * Class Controller
 * @package App\Http\Controllers
 */
class Controller extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;
    use TResponder;

    /**
     * Refresh a token.
     *
     * @return JsonResponse
     */
    public function refresh(): JsonResponse
    {
        return $this->respondWithToken($this->guard()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param string $token
     * @param mixed|null $user
     * @param int $statusCode
     * @return JsonResponse
     */
    protected function respondWithToken(string $token, $user = null, $statusCode = Response::HTTP_OK): JsonResponse
    {
        $data = [
            'token' => $token,
            'type' => 'bearer',
            //@phpstan-ignore-next-line
            'expires_in' => $this->guard()->factory()->getTTL() * 60,
        ];

        if (!is_null($user)) {
            $data['user'] = $user;
        }
        return $this->success($data, Lang::get('auth.success'), $statusCode);
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return Guard
     */
    public function guard(): Guard
    {
        return Auth::guard();
    }
}
