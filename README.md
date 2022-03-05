CRCL world data
=========

Enrich country codes with names, continent, time zone, coordinates and tld.

Installation / Usage
--------------------

*Warning* this package is still in development -


Download and install this package via composer.

`composer require crcl/worlddata`

```php
$oContinent = \CRCL\worlddata\World::continents();
$oContinent = \CRCL\worlddata\World::continents()->find('EU'); // Continent instance

$oContinent->code; // EU
$oContinent->name; // Europe
$oContinent->countries; // [Country1, Country2,..]

$oCountry = \crcl\worlddata\World::countries()->find('DE'); // or use shortcut ::countries('DE')
$oCountry->name; // Germany
$oCountry->continent; // ['code' => 'EU', 'name' => 'Europe']
$oCountry->coordinates; // [latitude , longitude] of country center
$oCountry->timezones; // [["Europe/Berlin", null]] Countries with multiple time-zones are represented by an array of time-zone name and time-zone longitude pairs.
$oCountry->tld; // .de

// additional data sets
\crcl\worlddata\World::currencies();
\crcl\worlddata\World::languages()
\crcl\worlddata\World::languages();
\crcl\worlddata\World::topLevelDomains();

// useful samples

\crcl\worlddata\World::countries()->groupBy('continent');

```

all collections are a instance of \Illuminate\Support\Collection

Please take a look at [Laravel Collections Doku](https://laravel.com/docs/8.x/collections#available-methods)

Requirements
------------

Tested and developed under `PHP 8.0`

Security Reports
----------------

Please send any sensitive issue to [support@crcl.com](mailto:support@crcl.com). Thanks!

License
-------

This package is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

Data Accuracy
-------------

As far as we know, the data is accurate, but we make no guarantees of accuracy or completeness.

Use at your own risk.
