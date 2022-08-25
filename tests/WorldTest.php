<?php

use crcl\worlddata\items\Continent;
use crcl\worlddata\World;
use crcl\worlddata\WorldException;
use PHPUnit\Framework\TestCase;

class WorldTest extends TestCase
{
    public function test_invalid_method()
    {
        $this->expectException(WorldException::class);

        $oContinent = World::blubb();
    }

    public function test_array_access_base_item()
    {
        $data = new Continent([
                                  'name' => 'Test',
                                  'code' => 'EU',
                              ]);

        $data['name'] = 'Europe';
        unset($data['code']);

        $this->assertArrayNotHasKey('code', $data);
        $this->assertEquals('Europe', $data->name);

    }
}
