<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePropertiesRequest;
use App\Http\Resources\PropertiesResource;
use App\Models\Property;
use Illuminate\Http\Request;
use Pest\Plugins\Only;

class PropertiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PropertiesResource::collection(Property::all());
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePropertiesRequest $request)
    {
        $request->validated();

        $property =Property::create([
            'address' => $request->address ,
            'listing_type' => $request->listing_type
            ,'city' => $request->city
            , 'zip_code' => $request->zip_code
            ,'description' => $request->description
            , 'build_year' => $request->build_year,
            'broker_id' => $request->broker_id
        ]);

        $property->characteristic()->create([
            'property_id' => $property->id,
            'price' => $request->price,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'sqft' => $request->sqft,
            'price_sqft' => $request->price_sqft,
            'property_type' => $request->property_type,
            'status' => $request->status
        ]);

        return new PropertiesResource($property);
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        return new PropertiesResource($property);
    }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, Property $property)
{
    // Update property fields
    $property->update($request->only([
        'broker_id',
        'address',
        'listing_type',
        'city',
        'zip_code',
        'description',
        'build_year'
    ]));

    // Update related characteristic (without touching property_id)
    if ($property->characteristic) {
        $property->characteristic()->update($request->only([
            'price',
            'bedrooms',
            'bathrooms',
            'sqft',
            'price_sqft',
            'status',
            'property_type'
        ]));
    }

    return new PropertiesResource($property->load('characteristic')); // load relationship for fresh data
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();

        return response()->json([
        'success' =>true,
        'message' => 'The Property has been deleted'
        ]);
    }
}
