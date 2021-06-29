<?php

namespace App\Http\Controllers;

use App\DataMapper\Vehicle as DataMapperVehicle;
use App\Http\Requests\VehicleStore;
use App\Models\Vehicle;
use App\Transformers\VehicleRecord;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::all();

        return fractal($vehicles, new VehicleRecord())->respond(200, [], JSON_PRETTY_PRINT);
    }

    /**
     * Find resources in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function find(VehicleStore $request)
    {
        $terms = $request->input('q');

        $vehicles = Vehicle::searchFor($terms);

        return fractal($vehicles, new VehicleRecord())->respond(201, [], JSON_PRETTY_PRINT);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VehicleStore $request)
    {
        $dto = (new DataMapperVehicle())->mapVehicleStore2VehicleDTO($request);

        $vehicle = Vehicle::createFromDTO($dto);

        return fractal($vehicle, new VehicleRecord())->respond(201, [], JSON_PRETTY_PRINT);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        return fractal($vehicle, new VehicleRecord())->respond(200, [], JSON_PRETTY_PRINT);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        $dto = (new DataMapperVehicle())->mapVehicleStore2VehicleDTO($request);

        $vehicle = Vehicle::updateFromDTO($dto);

        return fractal($vehicle, new VehicleRecord())->respond(200, [], JSON_PRETTY_PRINT);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();

        return fractal($vehicle, new VehicleRecord())->respond(200, [], JSON_PRETTY_PRINT);
    }
}
