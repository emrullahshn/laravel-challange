<?php

namespace App\Http\Controllers\Api;


use App\Song;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class SongController
{
    public function getSong(int $id)
    {
        $song = Song::find($id)->first();

        $path = storage_path() . DIRECTORY_SEPARATOR . 'songs' . DIRECTORY_SEPARATOR .$song->path.'.mp3';

        $response = new BinaryFileResponse($path);
        BinaryFileResponse::trustXSendfileTypeHeader();

        return $response;
    }
}
