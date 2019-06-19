<?php

namespace App\Http\Controllers\Api;


use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Str;


class UserController
{
    public function login(Request $request)
    {
        $params =$request->all();

        /**
         * @var User $user
         */
        $user = User::where('email', $params['email'])->first();
        if (Hash::check($request->password, $user->password)) {
            $user->api_token = Str::random(60);
            $user->save();
            return response()->json([
                'status' => 200,
                'api_token' => $user->api_token,
                'username' => $user->name,
                'email' => $user->email,
                'id' => $user->id
            ]);
        }
        return response()->json([
            'status' => 401,
            'message' => 'Unauthenticated.'
        ]);
    }

    public function user()
    {
        $user = Auth::guard('api')->user();
        if (!$user) {
            return response()->json([
                'status' => 401,
                'message' => 'Unauthenticated.'
            ]);
        }
        return $user;
    }
}
