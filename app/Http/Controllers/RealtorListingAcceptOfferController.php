<?php

namespace App\Http\Controllers;

use App\Models\Offer;

class RealtorListingAcceptOfferController extends Controller
{
    public function __invoke(Offer $offer)
    {
        $listing = $offer->listing;
        $this->authorize('update', $listing);

        // Accept selected offer
        $offer->update(['accepted_at' => now(), 'rejected_at' => null]);
        $listing->sold_at = now();
        $listing->save();

        // Reject all other offers
        $listing->offers()->except($offer)->update(['rejected_at' => now(), 'accepted_at' => null]);

        return redirect()->back()->with('success', "Offer #{$offer->id} accepted, other offers rejected");
    }
}
