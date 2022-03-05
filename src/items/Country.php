<?php

namespace crcl\worlddata\items;

use crcl\worlddata\World;
use crcl\worlddata\WorldException;

class Country extends Base
{
    public string $code;
    public string $name;
    public string $continent;
    public ?string $tld;
    public array $coordinates;
    public array $timezones;

    public function __construct($item)
    {
        $this->code = strtoupper($item['code']);
        $this->name = $item['name'];
        $this->timezones = $item['timezone'];
        $this->continent = $item['continent'];
        $this->coordinates = $item['coordinates'];
        $this->tld = $item['tld'];
    }

    public function continent()
    {
        return World::continents($this->continent);
    }

}
