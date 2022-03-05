<?php

use crcl\worlddata\World;
use PHPUnit\Framework\TestCase;

class CountryTest extends TestCase
{
    public function test_get_item()
    {
        $oCountry =
            World::countries()
                 ->find('de');

        $this->assertEquals('DE', $oCountry->code);
        $this->assertEquals('Italy', $oCountry->getName());

        $this->assertEquals('.de', $oCountry->getTld());

        $aContinent = $oCountry->continent;

        $this->assertIsArray($aContinent);
        $this->assertEquals(['code' => 'EU', 'name' => 'Europe'], $aContinent);
    }

    public function test_get_coordinates()
    {
        $oCountry = World::countries('CN');

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


    public function test_invalid()
    {
        $oCountry = World::countries('invalid');

        $this->assertNull($oCountry);
    }

    /*
     * Data tests
     */
    public function test_number_of_continents()
    {
        $this->assertCount(7, World::countries());
    }

    public function test_check_continent_data()
    {
        foreach (World::countries() as $code => $data) {
            $this->assertArrayHasKey('continent', $data, $code.' has no key "continent"');
            $this->assertNotEmpty($data['continent'], $code.' continent is empty');
            $this->assertNotEmpty($data['code'], $code.' continent is empty');
        }
    }
}
