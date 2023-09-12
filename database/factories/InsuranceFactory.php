<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Insurance>
 */
class InsuranceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'insurance_code'=>fake()->name(),
            'discount_percentage'=>fake()->numberBetween(100, 500),
            'Company_rate'=>fake()->numberBetween(100, 500),
            'name'=>fake()->name(),
            'notes'=>fake()->name()
        ];
    }
}
