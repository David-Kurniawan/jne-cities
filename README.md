# JNE Cities Autocomplete

[![Build Status](https://travis-ci.org/David-Kurniawan/jne-cities.svg?branch=master)](https://travis-ci.org/David-Kurniawan/jne-cities)

### Installation

```sh
$ composer require david-kurniawan/jne-cities
```

### Usage

```php
use David\JneCities\Search;

$q = 'bek';
$response = (new Search())->show($q);
return $response;
```


License
----

MIT
