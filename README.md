# JNE Cities Autocomplete

### Installation

```sh
$ composer require david-kurniawan/jne-cities
```

### Usage

```php
use David\JneCities\Search;

$q = 'bek';
$type = 'destination';
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
