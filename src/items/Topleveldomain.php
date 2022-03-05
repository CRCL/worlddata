<?php

namespace crcl\worlddata\items;

class Topleveldomain
{
    private string $code;

    public function __construct($items)
    {
        $this->code = self::normalise($items['code']);
        $this->tld = $items['tld'];
        $this->countries = [];
    }

    public function countries() : array
    {
        return Data::getTLDs()[$this->code]['countries'];
    }

    public static function normalise($code) : string
    {
        $code = preg_replace('/[^a-zA-Z]/', '', $code);

        return strtoupper($code);
    }
}
