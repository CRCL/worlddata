<?php

use CRCL\WorldData\World;
use PHPUnit\Framework\TestCase;

class CountryTest extends TestCase
{
    public function test_get_code()
    {
        $oCountry = World::getCountry('de');

        $this->assertEquals('DE',
                            $oCountry->getCode());
    }

    public function test_get_name()
    {
        $oCountry = World::getCountry('it');

        $this->assertEquals('Italy',
                            $oCountry->getName());
    }

    public function test_get_continent()
    {
        $oCountry = World::getCountry('SE');

        $this->assertIsArray($oCountry->getContinent());
        $this->assertEquals(['code' => 'EU', 'name' => 'Europe'],
                            $oCountry->getContinent());
    }

    public function test_get_coordinates()
    {
        $oCountry = World::getCountry('CN');

        $this->assertIsArray($oCountry->getCoordinates());
        $this->assertEquals([35.0, 105.0],
                            $oCountry->getCoordinates());
    }

    public function test_get_timezone()
    {
        $oCountry = World::getCountry('GB');

        $this->assertIsArray($oCountry->getTimezones());
        $this->assertEquals([["Europe/London", null]],
                            $oCountry->getTimezones());
    }

    public function test_get_tld()
    {
        $oCountry = World::getCountry('DE');

        $this->assertEquals('.de',
                            $oCountry->getTld());
    }

    public function test_invalid()
    {
        $oCountry = World::getCountry('invalid');

        $this->assertNull($oCountry);
    }
}
