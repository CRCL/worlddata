<?php

namespace crcl\worlddata\items;

class Currency extends Base
{
    public string $code;
    public string $name;
    public string $country;

    public function __construct($item)
    {
        $this->code = strtoupper($item['code']);
        $this->name = $item['name'];
        $this->country = $item['country'];
    }


    public function country() : array
    {
        return Data::getCurrencies()[$this->code]['country'];
    }


}
