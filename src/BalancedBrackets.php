<?php
declare(strict_types = 1);

namespace wiese\HackerrankSkeleton;

class BalancedBrackets
{
    public function implementation(string $expression) : array
    {
        HackerrankApplication::$template = "%s\n";
        return [$this->isBalanced($expression) ? 'YES' : 'NO'];
    }

    protected function isBalanced(string $expression) : bool
    {
        $bracketArray = str_split($expression);
        $length = count($bracketArray);
        $maxIndex = $length - 1;

        $counterparts = ['(' => ')', '[' => ']', '{' => '}'];
        $opening = array_keys($counterparts);
        $counterparts = array_merge($counterparts, array_flip($counterparts));

        if ($length % 2 !== 0) {
            return false;
        }

        $stack = [];
        for ($i = 0; $i <= $maxIndex; $i++) {

            if (in_array($bracketArray[$i], $opening)) {
                $stack[] = $bracketArray[$i];

                if ($i === $maxIndex) {
                    return false;
                }
            } else { // closing
                $prevOpening = array_pop($stack);
                if (is_null($prevOpening) || $counterparts[$prevOpening] !== $bracketArray[$i]) {
                    return false;
                }
            }
        }

        return true;
    }
}
