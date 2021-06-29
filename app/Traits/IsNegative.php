<?php

namespace App\Traits;

trait IsNegative
{
    /**
     * Check if an int collection has a negative item
     * 
     * @param  int  ...$numbers  Int items
     * @return bool
     */
    protected function isNegative(int ...$numbers) : bool
    {
        foreach ($numbers as $number) {
            if ($number < 0) {
                return true;
            }
        }
        return false;
    }
}
