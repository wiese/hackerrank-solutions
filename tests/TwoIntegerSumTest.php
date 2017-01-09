<?php
declare(strict_types = 1);

namespace wiese\HackerrankSkeleton\Tests;

use wiese\HackerrankSkeleton\TwoIntegerSum;
use PHPUnit_Framework_TestCase;

class TwoIntegerSumTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider getAllTestData
     */
    public function testBruteforceStrategy($expected, $inputs) : void
    {
        $sut = new TwoIntegerSum();
        $this->assertEquals($expected, $sut->bruteForceStrategy($inputs[0], $inputs[1]));
    }

    /**
     * @dataProvider getAllTestData
     */
    public function testHashmapStrategy($expected, $inputs) : void
    {
        $sut = new TwoIntegerSum();
        $this->assertEquals($expected, $sut->hashmapStrategy($inputs[0], $inputs[1]));
    }

    /**
     * @dataProvider getOrderedTestData
     */
    public function testHighLowPointersStrategy($expected, $inputs) : void
    {
        $sut = new TwoIntegerSum();
        $this->assertEquals($expected, $sut->highLowPointersStrategy($inputs[0], $inputs[1]));
    }

    public function getOrderedTestData() : array
    {
        return [
            [false, [[1, 2, 4, 9], 8]],
            [false, [[], 11]],
            [true, [[-4, 4], 0]],
            [true, [[0, 5], 5]],
            [true, [[1, 2, 4, 4], 8]],
        ];
    }

    public function getAllTestData() : array
    {
        $data = [
            [true, [[1, 23, 6, 47, 4], 5]],
            [true, [[8, 23, -3, 6, 47, 98], 3]],
            [true, [[3, 2, 4, 7, 11], 15]],
        ];

        return array_merge($this->getOrderedTestData(), $data);
    }
}
