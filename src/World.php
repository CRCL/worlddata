<?php

namespace crcl\worlddata;

use Illuminate\Support\Pluralizer;

/**
 * @method static continents($name = null)
 * @method static countries()
 * @method static currencies()
 * @method static languages()
 * @method static topLevelDomains()
 */
class World
{
    public static function __callStatic($name, $args)
    {
        $name = strtolower(str_replace(['-', '_', ' '], '', $name));

        if (self::checkValidFunction($name)) {
            //$file = Pluralizer::plural($name);
            $class = '\crcl\worlddata\items\\'.ucfirst(Pluralizer::singular($name));

            $items = include dirname(__FILE__).'/data/'.$name.'.php';
            $collection = Collection::create($items, $class);

            if (isset($args[0])) {
                return $collection->find($args[0]);
            }

            return $collection;
        } else {
            throw new WorldException("Method '{$name}' not found in ".__CLASS__);
        }
    }


    private function __construct()
    {
    }

    private function __clone()
    {
    }

    private static function checkValidFunction($name)
    {
        return in_array($name, [
            'continents',
            'countries',
            'currencies',
            'languages',
            'topleveldomains'
        ]);
    }


}
