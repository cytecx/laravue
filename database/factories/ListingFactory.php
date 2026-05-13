<?php

namespace Database\Factories;

use App\Models\Listing;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'beds' => fake()->numberBetween(1, 5),
            'baths' => fake()->numberBetween(1, 5),
            'area' => fake()->numberBetween(500, 5_000),
            'city' => fake()->city(),
            'code' => fake()->postcode(),
            'street' => fake()->streetName(),
            'street_nr' => fake()->buildingNumber(),
            'price' => fake()->numberBetween(100_000, 1_000_000),
        ];
    }
}
