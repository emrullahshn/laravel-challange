<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySongTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_song')->insert([
            'category_id' => 1,
            'song_id' => 1,
        ]);
    }
}
