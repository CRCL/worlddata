<?php

namespace crcl\worlddata;

class Language
{
    private string $code;

    public function __construct($code)
    {
        $this->code = strtoupper($code);
    }

    public function getName() : string
    {
        return Data::getLanguages()[$this->code]['name'];
    }

    public function getNameNative() : string
    {
        return Data::getLanguages()[$this->code]['name_native'];
    }

    public function getCode() : string
    {
        return $this->code;
    }

    public function getCountries() : array
    {
        return [];
    }


}
