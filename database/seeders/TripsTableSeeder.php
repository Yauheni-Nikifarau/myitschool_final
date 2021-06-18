<?php

namespace Database\Seeders;

use App\Models\Trip;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class TripsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('public/tripsWallpapers');
        Storage::makeDirectory('public/tripsWallpapers');
        Trip::factory()->count(50)->create();
    }
}
