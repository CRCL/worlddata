<?php

namespace crcl\worlddata;


class Collection extends \Illuminate\Support\Collection
{
    public static function create($items, $class) : self
    {
        return self::make($items)
                   ->map(function ($item, $key) use ($class) {
                       return new $class($item);
                   });
    }

    public function find($code)
    {
        return $this->firstWhere('code', strtoupper($code));
    }

}
