<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Listing;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->authorize('index', Listing::class);
        $filters = $request->only([
            'priceFrom',
            'priceTo',
            'beds',
            'baths',
            'areaFrom',
            'areaTo'
        ]);

        return Inertia::render(
            'Listing/IndexPage',
            [
                'filters' => $filters,
                'paginatedListings' => Listing::orderByDesc('created_at')
                ->filter($filters)
                ->paginate(10)
                ->withQueryString()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Listing::class);
        return Inertia::render('Listing/CreatePage');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('store', Listing::class);
        $listingData = $request->validate([
            'beds' => 'required|integer|min:1',
            'baths' => 'required|integer|min:1',
            'area' => 'required|integer|min:1',
            'city' => 'required|string',
            'code' => 'required|string',
            'street' => 'required|string',
            'street_nr' => 'required|string',
            'price' => 'required|integer',
        ]);

        $listingData['user_id'] = auth()->user()->id;

        Listing::create($listingData);

        return redirect()->route('listings.index')
        ->with('success', 'Listing created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {
        $this->authorize('view', $listing);
        return Inertia::render(
            'Listing/ShowPage',
            [
                'listing' => $listing
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing)
    {
        $this->authorize('update', $listing);
        return Inertia::render(
            'Listing/EditPage',
            [
                'listing' => $listing
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Listing $listing)
    {
        $this->authorize('update', $listing);
        $listing->update($request->validate([
            'beds' => 'required|integer|min:1',
            'baths' => 'required|integer|min:1',
            'area' => 'required|integer|min:1',
            'city' => 'required|string',
            'code' => 'required|string',
            'street' => 'required|string',
            'street_nr' => 'required|string',
            'price' => 'required|integer',
        ]));

        return redirect()->route('listings.index')
        ->with('success', 'Listing updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing)
    {
        // $this->authorize('delete', Listing::class);
        $listing->delete();

        return redirect()->route('listings.index')
        ->with('success', 'Listing deleted successfully.');
    }
}
