<?php

use crcl\worlddata\items\Continent;
use crcl\worlddata\World;
use PHPUnit\Framework\TestCase;

class ContinentTest extends TestCase
{

    public function test_get_item()
    {
        $oContinent =
            World::continents()
                 ->find('eu');

        $this->assertEquals('EU', $oContinent->code);
        $this->assertEquals('Europe', $oContinent->name);
    }

    public function test_get_short_cut()
    {
        $this->assertEquals(World::continents()->find('AF'),
                            World::continents('AF'));
    }

    public function test_get_countries()
    {
        $oContinent =
            World::continents()
                 ->find('sa');

        $countries = $oContinent->countries();

        $this->assertIsArray($countries);
        $this->assertCount(18, $countries);
        $this->assertEquals(crcl\worlddata\Country::class,
                            get_class($countries['AR']));
    }

    public function test_invalid()
    {
        $oContinent =
            World::continents()
                 ->find('invalid');

        $this->assertNull($oContinent);
    }

    function test_supports_array_access()
    {
        $oContinents = World::continents();

        $this->assertInstanceOf(ArrayAccess::class, $oContinents);
        $this->assertInstanceOf(Continent::class, $oContinents->find('eu'));
    }

    function test_supports_json()
    {
        $continents = World::continents();

        $this->assertInstanceOf(JsonSerializable::class, $continents);
        $this->assertJson(json_encode($continents));
        $this->assertInstanceOf(JsonSerializable::class, $continents['AS']);
        $this->assertEquals([
                                'name' => 'Europe',
                                'code' => 'EU',
                            ],
                            $continents->find('EU')
                                       ->toArray());
    }

    /*
     * Data tests
     */
    public function test_number_of_continents()
    {
        $this->assertCount(7, World::continents());
    }

    public function test_check_continent_data()
    {
        foreach (World::continents() as $code => $data) {

            $this->assertArrayHasKey('name', $data, $code.' has no key "name"');
            $this->assertArrayHasKey('code', $data, $code.' has no key "code"');

            $this->assertNotEmpty($data->name, $code.' name is empty');
            $this->assertNotEmpty($data->code, $code.' code is empty');
        }
    }
}
