<?php

use crcl\worlddata\World;
use PHPUnit\Framework\TestCase;

class TldTest extends TestCase
{
    public function test_get_by_code_v1()
    {
        $oContinent = World::getTld('.de');

        $this->assertEquals('.de',
                            $oContinent->getTld());
    }

    public function test_get_by_code_v2()
    {
        $oContinent = World::getTld('COM');

        $this->assertEquals('.com',
                            $oContinent->getTld());
    }
}
