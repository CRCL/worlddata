<?php

require 'vendor/autoload.php';

use crcl\worlddata\Data;

const LINE = "\n===================\n";

$COUNTRIES_DATA = Data::getCountries();
$NEW_DATA = [];

$content = file_get_contents(__DIR__.'/data/name_and_codes.txt');

foreach (explode("\n\n", $content) as $raw) {

    //parse name
    $raw = str_replace(["\n", "\r"], '|', $raw);
    $name = trim(substr($raw, 0, strpos($raw, '|')));

    //remove name from raw
    $raw = str_replace($name, '', $raw);

    //split the leftovers
    $raw = trim(preg_replace('/[^a-zA-Z\.]+/m', ' ', $raw));
    $data = explode(' ', $raw);

    if ($name !== '') {
        $NEW_DATA[$data[0]] = [
            'name'             => $name,
            'iso-3166-alpha-2' => $data[0],
            'iso-3166-alpha-3' => $data[1],
            'tld'              => $data[2],
        ];
    }
}

echo 'count old data:'.count($COUNTRIES_DATA);
echo LINE;
echo 'count new data:'.count($NEW_DATA);
echo LINE;

foreach ($COUNTRIES_DATA as $code => $item) {

    if (isset($NEW_DATA[$code])) {

        //only use name from the new data if name is not present in the old data
        if ( !isset($item['name'])) {
            $COUNTRIES_DATA[$code]['name'] = $NEW_DATA[$code]['name'];
        }

        //copy new data to old data
        $COUNTRIES_DATA[$code]['iso-3166-alpha-2'] = $NEW_DATA[$code]['iso-3166-alpha-2'];
        $COUNTRIES_DATA[$code]['iso-3166-alpha-3'] = $NEW_DATA[$code]['iso-3166-alpha-3'];
        $COUNTRIES_DATA[$code]['tld'] = $NEW_DATA[$code]['tld'];
    }
}

//set new data to array, if country is missing in the old data
foreach ($NEW_DATA as $code => $item) {
    if ( !isset($COUNTRIES_DATA[$code])) {
        $COUNTRIES_DATA[$code] = $item;
    }
}

// fix array structure
foreach ($COUNTRIES_DATA as $code => $item) {

    if ( !isset($item['name'])) {
        $item['name'] = null;
    }

    if ( !isset($item['continent'])) {
        $item['continent'] = null;
    }

    if ( !isset($item['timezone'])) {
        $item['timezone'] = [];
    }

    if ( !isset($item['coordinates'])) {
        $item['coordinates'] = [null, null];
    }

    if ( !isset($item['iso-3166-alpha-2'])) {
        $item['iso-3166-alpha-2'] = null;
    }

    if ( !isset($item['iso-3166-alpha-3'])) {
        $item['iso-3166-alpha-3'] = null;
    }

    if ( !isset($item['tld'])) {
        $item['tld'] = null;
    }

    //set missing coordinates to null in timezone array
    foreach ($item['timezone'] as $key => $zone) {
        if ( !isset($zone[1])) {
            $item['timezone'][$key][1] = null;
        }
    }

    $COUNTRIES_DATA[$code] = $item;
}

echo 'count mixed data:'.count($COUNTRIES_DATA);

ksort($COUNTRIES_DATA);

file_put_contents(
    dirname(__FILE__).'/../src/data/countries.php',
    '<?php return ' . var_export($COUNTRIES_DATA, true) . ';'
);



