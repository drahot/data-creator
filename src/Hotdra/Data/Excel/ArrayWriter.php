<?php 

namespace Hotdra\Data\Excel;

class ArrayWriter extends Writer
{
	private $data;

	public function __construct(array $data, $isXlsxType = true, $outputHeader = true)
	{
		parent::__construct($isXlsxType, $outputHeader);
		$this->data = $data;

	}

	protected function getData()
	{
		return $this->data;
	}	

}