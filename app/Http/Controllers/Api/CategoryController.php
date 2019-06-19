<?php

namespace App\Http\Controllers\Api;


use App\Category;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class CategoryController
{
    /**
     * @return JsonResponse
     */
    public function getAll(): JsonResponse
    {
        $categories =  Category::all();

        $data = [];
        foreach ($categories as $category){
            $data[] = [
                'id' => $category->id,
                'name' => $category->name,
                'image_url' => $category->image_url
            ];
        }

        return new JsonResponse($categories);
    }

    public function getCategoryDetails(int $id){
        $category = Category::find($id)->first();

        return new JsonResponse($category);
    }
}
