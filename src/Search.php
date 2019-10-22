<?php

namespace David\JneCities;

class Search extends \David\JneCities\Base
{
	public function show($value, $type)
	{
		return $this->callApi($value, $type);
	}
}