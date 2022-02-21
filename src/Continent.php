<?php

namespace crcl\worlddata;

class Continent
{
    private string $code;

    public function __construct($code)
    {
        $this->code = strtoupper($code);
    }

    public function getName() : string
    {
        return Data::getContinents()[$this->code];
    }

    public function getCode() : string
    {
        return $this->code;
    }

    public function getCountries() : array
    {
        $countries = [];

        foreach (Data::getCountries() as $countryCode => $country) {
            if ($this->code == $country['continent']) {
                $countries[$countryCode] = new Country($countryCode);
            }
        }

        ksort($countries);

        return $countries;
    }


}
