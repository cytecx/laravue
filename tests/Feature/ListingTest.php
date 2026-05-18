<?php

namespace Tests\Feature;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ListingTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the 'withoutSold' scope.
     */
    public function test_without_sold_scope()
    {
        $user = User::factory()->create();

        // Create an unsold listing
        $unsoldListing = Listing::factory()->create([
            'by_user_id' => $user->id,
            'sold_at' => null,
        ]);

        // Create a sold listing
        $soldListing = Listing::factory()->create([
            'by_user_id' => $user->id,
            'sold_at' => now(),
        ]);

        $listings = Listing::withoutSold()->get();

        $this->assertTrue($listings->contains($unsoldListing));
        $this->assertFalse($listings->contains($soldListing));
    }

    /**
     * Test the 'mostRecent' scope.
     */
    public function test_most_recent_scope()
    {
        $user = User::factory()->create();

        $olderListing = Listing::factory()->create([
            'by_user_id' => $user->id,
            'created_at' => now()->subDays(2),
        ]);

        $newerListing = Listing::factory()->create([
            'by_user_id' => $user->id,
            'created_at' => now()->subDay(),
        ]);

        $listings = Listing::mostRecent()->get();

        $this->assertEquals($newerListing->id, $listings->first()->id);
        $this->assertEquals($olderListing->id, $listings->last()->id);
    }

    /**
     * Test the 'filter' scope for various scenarios.
     */
    public function test_filter_scope()
    {
        $user = User::factory()->create();

        $listing1 = Listing::factory()->create([
            'by_user_id' => $user->id,
            'price' => 100000,
            'beds' => 2,
            'baths' => 1,
            'area' => 1000,
        ]);

        $listing2 = Listing::factory()->create([
            'by_user_id' => $user->id,
            'price' => 200000,
            'beds' => 4,
            'baths' => 2,
            'area' => 2000,
        ]);

        $listing3 = Listing::factory()->create([
            'by_user_id' => $user->id,
            'price' => 300000,
            'beds' => 6,
            'baths' => 3,
            'area' => 3000,
        ]);

        // Test price range
        $listings = Listing::filter(['priceFrom' => 150000, 'priceTo' => 250000])->get();
        $this->assertCount(1, $listings);
        $this->assertTrue($listings->contains($listing2));

        // Test beds filter
        $listings = Listing::filter(['beds' => 4])->get();
        $this->assertCount(1, $listings);
        $this->assertTrue($listings->contains($listing2));

        // Test beds >= 6 (when value is 6)
        $listings = Listing::filter(['beds' => 6])->get();
        $this->assertCount(1, $listings);
        $this->assertTrue($listings->contains($listing3));

        // Test area range
        $listings = Listing::filter(['areaFrom' => 500, 'areaTo' => 1500])->get();
        $this->assertCount(1, $listings);
        $this->assertTrue($listings->contains($listing1));
    }

    /**
     * Test relations.
     */
    public function test_listing_relationships()
    {
        $user = User::factory()->create();
        $listing = Listing::factory()->create([
            'by_user_id' => $user->id,
        ]);

        $this->assertInstanceOf(User::class, $listing->owner);
        $this->assertEquals($user->id, $listing->owner->id);
    }
}
