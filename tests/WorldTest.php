<?php

use crcl\worlddata\World;
use PHPUnit\Framework\TestCase;

class WorldTest extends TestCase
{
    public function test_invalid_method()
    {
        $this->expectException(\crcl\worlddata\WorldException::class);

        $oContinent = World::blubb();
    }

    public function test_array_access_base_item()
    {
        $data = new \crcl\worlddata\items\Continent([
                                                        'name' => 'Test',
                                                        'code' => 'EU',
                                                    ]);

        $data['name'] = 'Europe';
        unset($data['code']);

        $this->assertArrayNotHasKey('code', $data);
        $this->assertEquals('Europe', $data->name);

    }
}
