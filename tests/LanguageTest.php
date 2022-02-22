<?php

use crcl\worlddata\World;
use PHPUnit\Framework\TestCase;

class LanguageTest extends TestCase
{
    public function test_get_by_code()
    {
        $this->assertEquals('German',
                            World::getLanguage('DE')->getName());

        $this->assertEquals('English',
                            World::getLanguage('EN')->getNameNative());
    }
}
