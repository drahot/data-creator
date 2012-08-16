<?php

namespace Hotdra\Data;

trait HeaderTrait
{

	private $outputHeader;

	public function isOutputHeader()
	{
		return $this->outputHeader;
	}

	public function setOutputHeader($outputHeader)
	{
		$this->outputHeader = $outputHeader;
	}
	
}