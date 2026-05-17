<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\ListingImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RealtorListingImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Listing $listing)
    {
        $listing->load(['images']);

        return Inertia('Realtor/ListingImage/Create', [
            'listing' => $listing,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Listing $listing, Request $request)
    {
        if ($request->hasFile('images')) {
            $request->validate([
                'images.*' => 'mimes:jpg,jpeg,png,webp|max:2048',
            ], [
                'images.*.mimes' => 'Only JPG, JPEG, PNG, and WebP files are allowed.',
                'images.*.max' => 'Each image must not exceed 2MB in size.',
            ]);
            foreach ($request->file('images') as $file) {
                $path = $file->store('images', 'public');
                $listing->images()->save(new ListingImage(['filename' => $path]));
            }

            return redirect()->route('realtor.listing.index')->with('success', 'Images uploaded successfully.');
        } else {
            return redirect()->back()->with('error', 'No images were uploaded.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing, ListingImage $image)
    {
        Storage::disk('public')->delete($image->filename);
        $image->delete();

        return redirect()->back()->with('success', 'Image deleted successfully.');
    }
}
