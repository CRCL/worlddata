<?php

$new_data = include 'data/world_countries.php';

$currencies = [];

foreach ($new_data as $currency) {
    if (trim($currency['currency_code']) !== '') {
        $currencies[strtoupper($currency['currency_code'])] = [
            'name'    => $currency['currency_name'],
            'country' => strtoupper($currency['code']),
            'code' => strtoupper($currency['currency_code'])
        ];
    }
}

ksort($currencies);

//write data
file_put_contents(dirname(__FILE__).'/../src/data/currencies.php',
                  '<?php return '.var_export($currencies, true).';');
