<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class RealtorListingController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Listing::class, 'listing');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = [
            'deleted' => $request->boolean('deleted'),
            ...$request->only(['by', 'order']),
        ];

        return inertia('Realtor/Index', [
            'filters' => $filters,
            'listings' => auth()->user()
                ->listings()
                ->filter($filters)
                ->withCount('images')
                ->withCount('offers')
                ->paginate(8)
                ->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Realtor/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->user()->listings()->create(
            $request->validate([
                'beds' => 'required|integer|min:0|max:20',
                'baths' => 'required|integer|min:0|max:20',
                'area' => 'required|integer|min:15|max:1000',
                'city' => 'required|string',
                'post_code' => 'required|string',
                'street_nr' => 'required|integer|min:0|max:10000',
                'street' => 'required|string',
                'price' => 'required|integer|min:1|max:100000000',
            ])
        );

        return redirect()->route('realtor.listing.index')->with('success', 'Listing created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {
        return Inertia('Realtor/Show', [
            'listing' => $listing->load(['offers', 'offers.bidder']),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing)
    {
        return inertia('Realtor/Edit', [
            'listing' => $listing,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Listing $listing)
    {
        $listing->update(
            $request->validate([
                'beds' => 'required|integer|min:0|max:20',
                'baths' => 'required|integer|min:0|max:20',
                'area' => 'required|integer|min:15|max:1000',
                'city' => 'required|string',
                'post_code' => 'required|string',
                'street_nr' => 'required|integer|min:0|max:10000',
                'street' => 'required|string',
                'price' => 'required|integer|min:1|max:100000000',
            ])
        );

        return redirect()->route('realtor.listing.index')->with('success', 'Listing updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing)
    {
        $listing->deleteOrFail();

        return redirect()->route('realtor.listing.index')->with('success', 'Listing deleted successfully.');
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore($id)
    {
        $listing = Listing::withTrashed()->findOrFail($id);
        $this->authorize('restore', $listing);

        $listing->restore();

        return redirect()->route('realtor.listing.index')->with('success', 'Listing restored successfully.');
    }
}
