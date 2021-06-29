<?php

namespace App\Traits;

use App\Exceptions\DivisionByZeroException;

trait GetRelation
{
    /**
     * Get a relation between two values
     * 
     * @param  int  $dividend  Values that will be divided
     * @param  int  $divider  Value that will divide
     * @return float  
     */
    protected function getRelation(int $dividend, int $divider) : float
    {
        if ($divider === 0) {
            throw new DivisionByZeroException("Division by zero intended! ({$dividend} / {$divider})");
        }

        return $dividend / $divider;
    }
}
