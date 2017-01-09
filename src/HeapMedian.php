<?php
declare(strict_types = 1);

namespace wiese\HackerrankSkeleton;

class HeapMedian
{
    /**
     * http://codereview.stackexchange.com/questions/147846/find-the-running-median-with-2-heaps
     * https://docs.oracle.com/javase/7/docs/api/java/util/PriorityQueue.html
     *
     * @param array $integers
     * @return array
     */
    public function implementation(array $integers) : array
    {
        $lower = [];
        $higher = [];
        foreach ($integers as $integer) {
            if (empty($higher) || $integer >= $higher[0]) {
                $higher[] = $integer;
            } else {
                $lower[] = $integer;
            }

            if (count($higher) - count($lower) === 2) {
                $lower[] = array_shift($higher);
            } elseif (count($lower) - count($higher) === 2) {
                $higher[] = array_shift($lower);
            }
            sort($higher);
            rsort($lower);

            if (count($higher) === count($lower)) {
                $median = ($higher[0] + $lower[0]) / 2.0;
            } elseif (count($higher) > count($lower)) {
                $median = $higher[0];
            } else {
                $median = $lower[0];
            }

            $medians[] = sprintf("%.1f", $median);
        }

        return $medians;
    }

    public function implementationFirst(array $integers) : array
    {
        $heap = [];
        $medians = [];
        foreach ($integers as $integer) {
            $heap[] = $integer;
            sort($heap);
            $nElements = count($heap);
            if ($nElements === 1) {
                $median = $heap[0];
            } elseif ($nElements % 2 !== 0) {
                $median = $heap[ceil($nElements / 2) - 1];
            } else {
                $median = ($heap[($nElements / 2) - 1] + $heap[($nElements / 2)]) / 2;
            }

            $medians[] = sprintf("%.1f", $median) . PHP_EOL;
        }

        return $medians;
    }
}
