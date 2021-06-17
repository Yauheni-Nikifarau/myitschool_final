<?php

namespace Database\Factories;

use App\Models\Hotel;
use Illuminate\Database\Eloquent\Factories\Factory;

class HotelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Hotel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $imagePath = $this->faker->image(storage_path('app/public/tripsWallpapers'), 300, 300, 'travel');

        return [
            'name' => $this->faker->words($this->faker->numberBetween(1,5), true),
            'description' => $this->faker->paragraphs($this->faker->numberBetween(1,5), true),
            'stars' => $this->faker->numberBetween(3,5),
            'country' => $this->faker->country(),
            'city' => $this->faker->city(),
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
            'image' => str_replace(storage_path('app/public/'), '', $imagePath)
        ];
    }
}
