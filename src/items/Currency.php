<?php

namespace crcl\worlddata\items;

class Currency
{
    public string $code;
    public string $name;
    public string $country;

    public function __construct($items)
    {
        $this->code = strtoupper($items['code']);
        $this->name = $items['name'];
        $this->country = $items['country'];
    }


    public function country() : array
    {
        return Data::getCurrencies()[$this->code]['country'];
    }


}
