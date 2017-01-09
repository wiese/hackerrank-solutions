<?php
declare(strict_types = 1);

namespace wiese\HackerrankSkeleton;

class StringReverse
{
    public function implementation(string $input) : array
    {
        $length = strlen($input);
        $until = floor($length / 2) - 1; // cope with uneven numbers

        for ($i = 0; $i <= $until; $i++) {
            $currentLetter = $input[$i];
            $opposingPosition = $length - $i - 1; // length and last index are 1 off
            $opposingLetter = $input[$opposingPosition];
            $input[$i] = $opposingLetter;
            $input[$opposingPosition] = $currentLetter;
        }

        return [$input];
    }
}
