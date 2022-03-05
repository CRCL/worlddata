<?php

namespace crcl\worlddata\items;

use crcl\worlddata\WorldException;

class Continent extends Base
{
    public string $name;
    public string $code;

    public function __construct($item)
    {
        $this->name = $item['name'];
        $this->code = $item['code'];
    }

    public function countries() : array
    {
        throw new WorldException('not implemented yet');
    }
 }
