<?php

namespace crcl\worlddata\items;

class Topleveldomain extends Base
{
    public string $code;
    public string $tld;
    public array $countries;

    public function __construct($item)
    {
        $this->code = self::normalise($item['code']);
        $this->tld = $item['tld'];
        $this->countries = [];
    }

    public static function normalise($code) : string
    {
        $code = preg_replace('/[^a-zA-Z]/', '', $code);

        return strtoupper($code);
    }
}
