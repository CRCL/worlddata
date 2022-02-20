<?php

use CRCL\WorldData\Data;
use PHPUnit\Framework\TestCase;

class DataTest extends TestCase
{
    public function test_number_of_continents()
    {
        $this->assertCount(7, Data::getContinents());
    }

    public function test_check_name()
    {
        foreach (Data::getCountries() as $code => $data) {
            $this->assertArrayHasKey('name', $data, $code.' has no key "name"');
            $this->assertNotEmpty($data['name'], $code.' name is empty');
        }
    }

    public function test_check_continent()
    {
        foreach (Data::getCountries() as $code => $data) {
            $this->assertArrayHasKey('continent', $data, $code.' has no key "continent"');
            //$this->assertNotEmpty($data['continent'], $code.' continent is empty');
        }
    }

    public function test_check_timezone()
    {
        foreach (Data::getCountries() as $code => $data) {
            $this->assertArrayHasKey('timezone', $data, $code.' has no key "timezone"');
            //$this->assertNotEmpty($data['timezone'], $code.' timezone is empty');
        }
    }

    public function test_check_coordinates()
    {
        foreach (Data::getCountries() as $code => $data) {
            $this->assertArrayHasKey('coordinates', $data, $code.' has no key "name"');
            //$this->assertNotEmpty($data['coordinates'], $code.' coordinate is empty');
        }
    }

    public function test_check_alpha_2()
    {
        foreach (Data::getCountries() as $code => $data) {
            $this->assertArrayHasKey('iso-3166-alpha-2', $data, $code.' has no key "iso-3166-alpha-2"');
            //$this->assertNotEmpty($data['iso-3166-alpha-2'], $code.' alpha2 is empty');
        }
    }

    public function test_check_alpha3()
    {
        foreach (Data::getCountries() as $code => $data) {
            $this->assertArrayHasKey('iso-3166-alpha-3', $data, $code.' has no key "iso-3166-alpha-3"');
            //$this->assertNotEmpty($data['iso-3166-alpha-3'], $code.' alpha3 is empty');
        }
    }

    public function test_check_tld()
    {
        foreach (Data::getCountries() as $code => $data) {
            $this->assertArrayHasKey('tld', $data, $code.' has no key "tld"');
            //$this->assertNotEmpty($data['tld'], $code.' tld is empty');
        }
    }
}
