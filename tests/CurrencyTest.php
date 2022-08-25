<?php

use crcl\worlddata\items\Currency;
use crcl\worlddata\World;
use PHPUnit\Framework\TestCase;

class CurrencyTest extends TestCase
{
    public function test_get_item()
    {
        $currency = World::currencies('EUR');

        $this->assertEquals('EUR', $currency->code);
        $this->assertEquals('Euro', $currency->name);
    }

    public function test_get_short_cut()
    {
        $this->assertEquals(World::currencies()->find('USD'),
                            World::currencies('USD'));
    }

    public function test_get_invalid()
    {
        $this->assertNull(World::currencies('AAA'));
    }

    function test_supports_array_access()
    {
        $oCurr = World::currencies();

        $this->assertInstanceOf(ArrayAccess::class, $oCurr);
        $this->assertInstanceOf(Currency::class, $oCurr['EUR']);
        $this->assertInstanceOf(ArrayAccess::class, $oCurr['EUR']);
    }

    /*
     * Data tests
     */
    public function test_number_of_currencies()
    {
        $this->assertCount(157, World::currencies());
    }

    public function test_check_continent_data()
    {
        foreach (World::currencies() as $code => $data) {

            $this->assertArrayHasKey('name', $data, $code.' has no key "name"');
            $this->assertArrayHasKey('code', $data, $code.' has no key "code"');

            $this->assertNotEmpty($data->name, $code.' name is empty');
            $this->assertNotEmpty($data->code, $code.' code is empty');
        }
    }
}
