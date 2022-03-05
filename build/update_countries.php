<?php


$countries_data = include 'data/countries.php';
$countries_data_new = [];
// Parse file
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
        $countries_data_new[$data[0]] = [
            'name'             => $name,
            'iso-3166-alpha-2' => $data[0],
            'iso-3166-alpha-3' => $data[1],
            'tld'              => $data[2],
        ];
    }
}

//Merge countries data

// foreach old data to update values
foreach ($countries_data as $code => $item) {
    if (isset($countries_data_new[$code])) {
        //only use name from the new data if name is not present in the old data
        if ( !isset($item['name'])) {
            $countries_data[$code]['name'] = $countries_data_new[$code]['name'];
        }
        //copy new data to old data
        $countries_data[$code]['code'] = $code;
        $countries_data[$code]['iso-3166-alpha-2'] = $countries_data_new[$code]['iso-3166-alpha-2'];
        $countries_data[$code]['iso-3166-alpha-3'] = $countries_data_new[$code]['iso-3166-alpha-3'];
        $countries_data[$code]['tld'] = $countries_data_new[$code]['tld'];
    }
}

//set new data to array, if country is missing in the old data
foreach ($countries_data_new as $code => $item) {
    if ( !isset($countries_data[$code])) {
        $countries_data[$code] = $item;
    }
}

// fix array structure
foreach ($countries_data as $code => $item) {

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

    $countries_data[$code] = $item;
}

ksort($countries_data);

//Update data
file_put_contents(dirname(__FILE__).'/../src/data/countries.php',
                  '<?php return '.var_export($countries_data, true).';');
