<?php

namespace App\Helpers;

class BubbleSort
{
    /**
     * BubbleSort function
     * 
     * @param  array  $items  List of items
     * @param  int  $iterations  (Optional) Number of iterations
     * @param  array  & $log  (Optional) Array with iterations results, step by step
     * @return array
     */
    public static function sort(array $items, int $iterations = 0, array &$log = null): array
    {
        $total = count($items);

        // Each iteration fix the position of one element
        if ($iterations > 1) {
            $total -= ($iterations - 1);
        }

        for ($index = 0; $index < $total; $index++) {
            $value = $items[$index];
            $nextIndex = $index + 1;
            $nextValue = $items[$nextIndex] ?? false;

            if ($nextIndex >= $total || $value <= $nextValue) {
                continue;
            }

            $items[$index] = $nextValue;
            $items[$nextIndex] = $value;
        }

        if (is_array($log)) {
            $log[] = $items;
        }

        return (++$iterations >= $total) ? $items : self::sort($items, $iterations, $log);
    }
}
