<?php
declare(strict_types = 1);

namespace wiese\HackerrankSkeleton;

/**
 * @see https://www.youtube.com/watch?v=XKu_SEDAykw
 *
 * Class TwoIntegerSum
 * @package wiese\HackerrankSkeleton
 */
class TwoIntegerSum
{
    public function implementation(string $numberString, int $sum) : array
    {
        $array = explode(' ', $numberString);
        $integers = [];

        foreach ($array as $value) {
            $integers[] = intval($value);
        }

        $sumFound = $this->bruteforce($integers, $sum);

        return [$sumFound ? 'Yes' : 'No'];
    }

    /**
     * Binary search A*B (aka 2 log 2)
     *
     * @param array $integers
     * @param int $sum
     * @return bool
     */
    public function bruteForceStrategy(array $integers, int $sum) : bool
    {
        $n = count($integers);
        for ($i = 0; $i < $n; $i++) {
            for ($j = $i + 1; $j < $n; $j++) {
                if ($integers[$i] + $integers[$j] === $sum) {
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Linear, but only works with ordered set
     *
     * @param array $integers
     * @param int $sum
     * @return bool
     */
    public function highLowPointersStrategy(array $integers, int $sum) : bool
    {
        $low = 0;
        $high = count($integers) - 1;

        while ($low < $high) {
            $currentSum = $integers[$low] + $integers[$high];
            if ($currentSum === $sum) {
                return true;
            } elseif ($currentSum < $sum) {
                $low++;
            } else {
                $high--;
            }
        }

        return false;
    }

    /**
     * Linear, works on unordered
     *
     * @param array $integers
     * @param int $sum
     * @return bool
     */
    public function hashmapStrategy(array $integers, int $sum) : bool
    {
        $n = count($integers);
        $complements = [];
        for ($i = 0; $i < $n; $i++) {
            $currentMumber = $integers[$i];
            if (isset($complements[$currentMumber])) {
                return true;
            }
            $complements[$sum - $currentMumber] = true;
        }

        return false;
    }
}
