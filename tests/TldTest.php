<?php

use crcl\worlddata\World;
use PHPUnit\Framework\TestCase;

class TldTest extends TestCase
{
    public function test_get_item()
    {
        $tld = World::topLevelDomains('DE');

        $this->assertEquals('.de', $tld->tld);
        $this->assertEquals('DE', $tld->code);
    }

    public function test_get_short_cut()
    {
        $this->assertEquals(World::topLevelDomains()
                                 ->find('com'),
                            World::topleveldomains('com'));
    }

    public function test_get_invalid()
    {
        $this->assertNull(World::topLevelDomains('blabla'));
    }

    function test_supports_array_access()
    {
        $oTLD = World::topLevelDomains();

        $this->assertInstanceOf(ArrayAccess::class, $oTLD);
        $this->assertInstanceOf(\crcl\worlddata\items\Topleveldomain::class, $oTLD['CLOUD']);
        $this->assertInstanceOf(ArrayAccess::class, $oTLD['CLOUD']);
    }

    /*
     * Data tests
     */
    public function test_number_of_tlds()
    {
        $this->assertCount(1486, World::topLevelDomains());
    }

    public function test_check_data()
    {
        foreach (World::topLevelDomains() as $code => $data) {

            $this->assertArrayHasKey('tld', $data, $code.' has no key "tld"');
            $this->assertArrayHasKey('code', $data, $code.' has no key "code"');

            $this->assertNotEmpty($data->tld, $code.' tld is empty');
            $this->assertNotEmpty($data->code, $code.' code is empty');
        }
    }


    public function test_get_by_tld_or_code()
    {
        $this->assertEquals('.de', World::topLevelDomains('.de')->tld);
        $this->assertEquals('.de', World::topLevelDomains('de')->tld);
    }
}
