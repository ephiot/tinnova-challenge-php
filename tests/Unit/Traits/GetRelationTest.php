<?php

namespace Tests\Unit\Traits;

use App\Exceptions\DivisionByZeroException;
use App\Traits\GetRelation;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

class GetRelationDummy {
    use GetRelation;
}

class GetRelationTest extends TestCase
{
    /**
     * getRelation must return a valid float
     * 
     * @return void
     */
    public function test_getRelation_must_return_a_valid_float()
    {
        $dummy = new GetRelationDummy();

        $reflectionClass = new ReflectionClass($dummy);
        $reflectionMethod = $reflectionClass->getMethod('getRelation');
        $reflectionMethod->setAccessible(true);

        $percentage = $reflectionMethod->invoke($dummy, 100, 10);

        $this->assertIsFloat($percentage);
        $this->assertEquals(10, $percentage);
    }

    /**
     * getRelation must return 33.33
     * 
     * @return void
     */
    public function test_getRelation_must_return_33_33()
    {
        $dummy = new GetRelationDummy();

        $reflectionClass = new ReflectionClass($dummy);
        $reflectionMethod = $reflectionClass->getMethod('getRelation');
        $reflectionMethod->setAccessible(true);

        $percentage = $reflectionMethod->invoke($dummy, 100, 3);
        $expected = 33.333333333333336;

        $this->assertIsFloat($percentage);
        $this->assertEquals($expected, $percentage);
    }

    /**
     * getRelation must return 50 negative
     * 
     * @return void
     */
    public function test_getRelation_must_return_50_negative()
    {
        $dummy = new GetRelationDummy();

        $reflectionClass = new ReflectionClass($dummy);
        $reflectionMethod = $reflectionClass->getMethod('getRelation');
        $reflectionMethod->setAccessible(true);

        $percentage = $reflectionMethod->invoke($dummy, 100, -2);
        $expected = -50;

        $this->assertIsFloat($percentage);
        $this->assertEquals($expected, $percentage);
    }

    /**
     * getRelation must throw a DivisionByZeroException when divider is 0
     * 
     * @return void
     */
    public function test_getRelation_must_throw_a_DivisionByZeroException_when_divider_is_0()
    {
        $this->expectException(DivisionByZeroException::class);

        $dummy = new GetRelationDummy();

        $reflectionClass = new ReflectionClass($dummy);
        $reflectionMethod = $reflectionClass->getMethod('getRelation');
        $reflectionMethod->setAccessible(true);

        $reflectionMethod->invoke($dummy, 100, 0);
    }
}
