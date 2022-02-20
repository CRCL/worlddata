CRCL/WorldData
=========

Enrich country codes with names, continent, time zone, coordinates and tld.

Installation / Usage
--------------------

Download and install this package via composer.

`composer install crcl/worlddata`

```php
$oCountry = \CRCL\WorldData\World::getCountry('DE');
$oCountry->getName(); // Germany
$oCountry->getContinent(); // ['code' => 'EU', 'name' => 'Europe']
$oCountry->getCoordinates(); // [latitude , longitude] of country center
$oCountry->getTimezones(); // [["Europe/Berlin", null]]
$oCountry->getTld(); // .de
// Countries with multiple time-zones are represented by an array of time-zone name and time-zone longitude pairs.

$oContinent = \CRCL\WorldData\World::getContinent('EU');
$oContinent->getCode(); // EU
$oContinent->getName(); // Europe
$oContinent->getCountries(); // [Country1, Country2,..]
```

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
