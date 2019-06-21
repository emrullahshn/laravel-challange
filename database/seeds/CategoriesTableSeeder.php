<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Test Category',
            'image_url' => '/Users/emrullahsahin/Sites/laravel-app/storage/categories/SampleCategoryImage.jpg',
        ]);
    }
}
