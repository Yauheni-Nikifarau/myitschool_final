<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TripsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Storage::deleteDirectory('public/tripsWallpapers');
        \Storage::makeDirectory('public/tripsWallpapers');
        Trip::factory()->count(50)->create();
    }
}
