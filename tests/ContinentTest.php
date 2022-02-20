<?php

use CRCL\WorldData\World;
use PHPUnit\Framework\TestCase;

class ContinentTest extends TestCase
{
    public function test_get_code()
    {
        $oContinent = World::getContinent('eu');

        $this->assertEquals('EU',
                            $oContinent->getCode());
    }

    public function test_get_name()
    {
        $oContinent = World::getContinent('AF');

        $this->assertEquals('Africa',
                            $oContinent->getName());
    }

    public function test_get_countries()
    {
        $oContinent = World::getContinent('sa');

        $countries = $oContinent->getCountries();

        $this->assertIsArray($countries);
        $this->assertCount(14, $countries);
        $this->assertEquals(CRCL\WorldData\Country::class,
                            get_class($countries['AR']));
    }

    public function test_invalid()
    {
        $oContinent = World::getContinent('invalid');

        $this->assertNull($oContinent);
    }
}
