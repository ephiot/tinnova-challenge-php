<?php

namespace App\DataMapper;

use App\DTO\VehicleDTO;
use App\Http\Requests\VehicleStore;
use App\Http\Requests\VehicleUpdate;

class Vehicle
{
    /**
     * Map VehicleStore to VehicleDTO
     * 
     * @param  VehicleStore  $source  Data source
     * @return VehicleDTO
     */
    public function mapVehicleStore2VehicleDTO(VehicleStore $source)
    {
        return new VehicleDTO(
            $source->input('vehicle'),
            $source->input('brand'),
            $source->input('year'),
            $source->input('description'),
            $source->input('sold')
        );
    }

    /**
     * Map VehicleUpdate to VehicleDTO
     * 
     * @param  VehicleUpdate  $source  Data source
     * @return VehicleDTO
     */
    public function mapVehicleUpdate2VehicleDTO(VehicleUpdate $source)
    {
        return new VehicleDTO(
            $source->input('vehicle'),
            $source->input('brand'),
            $source->input('year'),
            $source->input('description'),
            $source->input('sold')
        );
    }
}
