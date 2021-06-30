<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class VehicleControllerTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Must return all vehicles
     *
     * @return void
     */
    public function test_must_return_all_vehicles()
    {
        $response = $this->get('/api/veiculos');

        $response->assertStatus(200);
        $response->assertJson(fn (AssertableJson $json) =>
            $json->has('data', 9, fn ($json) =>
                $json->where('vehicle', 'Fiat Mobi 1.0 Easy')
                     ->where('brand', 'Fiat')
                     ->where('year', 2021)
                     ->where('description', 'Car description')
                     ->where('sold', true)
                     ->etc()
            )
        );
    }

    /**
     * Must find a vehicle with term 'pajero'
     *
     * @return void
     */
    public function test_must_find_a_vehicle_with_term_pajero()
    {
        $response = $this->get('/api/veiculos/find?q=pajero');

        $response->assertStatus(200);
        $response->assertJson(fn (AssertableJson $json) =>
            $json->has('data', 1, fn ($json) =>
                $json->where('vehicle', 'Mitsubishi Pajero Sport 2.4 DI-D HPE 4WD (Aut)')
                     ->where('brand', 'Mitsubishi')
                     ->where('year', 2021)
                     ->where('description', 'Car description')
                     ->where('sold', false)
                     ->etc()
            )
        );
    }

    /**
     * Must return the vehicle with id 2
     *
     * @return void
     */
    public function test_must_return_the_vehicle_with_id_2()
    {
        $response = $this->get('/api/veiculos/2');

        $response->assertStatus(200);
        $response->assertJson(fn (AssertableJson $json) =>
            $json->where('data.vehicle', 'Nissan Kicks 1.6 Exclusive CVT')
                 ->where('data.brand', 'Nissan')
                 ->where('data.year', 2021)
                 ->where('data.description', 'Car description')
                 ->where('data.sold', false)
                 ->etc()
        );
    }

    /**
     * Must update the vehicle with id 3
     *
     * @return void
     */
    public function test_must_update_the_vehicle_with_id_3()
    {
        $response = $this->put('/api/veiculos/3', [
            'vehicle' => 'novo',
            'brand' => 'novo',
            'year' => 1991,
            'description' => 'novo',
            'sold' => true,
        ]);

        $response->assertStatus(200);
        $response->assertJson(fn (AssertableJson $json) =>
            $json->where('data.vehicle', 'novo')
                 ->where('data.brand', 'novo')
                 ->where('data.year', 1991)
                 ->where('data.description', 'novo')
                 ->where('data.sold', true)
                 ->etc()
        );
    }

    /**
     * Must update partially the vehicle with id 3
     *
     * @return void
     */
    public function test_must_update_partially_the_vehicle_with_id_3()
    {
        $response = $this->put('/api/veiculos/3', [
            'vehicle' => 'novo 2',
            'brand' => 'novo 2'
        ]);

        $response->assertStatus(200);
        $response->assertJson(fn (AssertableJson $json) =>
            $json->where('data.vehicle', 'novo 2')
                 ->where('data.brand', 'novo 2')
                 ->where('data.year', 2021)
                 ->where('data.description', 'Car description')
                 ->where('data.sold', true)
                 ->etc()
        );
    }

    /**
     * Must destroy the vehicle with id 5
     *
     * @return void
     */
    public function test_must_destroy_the_vehicle_with_id_5()
    {
        $response = $this->delete('/api/veiculos/5');

        $response->assertStatus(200);
        $response->assertJson(fn (AssertableJson $json) =>
            $json->where('data.vehicle', 'Peugeot 208 1.6 Active AT')
                 ->where('data.brand', 'Peugeot')
                 ->where('data.year', 2021)
                 ->where('data.description', 'Car description')
                 ->where('data.sold', false)
                 ->etc()
        );
    }
}
