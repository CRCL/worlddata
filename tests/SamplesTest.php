<?php

use crcl\worlddata\World;
use PHPUnit\Framework\TestCase;

class SamplesTest extends TestCase
{
    public function test_group_by()
    {
        $items = \crcl\worlddata\World::countries()->groupBy('continent');

        $this->assertCount(7, $items);

    }

    public function test_check_if_exist()
    {
        $this->assertTrue(\crcl\worlddata\World::continents()->exist('AF'));
        $this->assertTrue(\crcl\worlddata\World::currencies()->exist('EUR'));
        $this->assertTrue(\crcl\worlddata\World::topLevelDomains()->exist('de'));
        $this->assertTrue(\crcl\worlddata\World::languages()->exist('FR'));
        $this->assertTrue(\crcl\worlddata\World::countries()->exist('DE'));
    }

}
