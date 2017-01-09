<?php
declare(strict_types = 1);

namespace wiese\HackerrankSkeleton\Tests;

use wiese\HackerrankSkeleton\StringReverse;
use PHPUnit_Framework_TestCase;

class StringReverseTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider getTestData
     */
    public function testImplementation($expected, $inputs) : void
    {
        $sut = new StringReverse();
        $this->assertEquals($expected, $sut->implementation($inputs));
    }

    public function getTestData() : array
    {
        return [
            [['GFEDCBA'], 'ABCDEFG'],
            [['ABBAABBA'], 'ABBAABBA'],
            [['zyx'], 'xyz'],
            [[' kl'], 'lk '],
            [['ik  '], '  ki'],
            [[''], ''],
            [['f'], 'f'],
            [['nm'], 'mn'],
        ];
    }
}
