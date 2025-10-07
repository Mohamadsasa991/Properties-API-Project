<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBrokerRequest;
use App\Http\Requests\UpdateBrokerRequest;
use App\Http\Resources\BrokersResource;
use App\Models\Broker;
use Illuminate\Http\Request;

class BrokersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brokers = Broker::all();

        return BrokersResource::collection($brokers);

    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrokerRequest $request)
    {
        $data = $request->validated();
        $broker = Broker::create($data);

        return new BrokersResource($broker);

    }

    /**
     * Display the specified resource.
     */
    public function show(Broker $broker)
    {
        return new BrokersResource($broker);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrokerRequest $request, Broker $broker)
    {
        $data = $request->validated();

        $broker->update($data);
        return new BrokersResource($broker);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Broker $broker)
    {
        $broker->delete();

        return response()->json([
        'success' =>true,
        'message' => 'The Broker has been deleted'
        ]);
    }
}
