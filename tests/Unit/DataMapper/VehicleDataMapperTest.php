<?php

namespace Tests\Unit\DataMapper;

use App\DataMapper\Vehicle as VehicleDataMapper;
use App\DTO\VehicleDTO;
use App\Http\Requests\VehicleStore;
use \Mockery as m;
use PHPUnit\Framework\TestCase;

class VehicleDataMapperTest extends TestCase
{
    /**
     * Must instantiate a VehicleDTO from VehicleStore request
     * 
     * @return void
     */
    public function test_must_instantiate_a_VehicleDTO_from_VehicleStore_request()
    {
        $vehicle = 'name';
        $brand = 'brand';
        $year = 1991;
        $description = 'description';
        $sold = true;

        $mock = m::mock(VehicleStore::class);
        $mock->shouldReceive('input')->with('vehicle')->andReturn($vehicle);
        $mock->shouldReceive('input')->with('brand')->andReturn($brand);
        $mock->shouldReceive('input')->with('year')->andReturn($year);
        $mock->shouldReceive('input')->with('description')->andReturn($description);
        $mock->shouldReceive('input')->with('sold')->andReturn($sold);

        $dto = (new VehicleDataMapper())->mapVehicleStore2VehicleDTO($mock);

        $this->assertInstanceOf(VehicleDTO::class, $dto);

        $this->assertEquals($vehicle, $dto->vehicle);
        $this->assertIsString($dto->vehicle);

        $this->assertEquals($brand, $dto->brand);
        $this->assertIsString($dto->brand);

        $this->assertEquals($year, $dto->year);
        $this->assertIsInt($dto->year);
        $this->assertGreaterThanOrEqual(date('Y', 0), $dto->year);
        $this->assertLessThanOrEqual(date('Y'), $dto->year);

        $this->assertEquals($description, $dto->description);
        $this->assertIsString($dto->description);

        $this->assertEquals($sold, $dto->sold);
        $this->assertIsBool($dto->sold);
    }
}
