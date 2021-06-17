<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HotelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Storage::deleteDirectory('public/hotelsPhotos');
        \Storage::makeDirectory('public/hotelsPhotos');
        Hotel::factory()->count(20)->create();
    }
}
