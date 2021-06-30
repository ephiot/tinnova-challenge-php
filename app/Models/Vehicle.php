<?php

namespace App\Models;

use App\DTO\VehicleDTO;
use Exception;
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
        $data = [];
        if (!is_null($source->vehicle)) {
            $data['vehicle'] = $source->vehicle;
        }
        if (!is_null($source->vehicle)) {
            $data['brand'] = $source->brand;
        }
        if (!is_null($source->vehicle)) {
            $data['year'] = $source->year;
        }
        if (!is_null($source->vehicle)) {
            $data['description'] = $source->description;
        }
        if (!is_null($source->vehicle)) {
            $data['sold'] = $source->sold;
        }
        return self::create($data);
    }

    /**
     * Get a vehicle from VehicleDTO
     * 
     * @param  VehicleDTO  $source  Data source
     * @return mixed
     */
    public static function getFromDTO(VehicleDTO $source): mixed
    {
        return  self::where('vehicle', $source->vehicle)
                    ->where('brand', $source->brand)
                    ->where('year', $source->year)
                    ->first();
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
            "MATCH (vehicle, brand, year, description) AGAINST (? IN NATURAL LANGUAGE MODE)",
            [$terms]
        )->get();
    }

    /**
     * Update record from VehicleDTO
     * 
     * @param  VehicleDTO  $source  Data source
     * @return bool
     */
    public function updateFromDTO(VehicleDTO $source): bool
    {
        if (!is_null($source->vehicle)) {
            $this->vehicle = $source->vehicle;
        }
        if (!is_null($source->brand)) {
            $this->brand = $source->brand;
        }
        if (!is_null($source->year)) {
            $this->year = $source->year;
        }
        if (!is_null($source->description)) {
            $this->description = $source->description;
        }
        if (!is_null($source->sold)) {
            $this->sold = $source->sold;
        }
        return $this->save();
    }
}
