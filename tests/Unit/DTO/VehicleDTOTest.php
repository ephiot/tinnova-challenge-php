<?php

namespace Tests\Unit\DTO;

use App\DTO\VehicleDTO;
use App\Exceptions\InvalidYearException;
use DateTime;
use Exception;
use PHPUnit\Framework\TestCase;
use TypeError;

class VehicleDTOTest extends TestCase
{
    /**
     * VehicleDTO must be instantiated empty
     * 
     * @return void
     */
    public function test_VehicleDTO_must_be_instantiated_empty()
    {
        $dto = new VehicleDTO();

        $this->assertInstanceOf(VehicleDTO::class, $dto);
    }

    /**
     * VehicleDTO must be instantiated with values
     * 
     * @return void
     */
    public function test_VehicleDTO_must_be_instantiated_with_values()
    {
        $vehicle = 'name';
        $brand = 'brand';
        $year = 1991;
        $description = 'description';
        $sold = true;

        $dto = new VehicleDTO($vehicle, $brand, $year, $description, $sold);

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

    /**
     * Must assign vehicle property directly
     * 
     * @return void
     */
    public function test_must_assign_vehicle_property_directly()
    {
        $vehicle = 'name';

        $dto = new VehicleDTO();
        $dto->vehicle = $vehicle;

        $this->assertInstanceOf(VehicleDTO::class, $dto);
        $this->assertIsString($dto->vehicle);
        $this->assertEquals($vehicle, $dto->vehicle);
    }

    /**
     * Must throw exception while trying to bad assign vehicle property
     * 
     * @return void
     */
    public function test_must_throw_exception_while_trying_to_bad_assign_vehicle_property()
    {
        $this->expectException(TypeError::class);
        $this->expectExceptionMessage('Cannot assign DateTime to property App\DTO\VehicleDTO::$vehicle of type ?string');

        $badValue = (new DateTime())->setTimestamp(0);

        $dto = new VehicleDTO();
        $dto->vehicle = $badValue;

        $this->assertInstanceOf(VehicleDTO::class, $dto);
        $this->assertIsString($dto->vehicle);
        $this->assertEquals($badValue, $dto->vehicle);
    }

    /**
     * Must assign brand property directly
     * 
     * @return void
     */
    public function test_must_assign_brand_property_directly()
    {
        $brand = 'name';

        $dto = new VehicleDTO();
        $dto->brand = $brand;

        $this->assertInstanceOf(VehicleDTO::class, $dto);
        $this->assertIsString($dto->brand);
        $this->assertEquals($brand, $dto->brand);
    }

    /**
     * Must throw exception while trying to bad assign brand property
     * 
     * @return void
     */
    public function test_must_throw_exception_while_trying_to_bad_assign_brand_property()
    {
        $this->expectException(TypeError::class);
        $this->expectExceptionMessage('Cannot assign DateTime to property App\DTO\VehicleDTO::$brand of type ?string');

        $badValue = (new DateTime())->setTimestamp(0);

        $dto = new VehicleDTO();
        $dto->brand = $badValue;

        $this->assertInstanceOf(VehicleDTO::class, $dto);
        $this->assertIsString($dto->brand);
        $this->assertEquals($badValue, $dto->brand);
    }

    /**
     * Must assign description property directly
     * 
     * @return void
     */
    public function test_must_assign_description_property_directly()
    {
        $description = 'name';

        $dto = new VehicleDTO();
        $dto->description = $description;

        $this->assertInstanceOf(VehicleDTO::class, $dto);
        $this->assertIsString($dto->description);
        $this->assertEquals($description, $dto->description);
    }

    /**
     * Must throw exception while trying to bad assign description property
     * 
     * @return void
     */
    public function test_must_throw_exception_while_trying_to_bad_assign_description_property()
    {
        $this->expectException(TypeError::class);
        $this->expectExceptionMessage('Cannot assign DateTime to property App\DTO\VehicleDTO::$description of type ?string');

        $badValue = (new DateTime())->setTimestamp(0);

        $dto = new VehicleDTO();
        $dto->description = $badValue;

        $this->assertInstanceOf(VehicleDTO::class, $dto);
        $this->assertIsString($dto->description);
        $this->assertEquals($badValue, $dto->description);
    }

    /**
     * Must assign year property directly
     * 
     * @return void
     */
    public function test_must_assign_year_property_directly()
    {
        $year = 1991;

        $dto = new VehicleDTO();
        $dto->year = $year;

        $this->assertInstanceOf(VehicleDTO::class, $dto);
        $this->assertEquals($year, $dto->year);
        $this->assertIsInt($dto->year);
        $this->assertGreaterThanOrEqual(date('Y', 0), $dto->year);
        $this->assertLessThanOrEqual(date('Y'), $dto->year);
    }

    /**
     * Must throw exception while trying to bad assign year property
     * 
     * @return void
     */
    public function test_must_throw_exception_while_trying_to_bad_assign_year_property()
    {
        $this->expectException(InvalidYearException::class);
        $this->expectExceptionMessage('Invalid year value!');

        $badValue = 'bad value';

        $dto = new VehicleDTO();
        $dto->year = $badValue;
    }

    /**
     * Must throw exception while trying to assign year before UNIX timestamp
     * 
     * @return void
     */
    public function test_must_throw_exception_while_trying_to_assign_year_before_UNIX_timestamp()
    {
        $this->expectException(InvalidYearException::class);
        $this->expectExceptionMessage('Invalid year value!');

        $year = 1000;

        $dto = new VehicleDTO();
        $dto->year = $year;
    }

    /**
     * Must throw exception while trying to assign year after current year
     * 
     * @return void
     */
    public function test_must_throw_exception_while_trying_to_assign_year_after_current_year()
    {
        $this->expectException(InvalidYearException::class);
        $this->expectExceptionMessage('Invalid year value!');

        $year = ((int) date('Y')) + 10;

        $dto = new VehicleDTO();
        $dto->year = $year;
    }

    /**
     * Must assign sold property directly
     * 
     * @return void
     */
    public function test_must_assign_sold_property_directly()
    {
        $sold = true;

        $dto = new VehicleDTO();
        $dto->sold = $sold;

        $this->assertInstanceOf(VehicleDTO::class, $dto);
        $this->assertEquals($sold, $dto->sold);
        $this->assertIsBool($dto->sold);
    }

    /**
     * Must throw exception while trying to bad assign sold property
     * 
     * @return void
     */
    public function test_must_throw_exception_while_trying_to_bad_assign_sold_property()
    {
        $this->expectException(TypeError::class);
        $this->expectExceptionMessage('Cannot assign DateTime to property App\DTO\VehicleDTO::$sold of type ?bool');

        $badValue = (new DateTime());

        $dto = new VehicleDTO();
        $dto->sold = $badValue;
    }
}
