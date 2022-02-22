<?php

namespace crcl\worlddata;

class World
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

    public static function getLanguage(string $code) : ?\crcl\worlddata\Language
    {
        $code = strtoupper($code);

        if (array_key_exists($code, Data::getLanguages())) {
            return new Language($code);
        }

        return null;
    }

    public static function getCurrency(string $code) : ?\crcl\worlddata\Currency
    {
        $code = strtoupper($code);

        if (array_key_exists($code, Data::getCurrencies())) {
            return new Currency($code);
        }

        return null;
    }

    public static function getTld(string $code) : ?\crcl\worlddata\Tld
    {
        $code = Tld::normalise($code);

        if (array_key_exists($code, Data::getTLDs())) {
            return new Tld($code);
        }

        return null;
    }


}
