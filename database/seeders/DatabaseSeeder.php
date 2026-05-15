<?php

namespace Database\Seeders;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::updateOrCreate([
            'email' => 'munirulhaikal@gmail.com',
        ], [
            'name' => 'Munirul Haikal',
            'password' => bcrypt('password'),
        ]);
        Listing::factory(20)->create();
    }
}
