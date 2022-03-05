<?php

namespace crcl\worlddata\items;

class Language
{
    public string $code;
    public string $name;
    public string $name_native;
    public array $countries;

    public function __construct($items)
    {
        $this->code = strtoupper($items['code']);
        $this->name = $items['name'];
        $this->name_native = $items['name_native'];
        $this->countries = [];
    }

    public function countries() : array
    {
        return [];
    }


}
