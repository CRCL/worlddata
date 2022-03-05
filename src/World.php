<?php

namespace crcl\worlddata;

use Illuminate\Support\Pluralizer;

/**
 * @method static continents($code = null)
 * @method static countries($code = null)
 * @method static currencies($code = null)
 * @method static languages($code = null)
 * @method static topLevelDomains($code = null)
 */
class World
{
    public static function __callStatic($fn_name, $args)
    {
        $fn_name = strtolower(str_replace(['-', '_', ' '], '', $fn_name));

        if (self::checkValidFunction($fn_name)) {

            $class = '\crcl\worlddata\items\\'.ucfirst(Pluralizer::singular($fn_name));

            $items = include dirname(__FILE__).'/data/'.$fn_name.'.php';
            $collection = Collection::create($items, $class);

            if (isset($args[0])) {
                return $collection->find($args[0]);
            }

            return $collection;
        } else {
            throw new WorldException("Method '{$fn_name}' not found in ".__CLASS__);
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
