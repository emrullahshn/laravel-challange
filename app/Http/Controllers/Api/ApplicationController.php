<?php

namespace App\Http\Controllers\Api;


use Illuminate\Http\JsonResponse;

class ApplicationController
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return new JsonResponse([
            'application_version' => 123,
            'language_file_version' => 23,
            'force_update' => false,
            'soft_update' => false,
            'language_file_update' => false
        ]);
    }
}
