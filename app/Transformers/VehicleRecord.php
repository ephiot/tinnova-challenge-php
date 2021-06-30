<?php

namespace App\Transformers;

use App\Models\Vehicle;
use League\Fractal\TransformerAbstract;

class VehicleRecord extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        //
    ];
    
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        //
    ];
    
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Vehicle $model)
    {
        return [
            'vehicle' => (string) $model->vehicle,
            'brand' => (string) $model->brand,
            'year' => (int) $model->year,
            'description' => (string) $model->description,
            'sold' => (bool) $model->sold,
            'created_at' => $model->created_at, //->format('d/m/Y H:i:s'),
            'updated_at' => $model->updated_at //->format('d/m/Y H:i:s')
        ];
    }
}
