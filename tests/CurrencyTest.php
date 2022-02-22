<?php

use crcl\worlddata\World;
use PHPUnit\Framework\TestCase;

class CurrencyTest extends TestCase
{
    public function test_get_by_code()
    {
        $this->assertEquals('Euro',
                            World::getCurrency('EUR')->getName());
    }

    public function test_get_code()
    {
        $this->assertEquals('USD',
                            World::getCurrency('USD')->getCode());
    }

    public function test_get_invalid()
    {
        $this->assertNull(
            World::getCurrency('AAA')
        );
    }
}
