<?php

namespace App\Http\Controllers\Api;


use App\Song;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class SongController
{
    /**
     * @param int $id
     * @return BinaryFileResponse
     */
    public function getSong(int $id): BinaryFileResponse
    {
        $song = Song::find($id)->first();

        if ($song === null){
            return new JsonResponse([
                'error' => [
                    'status' => 404,
                    'message' => 'Song not found!'
                ]
            ]);
        }

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
