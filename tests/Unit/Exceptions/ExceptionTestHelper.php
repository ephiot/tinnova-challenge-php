<?php

namespace Tests\Unit\Exceptions;

use App\Exceptions\DivisionByZeroException;
use App\Exceptions\NegativeValueException;
use Exception;

class ExceptionTestHelper
{
    /**
     * Throw default exception
     * 
     * @return void
     */
    public function throwDefaultException()
    {
        throw new Exception('Default exception');
    }

    /**
     * Throw DivisionByZeroException exception
     * 
     * @return void
     */
    public function throwDivisionByZeroException()
    {
        throw new DivisionByZeroException();
    }

    /**
     * Throw NegativeValueException exception
     * 
     * @return void
     */
    public function throwNegativeValueException()
    {
        throw new NegativeValueException();
    }
}
