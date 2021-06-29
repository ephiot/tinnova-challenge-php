<?php

namespace App\Helpers;

class Multiples
{
    /**
     * Get all multiples in the sample universe of x (exclusive)
     * 
     * @param  int  $number  End of number selection (sample)
     * @param  int  ...$multipliers  Multipliers elements
     * @return array
     */
    public static function getMultiples(int $number, int ...$multipliers): array
    {
        $result = [];

        sort($multipliers, SORT_ASC);

        for ($i = 1; $i < $number; $i++) {
            foreach ($multipliers as $multiplier) {
                $res = $i * $multiplier;
                if ($res >=  $number) {
                    continue;
                }
                $result[] = $res;
            }
        }

        return $result;
    }

    /**
     * Sum all multiples in the sample universe of x (exclusive)
     * 
     * @param  array  $multiples  Pointer to store multiples list | null
     * @param  int  $number  End of number selection (sample)
     * @param  int ...$multipliers  Multipliers elements
     * @return int
     */
    public static function sumMultiples(array &$multiples = null, int $number, int ...$multipliers): int
    {
        if (!is_array($multiples)) {
            $multiples = [];
        }

        $multiples = self::getMultiples($number, ...$multipliers);

        return array_sum($multiples);
    }
}
