<?php
declare(strict_types = 1);

namespace wiese\HackerrankSkeleton\Tests;

use wiese\HackerrankSkeleton\RansomNote;
use PHPUnit_Framework_TestCase;

class RansomNoteTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider getTestData
     */
    public function testIt($expected, $inputs) : void
    {
        $sut = new RansomNote();
        $this->assertEquals($expected, $sut->implementation($inputs[0], $inputs[1]));
    }

    public function getTestData() : array
    {
        return [
            [['Yes'], ['give me one grand today night', 'give one grand today']],
            [['No'], ['some magazine content', 'greedy talk']],
        ];
    }
}
