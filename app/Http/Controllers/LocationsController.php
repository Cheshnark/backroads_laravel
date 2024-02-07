<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Http\Requests\StoreLocationsRequest;
use App\Http\Requests\UpdateLocationsRequest;
use App\Http\Resources\LocationCollection;
use App\Filters\LocationFilter;
use App\Http\Resources\LocationResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new LocationFilter();
        $queryItems = $filter->transform($request);
        $location = Location::where($queryItems);
        return new LocationCollection($location->paginate()->appends($request->query()));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLocationsRequest $request)
    {
        return new LocationResource(Location::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        return new LocationResource($location);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLocationsRequest $request, Location $location)
    {
        // Add score, comment or image to its array. Maybe add an id for item to delete?
        // $images = ;
        // $score = ;        
        // $comments = ;

        $requestArray = [
            'coordinates' => $request->coordinates,
            'title' => $request->title,
            'body' => $request->body,
            'location_type' => $request->locationType,
            'address' => $request->address,
            'services' => $request->services,
            'price' => $request->price,
            'opening_hours' => $request->openingHours,
            'images' => $request->images,
            'score' => $request->score,
            'comments' => $request->comments
        ];    

        $updateArray = array_filter($requestArray);

        DB::table('locations')->update($updateArray);

        return response()->json([
            'message' => 'User updated successfully',
            'data' => new LocationResource($location)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        //
    }
}
