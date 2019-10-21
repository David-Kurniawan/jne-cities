<?php

namespace David\JneCities;

class Search extends \David\JneCities\Base
{
	public function show($value)
	{
		return $this->callApi($value);
	}
}