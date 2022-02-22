<?php

namespace crcl\worlddata;

class Tld
{
    private string $code;

    public function __construct($code)
    {
        $this->code = self::normalise($code);
    }

    public static function normalise($code) : string
    {
        $code = preg_replace('/[^a-zA-Z]/', '', $code);

        return strtoupper($code);
    }

    public function getTld() : string
    {
        return Data::getTLDs()[$this->code]['tld'];
    }

    public function getCode() : string
    {
        return $this->code;
    }

    public function getCountries() : array
    {
        return Data::getTLDs()[$this->code]['countries'];
    }


}
