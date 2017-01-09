<?php
declare(strict_types = 1);

namespace wiese\HackerrankSkeleton\Tests;

use wiese\HackerrankSkeleton\HeapMedian;
use PHPUnit_Framework_TestCase;

class HeapMedianTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider getTestData
     */
    public function testImplementation($expected, $inputs) : void
    {
        $sut = new HeapMedian();
        $this->assertEquals($expected, $sut->implementation($inputs));
    }

    public function getTestData() : array
    {
        return [
            [['12.0', '8.0', '5.0', '4.5', '5.0', '6.0'], [12, 4, 5, 3, 8, 7]],
            [['1.0', '1.5', '2.0', '2.5', '3.0', '3.5', '4.0', '4.5', '5.0', '5.5'], [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]],
        ];
    }
}
