<?php
declare(strict_types = 1);

namespace wiese\HackerrankSkeleton\Tests;

use wiese\HackerrankSkeleton\CountContacts;
use PHPUnit_Framework_TestCase;

class CountContactsTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider getTestData
     */
    public function testHashmapStrategy($expected, $inputs) : void
    {
        $sut = new CountContacts();
        $this->assertEquals($expected, $sut->implementation($inputs));
    }

    public function getTestData() : array
    {
        return [
            [[2, 0], ['add hack', 'add hackerrank', 'add halo', 'find hac', 'find hak']],
            [[3, 2, 0], ['add january', 'add june', 'add juliet', 'add fabulous', 'find j', 'find ju', 'find shoe']],
            [[5, 4, 3, 2, 1, 0], ['add s', 'add ss','add sss','add ssss','add sssss','find s','find ss','find sss','find ssss','find sssss','find ssssss']],
        ];
    }
}
