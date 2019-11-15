# JNE Cities Autocomplete

[![Build Status](https://travis-ci.org/David-Kurniawan/jne-cities.svg?style=flat-square)](https://travis-ci.org/David-Kurniawan/jne-cities)
[![License](http://img.shields.io/:license-mit-blue.svg?style=flat-square)](http://doge.mit-license.org)

### Installation

```sh
$ composer require david-kurniawan/jne-cities
```

### Usage

```php
use David\JneCities\Search;

$q = 'bek';
$type = 'destination'; // destination | origin
$response = (new Search())->show($q, $type);
return $response;
```

### Success Response
```json
{
	"code": 200,
	"msg": "success",
	"results": {
		"suggestions": [{
			"value": "BEKASI",
			"code": "BKI10000"
		}]
	}
}
```

### Error Response
```json
{
	"code": 201,
	"msg": "min length is 3"
}
```

License
----

MIT
