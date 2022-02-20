<?php

namespace CRCL\WorldData;

interface IWorld
{
    /**
     * @param  string  $isoCode  2-letter iso code
     *
     * @return \CRCL\WorldData\Country | null
     */
    public static function getCountry(string $isoCode) : ?\CRCL\WorldData\Country;


    /**
     * @param  string  $isoCode  2-letter iso code
     *
     * @return \CRCL\WorldData\Continent | null
     */
    public static function getContinent(string $isoCode) : ?\CRCL\WorldData\Continent;
}

class World implements IWorld
{
    public static function getCountry(string $isoCode) : ?\CRCL\WorldData\Country
    {
        $isoCode = strtoupper($isoCode);

        if (array_key_exists($isoCode, Data::getCountries())) {
            return new Country($isoCode);
        }

        return null;
    }

    public static function getContinent(string $isoCode) : ?\CRCL\WorldData\Continent
    {
        $isoCode = strtoupper($isoCode);

        if (array_key_exists($isoCode, Data::getContinents())) {
            return new Continent($isoCode);
        }

        return null;
    }

}
