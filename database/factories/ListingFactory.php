<?php

namespace Database\Factories;

use App\Models\Listing;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Listing>
 */
class ListingFactory extends Factory
{
    protected $model = Listing::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('ms_MY');

        return [
            'beds' => $faker->numberBetween(1, 5),
            'baths' => $faker->numberBetween(1, 5),
            'area' => $faker->numberBetween(500, 5_000),
            'city' => $faker->city(),
            'post_code' => $faker->postcode(),
            'street' => $faker->streetName(),
            'street_nr' => $faker->buildingNumber(),
            'price' => $faker->numberBetween(100_000, 1_000_000),
            'by_user_id' => 1,
        ];
    }
}
