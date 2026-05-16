<?php

namespace Database\Seeders;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate([
            'email' => 'munirulhaikal@gmail.com',
        ], [
            'name' => 'Munirul Haikal',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
            'is_admin' => true,
        ]);
        User::factory(10)->create();
        Listing::factory(20)->create([
            'by_user_id' => 1,
        ]);
        Listing::factory(20)->create([
            'by_user_id' => 2,
        ]);
    }
}
