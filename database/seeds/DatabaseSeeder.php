<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(SongsTableSeeder::class);
        $this->call(FavoritesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(CategorySongTableSeeder::class);
    }
}
