<?php

namespace Hotdra\Data\CSV;

class ArrayWriter extends Writer
{
	private $data;

	public function __construct(array $data, $outputHeader = true)
	{
		parent::__construct($outputHeader);
		$this->data = $data;
	}

	protected function getData()
	{
		return $this->data;
	}

}