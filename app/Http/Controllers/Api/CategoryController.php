<?php

namespace App\Http\Controllers\Api;


use App\Category;
use Illuminate\Http\JsonResponse;

class CategoryController
{
    /**
     * @return JsonResponse
     */
    public function getAll(): JsonResponse
    {
        $categories = Category::all();

        return new JsonResponse([
            'data' => $categories
        ]);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function getCategoryDetails(int $id): JsonResponse
    {
        $category = Category::find($id)->first();

        if ($category === null) {
            return new JsonResponse([
                'error' => [
                    'status' => 404,
                    'message' => 'Category not found!'
                ]
            ]);
        }

        return new JsonResponse([
            'data' => $category
        ]);
    }
}
