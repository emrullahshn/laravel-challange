<?php

namespace App\Http\Controllers\Api;

use App\Song;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;

class FavoriteController
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function add(Request $request): JsonResponse
    {
        $songId = $request->request->get('songId');

        if (empty($songId)){
            return new JsonResponse([
                'error' => [
                    'status' => 404,
                    'message' => 'Song id not found!'
                ]
            ]);
        }

        /**
         * @var User $user
         */
        $user = Auth::user();
        $song = Song::find($songId);

        if ($song === null){
            return new JsonResponse([
                'error' => [
                    'status' => '404',
                    'message' => 'Song not found!'
                ]
            ]);
        }

        $user->favorites()->attach($song);
        $user->save();

        return new JsonResponse([
            'success' =>true
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function remove(Request $request): JsonResponse
    {
        $songId = $request->request->get('songId');

        if (empty($songId)){
            return new JsonResponse([
                'error' => [
                    'status' => 404,
                    'message' => 'Song id not found!'
                ]
            ]);
        }

        /**
         * @var User $user
         */
        $user = Auth::user();
        $song = Song::find($songId);

        if ($song === null){
            return new JsonResponse([
                'error' => [
                    'status' => 404,
                    'message' => 'Song not found!'
                ]
            ]);
        }

        $user->favorites()->detach($song);
        $user->save();

        return new JsonResponse([
            'success' =>true
        ]);
    }

    /**
     * @return JsonResponse
     */
    public function list(): JsonResponse
    {
        /**
         * @var User $user
         */
        $user = Auth::user();
        $favorites = $user->favorites();

        return new JsonResponse([
            'data' => $favorites->getResults()->all()
        ]);
    }
}
