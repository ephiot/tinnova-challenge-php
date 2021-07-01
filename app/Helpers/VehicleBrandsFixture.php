<?php

namespace App\Helpers;

class VehicleBrandsFixture
{
    /**
     * Get all vehicle brands list
     * 
     * @return array
     */
    public static function getAllBrands(): array
    {
        return [
            "Aston Martin",
            "Audi",
            "Bentley",
            "BMW",
            "BMW Motorrad",
            "Caoa Chery",
            "Chevrolet",
            "Chrysler",
            "Citroën",
            "Dodge",
            "Ferrari",
            "Fiat",
            "Ford",
            "Honda",
            "Husqvarna",
            "Hyundai",
            "JAC",
            "Jaguar",
            "Jeep",
            "Kia",
            "Lamborghini",
            "Land Rover",
            "Lexus",
            "Lifan",
            "Maserati",
            "McLaren",
            "Mercedes-Benz",
            "Mini",
            "Mitsubishi",
            "Nissan",
            "Peugeot",
            "Porsche",
            "Ram",
            "Renault",
            "Rolls Royce",
            "Royal Enfield",
            "Smart",
            "Subaru",
            "Suzuki",
            "Toyota",
            "Triumph",
            "Troller",
            "Volkswagen",
            "Volvo",
            "Yamaha"
        ];
    }

    /**
     * Get brands formatted to select list
     * 
     * @return array
     */
    public static function getBrands4Select(): array
    {
        return array_reduce(self::getAllBrands(), function ($carry, $brand) {
            $carry[] = ['label' => $brand, 'value' => $brand];
            return $carry;
        }, []);
    }
}
