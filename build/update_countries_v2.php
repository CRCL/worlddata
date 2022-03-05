<?php


$countries_data = include dirname(__FILE__).'/../src/data/countries.php';

$new_data = include 'data/world_countries.php';

foreach ($countries_data as $code => $item) {

    if ( !isset($item['code'])) {
        $item['code'] = $code;
    }

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


foreach ($new_data as $data) {

    $data['code'] = strtoupper($data['code']);
    $data['code_alpha3'] = strtoupper($data['code_alpha3']);

    if (isset($countries_data[$data['code']])) {


        $countries_data[$data['code']]['name_full'] = $data['full_name'];
        $countries_data[$data['code']]['capital'] = $data['capital'];
        $countries_data[$data['code']]['emoji'] = $data['emoji'];

        if (is_numeric($data['callingcode'])) {
            $countries_data[$data['code']]['callingcode'] = $data['callingcode'];
        }

        if (!is_null($data['currency_code']) && \crcl\worlddata\World::currencies()->contains('code', $data['currency_code'])) {
            $countries_data[$data['code']]['currency'] = $data['currency_code'];
        }
        else {
            echo 'currency: '.$data['currency_code'].' not found.'.PHP_EOL;
        }

        if (!is_null($data['tld']) && \crcl\worlddata\World::topLevelDomains()->contains('tld', $data['tld'])) {
            $countries_data[$data['code']]['tld'] = $data['tld'];
        }
        else {
            echo 'tld: '.$data['tld'].' not found.'.PHP_EOL;
        }

        if (is_null($countries_data[$data['code']]['name'])) {
            $countries_data[$data['code']]['name'] = $data['name'];
        }

        if (is_null($countries_data[$data['code']]['iso-3166-alpha-3'])) {
            $countries_data[$data['code']]['iso-3166-alpha-3'] = $data['code_alpha3'];
        }

    } else {
        echo $data['code'].' is missing.'.PHP_EOL;
        die();
    }

}

//Update data
file_put_contents(dirname(__FILE__).'/../src/data/countries.php',
                  '<?php return '.var_export($countries_data, true).';');
