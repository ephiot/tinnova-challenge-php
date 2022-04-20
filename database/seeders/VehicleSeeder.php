<?php

namespace Database\Seeders;

use App\DTO\VehicleDTO;
use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vehicles = [
            [
                'vehicle' => 'Fiat Mobi 1.0 Easy',
                'brand' => 'Fiat',
                'year' => 2021,
                'description' => 'Car description',
                'sold' => true
            ],
            [
                'vehicle' => 'Nissan Kicks 1.6 Exclusive CVT',
                'brand' => 'Nissan',
                'year' => 2021,
                'description' => 'Car description',
                'sold' => false
            ],
            [
                'vehicle' => 'Mitsubishi L200 Triton Sport 2.4 D GLS 4WD (Aut)',
                'brand' => 'Mitsubishi',
                'year' => 2021,
                'description' => 'Car description',
                'sold' => true
            ],
            [
                'vehicle' => 'Mitsubishi Eclipse Cross 1.5 Turbo HPE (Aut)',
                'brand' => 'Mitsubishi',
                'year' => 2021,
                'description' => 'Car description',
                'sold' => false
            ],
            [
                'vehicle' => 'Peugeot 208 1.6 Active AT',
                'brand' => 'Peugeot',
                'year' => 2021,
                'description' => 'Car description',
                'sold' => false
            ],
            [
                'vehicle' => 'Citroën C4 Cactus 1.6 Live (Aut)',
                'brand' => 'Citroën',
                'year' => 2021,
                'description' => 'Car description',
                'sold' => true
            ],
            [
                'vehicle' => 'Mitsubishi Pajero Sport 2.4 DI-D HPE 4WD (Aut)',
                'brand' => 'Mitsubishi',
                'year' => 2021,
                'description' => 'Car description',
                'sold' => false
            ],
            [
                'vehicle' => 'Hyundai HB20 1.0 Vision (BlueAudio)',
                'brand' => 'Hyundai',
                'year' => 2021,
                'description' => 'Car description',
                'sold' => false
            ],
            [
                'vehicle' => 'Renault Sandero 1.0 Zen',
                'brand' => 'Renault',
                'year' => 2020,
                'description' => 'Car description',
                'sold' => true
            ]
        ];

        foreach ($vehicles as $vehicle) {
            $dto = new VehicleDTO(
                $vehicle['vehicle'],
                $vehicle['brand'],
                (int) $vehicle['year'],
                $vehicle['description'],
                $vehicle['sold']
            );

            if (!$record = Vehicle::getFromDTO($dto)) {
                Vehicle::createFromDTO($dto);
                continue;
            }

            $record->updateFromDTO($dto);
        }
    }
}
