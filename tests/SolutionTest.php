<?php
declare(strict_types = 1);

namespace wiese\HackerrankSkeleton\Tests;

use wiese\HackerrankSkeleton\Solution;
use PHPUnit_Framework_TestCase;

class SolutionTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider getTestData
     */
    public function testImplementation($expected, $inputs) : void
    {
        $sut = new Solution();
        $this->assertEquals($expected, $sut->implementation($inputs));
    }

    public function getTestData() : array
    {
        return [
            [['expected'], 'input'],
        ];
    }
}
