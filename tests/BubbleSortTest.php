<?php
declare(strict_types = 1);

namespace wiese\HackerrankSkeleton\Tests;

use wiese\HackerrankSkeleton\BubbleSort;
use PHPUnit_Framework_TestCase;

class BubbleSortTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider getTestData
     */
    public function testImplementation($expected, $inputs) : void
    {
        $sut = new BubbleSort();
        $this->assertEquals($expected, $sut->implementation($inputs));
    }

    public function getTestData() : array
    {
        return [
            [[3, 1, 3], '3 2 1'],
            [[0, 1, 3], '1 2 3'],
            [[1, 4, 11], '4 11 9'],
        ];
    }
}
