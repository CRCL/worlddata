<?php

namespace crcl\worlddata\items;

class Country
{
    private string $code;
    private string $name;
    private string $tld;

    private array $continent;
    private array $coordinates;

    public function __construct($items)
    {
        $this->code = strtoupper($items['code']);
        $this->name = $items['name'];
        $this->continent = $items['continent'];
        $this->coordinates = $items['coordinates'];
        $this->tld = $items['tld'];
    }

    public function continent()
    {

    }

}
