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
        $this->assertEquals('Germany', $oCountry->name);
        $this->assertEquals('.de', $oCountry->tld);
        $this->assertEquals('EU', $oCountry->continent);
        $this->assertInstanceOf(\crcl\worlddata\items\Continent::class, $oCountry->continent());
    }

    public function test_get_coordinates()
    {
        $oCountry = World::countries('CN');

        $this->assertIsArray($oCountry->coordinates);
        $this->assertEquals([35.0, 105.0], $oCountry->coordinates);
    }

    public function test_get_timezone()
    {
        $oCountry = World::countries('GB');

        $this->assertIsArray($oCountry->timezones);
        $this->assertEquals([["Europe/London", null]], $oCountry->timezones);
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
        $this->assertCount(256, World::countries());
    }

    public function test_check_continent_data()
    {
        foreach (World::countries() as $code => $data) {
            $this->assertArrayHasKey('continent', $data, $code.' has no key "continent"');
            $this->assertNotEmpty($data['continent'], $code.' continent is empty');

            $this->assertArrayHasKey('name', $data, $code.' has no key "name"');
            $this->assertNotEmpty($data['name'], $code.' name is empty');

            $this->assertNotEmpty($data['code'], $code.' continent is empty');
            $this->assertArrayHasKey('timezones', $data, $code.' has no key "timezone"');
            $this->assertArrayHasKey('coordinates', $data, $code.' has no key "name"');

            //$this->assertArrayHasKey('tld', $data, $code.' has no key "tld"');
            //$this->assertArrayHasKey('iso-3166-alpha-2', $data, $code.' has no key "iso-3166-alpha-2"');
            //$this->assertArrayHasKey('iso-3166-alpha-3', $data, $code.' has no key "iso-3166-alpha-3"');

        }
    }
}
