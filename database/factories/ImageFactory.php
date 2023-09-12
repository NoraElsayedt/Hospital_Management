<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Doctor;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'filename' => $this->faker->randomElement(['2.jpg','1.jpg']),
            'imageable_type' => 'App\Models\Doctor',
            'imageable_id' => Doctor::all()->random()->id,
            
        ];
    }
}
