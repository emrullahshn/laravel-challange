<?php

namespace App\Http\Controllers\Api;


use App\Song;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class SongController
{
    /**
     * @param int $id
     * @return JsonResponse|BinaryFileResponse
     */
    public function getSong(int $id)
    {
        $song = Song::find($id);

        if ($song === null){
            return new JsonResponse([
                'error' => [
                    'status' => 404,
                    'message' => 'Song not found!'
                ]
            ]);
        }

        $song = $song->first();

        $path = $song->path;

        if (file_exists($path) === false){
            return new JsonResponse([
                'error' => [
                    'status' => 404,
                    'message' => 'File not found!'
                ]
            ]);
        }

        $response = new BinaryFileResponse($path);
        BinaryFileResponse::trustXSendfileTypeHeader();

        return $response;
    }
}
