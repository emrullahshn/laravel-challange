<?php

namespace App\Http\Controllers\Api;


use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Request;

class ApplicationController
{
    public function index(){
        return new JsonResponse([
           'force_update' => false
        ]);
    }
}
