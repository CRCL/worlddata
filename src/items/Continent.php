<?php

namespace crcl\worlddata\items;

use crcl\worlddata\Collection;
use crcl\worlddata\World;

class Continent extends Base
{
    public string $name;
    public string $code;

    public function __construct($item)
    {
        $this->name = $item['name'];
        $this->code = $item['code'];
    }

    public function countries() : Collection
    {
        return World::countries()->where('continent', $this->code);
    }
 }
