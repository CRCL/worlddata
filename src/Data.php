<?php

namespace crcl\worlddata;

class Data
{
    private static array $countries = [];

    public static function getContinents() : array
    {
        return [
            'AS' => 'Asia',
            'AN' => 'Antarctica',
            'AF' => 'Africa',
            'SA' => 'South America',
            'EU' => 'Europe',
            'OC' => 'Oceania',
            'NA' => 'North America',
        ];
    }

    public static function getCountries() : array
    {
        if (empty(self::$countries)) {
            self::$countries = include 'data/countries.php';
        }

        return self::$countries;
    }

}
