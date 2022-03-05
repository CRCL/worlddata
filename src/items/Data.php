<?php

namespace crcl\worlddata\items;

class Data
{
    private static array $countries = [];
    private static array $languages = [];
    private static array $currencies = [];
    private static array $tlds = [];

    public static function getContinents() : array
    {
    }

    public static function getCountries() : array
    {
        if (empty(self::$countries)) {
            self::$countries = include dirname(__FILE__).'/data/countries.php';
        }

        return self::$countries;
    }

    public static function getLanguages() : array
    {
        if (empty(self::$languages)) {
            self::$languages = include dirname(__FILE__).'/data/languages.php';
        }

        return self::$languages;
    }

    public static function getCurrencies() : array
    {
        if (empty(self::$currencies)) {
            self::$currencies = include dirname(__FILE__).'/data/currencies.php';
        }

        return self::$currencies;
    }


    public static function getTLDs() : array
    {
        if (empty(self::$tlds)) {
            self::$tlds = include dirname(__FILE__).'/data/tlds.php';
        }

        return self::$tlds;
    }

}
