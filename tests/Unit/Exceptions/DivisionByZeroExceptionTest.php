<?php

namespace Tests\Unit\Exceptions;

use App\Exceptions\DivisionByZeroException;
use Exception;
use PHPUnit\Framework\TestCase;

class DivisionByZeroExceptionTest extends TestCase
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
     * Must throw a DivisionByZeroException exception
     * 
     * @return void
     */
    public function test_must_throw_a_DivisionByZeroException_exception()
    {
        $this->expectException(DivisionByZeroException::class);
        $this->expectExceptionCode(0);
        $this->expectExceptionMessage('Division by zero intended!');

        (new ExceptionTestHelper())->throwDivisionByZeroException();
    }
}
