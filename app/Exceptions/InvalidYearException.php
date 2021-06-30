<?php

namespace App\Exceptions;

use Exception;

class InvalidYearException extends Exception
{
    /**
     * Constructor
     */
    public function __construct(
        string $message = 'Invalid year value!',
        int $code = 0,
        Exception $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }

    /**
     * Cast as string
     * 
     * @return string
     */
    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}] {$this->message}\n";
    }
}
