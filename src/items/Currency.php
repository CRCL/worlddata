<?php

namespace crcl\worlddata\items;

class Currency
{
    private string $code;

    public function __construct($code)
    {
        $this->code = strtoupper($code);
    }

    public function getName() : string
    {
        return Data::getCurrencies()[$this->code]['name'];
    }

    public function getCode() : string
    {
        return $this->code;
    }

    public function getCountry() : array
    {
        return Data::getCurrencies()[$this->code]['country'];
    }


}
