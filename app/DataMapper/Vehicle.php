<?php

namespace App\DataMapper;

use App\DTO\VehicleDTO;
use App\Http\Requests\VehicleStore;

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
}
