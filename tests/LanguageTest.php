<?php

use crcl\worlddata\World;
use PHPUnit\Framework\TestCase;

class LanguageTest extends TestCase
{
    public function test_get_item()
    {
        $lang = World::languages('DE');

        $this->assertEquals('German', $lang->name);
        $this->assertEquals('Deutsch', $lang->name_native);
    }

    public function test_get_short_cut()
    {
        $this->assertEquals(World::languages()->find('EN'),
                            World::languages('EN'));
    }

    public function test_get_invalid()
    {
        $this->assertNull(World::languages('blabla'));
    }

    function test_supports_array_access()
    {
        $lang = World::languages();

        $this->assertInstanceOf(ArrayAccess::class, $lang);
        $this->assertInstanceOf(\crcl\worlddata\items\Language::class, $lang['FR']);
        $this->assertInstanceOf(ArrayAccess::class, $lang['FR']);
    }

    /*
     * Data tests
     */
    public function test_number_of_languages()
    {
        $this->assertCount(184, World::languages());
    }

    public function test_check_data()
    {
        foreach (World::languages() as $code => $data) {

            $this->assertArrayHasKey('name', $data, $code.' has no key "name"');
            $this->assertArrayHasKey('name_native', $data, $code.' has no key "name_native"');

            $this->assertNotEmpty($data->name, $code.' name is empty');
            $this->assertNotEmpty($data->name_native, $code.' name_native is empty');
        }
    }
}
