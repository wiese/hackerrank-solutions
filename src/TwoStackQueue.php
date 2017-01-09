<?php
declare(strict_types = 1);

namespace wiese\HackerrankSkeleton;

/**
 * Does not work on hackerrank for some reason
 */
class TwoStackQueue
{
    public function implementation(array $queries) : array
    {
        $inbox = [];
        $outbox = [];

        foreach ($queries as $query) {
            $parts = explode(' ', $query);
            $type = $parts[0];
            $value = $parts[1] ?? null;

            switch ($type) {
                case '1':
                    $inbox[] = $value;
                    break;
                case '2':
                    $this->buildOutbox($outbox, $inbox);
                    array_pop($outbox);
                    break;
                case '3':
                    $this->buildOutbox($outbox, $inbox);
                    $results[] = $outbox[0];
                    break;
            }
        }

        return $results;
    }

    protected function buildOutbox(array & $outbox, array $inbox) : void
    {
        if (empty($outbox)) {
            while (!empty($inbox)) {
                $outbox[] = array_pop($inbox);
            }
        }
    }
}
