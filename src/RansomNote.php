<?php
declare(strict_types = 1);

namespace wiese\HackerrankSkeleton;

class RansomNote
{
    public function implementation(string $magazine, string $ransom) : array
    {
        $magazine = explode(' ', $magazine);
        $ransom = explode(' ', $ransom);

        return [$this->canWriteLetter($magazine, $ransom) ? 'Yes' : 'No'];
    }

    protected function canWriteLetter(array $magazine, array $ransom) : bool
    {
        if (count($ransom) > count($magazine)) {
            return false;
        }

        $neededWords = $this->mapWords($ransom);
        $availableWords = $this->mapWords($magazine);

        foreach ($neededWords as $word => $requiredCount) {
            if (!isset($availableWords[$word]) || $availableWords[$word] < $requiredCount) {
                return false;
            }
        }

        return true;
    }

    protected function mapWords(array $array) : array
    {
        $words = [];
        foreach ($array AS $word) {
            if (!array_key_exists($word, $words)) {
                $words[$word] = 0;
            }
            $words[$word]++;
        }

        return $words;
    }
}
