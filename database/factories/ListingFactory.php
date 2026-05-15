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
            'beds' => $this->faker->numberBetween(1, 5),
            'baths' => $this->faker->numberBetween(1, 5),
            'area' => $this->faker->numberBetween(500, 5_000),
            'city' => $this->faker->city(),
            'post_code' => $this->faker->postcode(),
            'street' => $this->faker->streetName(),
            'street_nr' => $this->faker->buildingNumber(),
            'price' => $this->faker->numberBetween(100_000, 1_000_000),
        ];
    }
}
