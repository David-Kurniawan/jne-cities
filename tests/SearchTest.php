<?php

namespace David\Tests;

use David\JneCities\Search;
use PHPUnit\Framework\TestCase;

class SearchTest extends TestCase
{
	public function testSearch()
	{
		$q = 'bek';
		$response = (new Search())->show($q);
		$response = json_decode($response, true);

        return $this->assertArrayHasKey('results', $response);
	}
}