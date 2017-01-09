<?php
declare(strict_types = 1);

namespace wiese\HackerrankSkeleton;

class BubbleSort
{
    public function implementation(string $numberString) : array
    {
        $array = explode(' ', $numberString);
        $integers = [];

        foreach ($array as $value) {
            $integers[] = intval($value);
        }

        $totalSwaps = 0;

        $n = count($integers);
        for ($i = 0; $i < $n; $i++) {

            $numberOfSwaps = 0;

            for ($j = 0; $j < $n - 1; $j++) {
                // Swap adjacent elements if they are in decreasing order
                if ($integers[$j] > $integers[$j + 1]) {
                    $this->swap($integers[$j], $integers[$j + 1]);
                    $numberOfSwaps++;
                }
            }

            // If no elements were swapped during a traversal, array is sorted
            if ($numberOfSwaps == 0) {
                break;
            }

            $totalSwaps += $numberOfSwaps;
        }

        $first = $integers[0];
        $last = $integers[count($integers) - 1];

        HackerrankApplication::$template = "Array is sorted in %d swaps.\nFirst Element: %d\nLast Element: %d\n";
        return [$totalSwaps, $first, $last];
    }

    protected function swap(& $oneElement, & $otherElement)
    {
        $tmp = $oneElement;
        $oneElement = $otherElement;
        $otherElement = $tmp;
    }
}
