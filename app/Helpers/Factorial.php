<?php

namespace App\Helpers;

class Factorial
{
    /**
     * Calculates the factorial of a number
     * 
     * @param  int  $number  Non-negative integer
     * @return int
     */
    public static function getFactorial(int $number, array &$log = null)
    {
        // Negative numbers
        if ($number < 0) {
            if (is_array($log)) {
                $log[] = 'Factorial not work on negative numbers, they will always result in 0.';
            }
            return 0;
        }

        // 0 and 1
        if (in_array($number, [0, 1])) {
            if (is_array($log)) {
                $log[] = "!{$number} = 1";
            }
            return 1;
        }

        // Factorial calculation
        $info = "!{$number} = 1";
        $result = 1;
        for ($i = 2; $i <= $number; $i++) {
            $result *= $i;
            $info .= " x {$i}";
            if (is_array($log)) {
                $log[] = "{$info} = {$result}";
            }
        }

        return $result;
    }
}
