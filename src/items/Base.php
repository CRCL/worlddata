<?php

namespace crcl\worlddata\items;

use ArrayAccess;
use JsonSerializable;

abstract class Base implements JsonSerializable, ArrayAccess
{

    public function toArray() : array
    {
        return (array) $this;
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->{$offset});
    }

    public function offsetGet(mixed $offset): mixed
    {
        return $this->{$offset};
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        $this->{$offset} = $value;
    }

    public function offsetUnset(mixed $offset)
    {
        unset($this->{$offset});
    }
}
