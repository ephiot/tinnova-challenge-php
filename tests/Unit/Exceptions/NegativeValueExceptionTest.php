<?php

namespace Tests\Unit\Exceptions;

use App\Exceptions\NegativeValueException;
use Exception;
use PHPUnit\Framework\TestCase;

class NegativeValueExceptionTest extends TestCase
{
    /**
     * Must throw a default exception
     * 
     * @return void
     */
    public function test_must_throw_a_default_exception()
    {
        $this->expectException(Exception::class);

        (new ExceptionTestHelper())->throwDefaultException();
    }

    /**
     * Must throw a NegativeValueException exception
     * 
     * @return void
     */
    public function test_must_throw_a_NegativeValueException_exception()
    {
        $this->expectException(NegativeValueException::class);
        $this->expectExceptionCode(0);
        $this->expectExceptionMessage('Negative values intended!');

        (new ExceptionTestHelper())->throwNegativeValueException();
    }
}
