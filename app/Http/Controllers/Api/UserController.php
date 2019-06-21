<?php

namespace App\Http\Controllers\Api;


use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Str;


class UserController
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request): JsonResponse
    {
        $params = $request->all();

        /**
         * @var User $user
         */
        $user = User::where('email', $params['email'])->first();

        if ($user === null) {
            return new JsonResponse([
                'error' => [
                    'status' => 404,
                    'message' => 'User not found!'
                ]
            ]);
        }


        if (Hash::check($request->password, $user->password)) {
            $user->api_token = Str::random(60);
            $user->save();
            return new JsonResponse([
                'api_token' => $user->api_token,
                'username' => $user->name,
                'email' => $user->email,
                'id' => $user->id
            ]);
        }
        return response()->json([
            'error' => [
                'status' => 401,
                'message' => 'Unauthenticated.'
            ]
        ]);
    }

    /**
     * @return JsonResponse|User
     */
    public function user()
    {
        $user = Auth::guard('api')->user();

        return $user;
    }
}
