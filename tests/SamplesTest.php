<?php

use crcl\worlddata\World;
use PHPUnit\Framework\TestCase;

class SamplesTest extends TestCase
{
    public function test_group_by()
    {

    }

    public function test_check_if_exist()
    {
        $this->assertTrue(\crcl\worlddata\World::continents()->contains('code', 'AF'));
        $this->assertTrue(\crcl\worlddata\World::currencies()->contains('code', 'EUR'));
        $this->assertTrue(\crcl\worlddata\World::topLevelDomains()->contains('tld', '.de'));
        $this->assertTrue(\crcl\worlddata\World::languages()->contains('code', 'FR'));

        $this->assertTrue(\crcl\worlddata\World::countries()->contains('code', 'DE'));
    }

}
