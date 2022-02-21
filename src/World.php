<?php

namespace crcl\worlddata;

interface IWorld
{
    /**
     * @param  string  $isoCode  2-letter iso code
     *
     * @return \CRCL\worlddata\Country | null
     */
    public static function getCountry(string $isoCode) : ?\crcl\worlddata\Country;


    /**
     * @param  string  $isoCode  2-letter iso code
     *
     * @return \CRCL\worlddata\Continent | null
     */
    public static function getContinent(string $isoCode) : ?\crcl\worlddata\Continent;
}

class World implements IWorld
{
    public static function getCountry(string $isoCode) : ?\crcl\worlddata\Country
    {
        $isoCode = strtoupper($isoCode);

        if (array_key_exists($isoCode, Data::getCountries())) {
            return new Country($isoCode);
        }

        return null;
    }

    public static function getContinent(string $isoCode) : ?\crcl\worlddata\Continent
    {
        $isoCode = strtoupper($isoCode);

        if (array_key_exists($isoCode, Data::getContinents())) {
            return new Continent($isoCode);
        }

        return null;
    }

}
