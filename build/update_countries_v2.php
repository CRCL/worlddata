<?php


$countries_data = \crcl\worlddata\Data::getCountries();


$new_data = include 'data/world_countries.php';


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

        if (!is_null($data['currency_code']) && \crcl\worlddata\World::getCurrency($data['currency_code'])) {
            $countries_data[$data['code']]['currency'] = $data['currency_code'];
        }
        else {
            echo 'currency: '.$data['currency_code'].' not found.'.PHP_EOL;
        }

        if (!is_null($data['tld']) && \crcl\worlddata\World::getTld($data['tld'])) {
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
