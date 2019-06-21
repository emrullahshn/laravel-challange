<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SongsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('songs')->insert([
            'name' => 'Test Song',
            'path' => storage_path().'/songs/SampleAudio.mp3',
        ]);
    }
}
