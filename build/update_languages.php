<?php

$new_data = include 'data/world_languages.php';

$languages = [];

foreach ($new_data as $lang) {


    $languages[strtoupper($lang['iso2'])] = [
        'name'        => $lang['iso_language_name'],
        'name_native' => $lang['native_name'],
        'code'        => $lang['iso3'],
        'countries'   => [],
    ];

}

ksort($languages);

//write data
file_put_contents(dirname(__FILE__).'/../src/data/languages.php',
                  '<?php return '.var_export($languages, true).';');
