<?php

use crcl\worlddata\World;
use PHPUnit\Framework\TestCase;

class SamplesTest extends TestCase
{
    public function test_group_by()
    {
        $items = World::countries()->groupBy('continent');

        $this->assertCount(7, $items);

    }

    public function test_check_if_exist()
    {
        $this->assertTrue(World::continents()->exist('AF'));
        $this->assertTrue(World::currencies()->exist('EUR'));
        $this->assertTrue(World::topLevelDomains()->exist('de'));
        $this->assertTrue(World::languages()->exist('FR'));
        $this->assertTrue(World::countries()->exist('DE'));
    }

}
