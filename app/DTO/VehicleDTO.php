<?php

namespace App\DTO;

use App\Exceptions\InvalidYearException;
use DateTime;

class VehicleDTO
{
    /**
     * @var  ?string  $vehicle  Vehicle name
     */
    public ?string $vehicle;

    /**
     * @var  ?string  $brand  Brand name
     */
    public ?string $brand;

    /**
     * @var  ?int  $year  Vehicle launch year
     */
    protected ?int $year;

    /**
     * @var  ?string  $description  Vehicle description
     */
    public ?string $description;

    /**
     * @var  ?bool  $sold  If true, vehicle was sold
     */
    public ?bool $sold = false;

    /**
     * Sanitize year direct assignment
     */
    public function __set(string $attr, mixed $value): void
    {
        if ($attr === 'year') {
            if (!is_null($value)) {
                $minYear = (int) date('Y', 0);
                $maxYear = (int) date('Y');
                if (!is_int($value) || (int) $value < $minYear || (int) $value > $maxYear) {
                    throw new InvalidYearException();
                }
            }
            $this->year = $value;
            return;
        }
    }

    /**
     * Return year value on direct access
     */
    public function __get(string $attr): mixed
    {
        if ($attr === 'year') {
            return $this->year;
        }
    }

    /**
     * Constructor
     * 
     * @param  ?string  $vehicle  Vehicle name
     * @param  ?string  $brand  Brand name
     * @param  ?int  $year  Vehicle launch year
     * @param  ?string  $description  Vehicle description
     * @param  ?bool  $sold  If true, vehicle was sold
     * @return void
     */
    public function __construct(
        ?string $vehicle = null,
        ?string $brand = null,
        ?int $year = null,
        ?string $description = null,
        ?bool $sold = null
    ) {
        $this->setData($vehicle, $brand, $year, $description, $sold);
    }

    /**
     * Set data
     * 
     * @param  ?string  $vehicle?  Vehicle name
     * @param  ?string  $brand?  Brand name
     * @param  ?int  $year?  Vehicle launch year
     * @param  ?string  $description?  Vehicle description
     * @param  ?bool  $sold?  If true, vehicle was sold
     * @return void
     */
    public function setData(
        ?string $vehicle = null,
        ?string $brand = null,
        ?int $year = null,
        ?string $description = null,
        ?bool $sold = null
    ) {
        $this->vehicle = $vehicle;
        $this->brand = $brand;
        $this->year = (!$year) ? (int) date('Y') : $year;
        $this->description = $description;
        $this->sold = $sold;
    }
}
