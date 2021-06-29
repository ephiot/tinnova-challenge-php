<?php

namespace Tests\Unit\Traits;

use App\Exceptions\DivisionByZeroException;
use App\Traits\IsNegative;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

class IsNegativeDummy {
    use IsNegative;
}

class IsNegativeTest extends TestCase
{
    /**
     * isNegative must return false
     * 
     * @return void
     */
    public function test_isNegative_must_return_false()
    {
        $dummy = new IsNegativeDummy();

        $reflectionClass = new ReflectionClass($dummy);
        $reflectionMethod = $reflectionClass->getMethod('isNegative');
        $reflectionMethod->setAccessible(true);

        $return = $reflectionMethod->invoke($dummy, 100, 10);

        $this->assertIsBool($return);
        $this->assertFalse($return);
    }

    /**
     * isNegative must return true
     * 
     * @return void
     */
    public function test_isNegative_must_return_true()
    {
        $dummy = new IsNegativeDummy();

        $reflectionClass = new ReflectionClass($dummy);
        $reflectionMethod = $reflectionClass->getMethod('isNegative');
        $reflectionMethod->setAccessible(true);

        $return = $reflectionMethod->invoke($dummy, 100, -1, 10);

        $this->assertIsBool($return);
        $this->assertTrue($return);
    }
}
