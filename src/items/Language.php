<?php

namespace crcl\worlddata\items;

class Language extends Base
{
    public string $code;
    public string $name;
    public string $name_native;
    public array $countries;

    public function __construct($item)
    {
        $this->code = strtoupper($item['code']);
        $this->name = $item['name'];
        $this->name_native = $item['name_native'];
        $this->countries = [];
    }

    public function countries() : array
    {
        return [];
    }


}
