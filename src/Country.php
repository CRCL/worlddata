<?php

namespace crcl\worlddata;

class Country
{
    private string $code;

    public function __construct($code)
    {
        $this->code = strtoupper($code);
    }

    public function getName() : string
    {
        return Data::getCountries()[$this->code]['name'];
    }

    public function getCode() : string
    {
        return $this->code;
    }

    public function getContinent() : array
    {
        $code = Data::getCountries()[$this->code]['continent'];

        return [
            'code' => $code,
            'name' => Data::getContinents()[$code],
        ];
    }

    public function getCoordinates() : array
    {
        return Data::getCountries()[$this->code]['coordinates'];
    }

    public function getTimezones() : array
    {
        return Data::getCountries()[$this->code]['timezone'];
    }

    public function getTld() : string
    {
        return Data::getCountries()[$this->code]['tld'];
    }

}
