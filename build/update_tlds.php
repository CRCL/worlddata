<?php

$file_content = file_get_contents('https://data.iana.org/TLD/tlds-alpha-by-domain.txt');
$file_content = str_replace(["\n", "\r"], '|', $file_content);

$new_data = $data = explode('|', $file_content);

$TLDs = [];

foreach ($new_data as $tld) {
    $tld = trim($tld);

    if ($tld !== '' && !\Illuminate\Support\Str::startsWith($tld, '#')) {
        $TLDs[strtoupper($tld)] = [
            'code' =>   strtoupper($tld),
            'tld' => '.'.strtolower($tld),
            'countries' => []
        ];
    }
}

ksort($TLDs);

//write data
file_put_contents(dirname(__FILE__).'/../src/data/topleveldomains.php',
                  '<?php return '.var_export($TLDs, true).';');
