<?php

namespace App\Models;

use App\DTO\VehicleDTO;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'vehicle',
        'brand',
        'year',
        'description',
        'sold'
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'sold' => false,
    ];

    /**
     * Create a vehicle from VehicleDTO
     * 
     * @param  VehicleDTO  $source  Data source
     * @return self
     */
    public static function createFromDTO(VehicleDTO $source): self
    {
        return self::create([
            'vehicle' => $source->vehicle,
            'brand' => $source->brand,
            'year' => $source->year,
            'description' => $source->description,
            'sold' => $source->sold
        ]);
    }

    /**
     * Fulltext search for specified terms
     * 
     * @param  string  $terms  Search terms
     * @return Collection
     */
    public static function searchFor(string $terms): Collection
    {
        return self::whereRaw(
            "MATCH (title,body) AGAINST (? IN NATURAL LANGUAGE MODE)",
            [$terms]
        );
    }
}
