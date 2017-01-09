<?php

namespace wiese\HackerrankSkeleton\Tests;

use wiese\HackerrankSkeleton\TwoStackQueue;
use PHPUnit_Framework_TestCase;

class TwoStackQueueTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider getTestData
     */
    public function testImplementation($expected, $inputs): void
    {
        $sut = new TwoStackQueue();
        $this->assertEquals($expected, $sut->implementation($inputs));
    }

    public function getTestData(): array
    {
        return [
            [['33', '33', '33'], ['1 76', '1 33', '2', '1 23', '1 97', '1 21', '3', '3', '1 74', '3']],
            [['5'], ['1 6', '1 5', '2', '3']],
            [['14', '14'], ['1 42', '2', '1 14', '3', '1 28', '3', '1 60', '1 78', '2', '2']],
        ];
    }
}
