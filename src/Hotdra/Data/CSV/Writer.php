<?php

namespace Hotdra\Data\CSV;

use Hotdra\Data\Writer as BaseWriter;
use Hotdra\Data\HeaderTrait;

abstract class Writer extends BaseWriter
{
	use HeaderTrait;

	public function __construct($outputHeader = true)
	{
		$this->setOutputHeader($outputHeader);
	}

	protected function writeFileProcess($filename)
	{
		if (false === $fd = @fopen($filename, "w")) {
			throw new RutimeException("File is not opened!");
		}
		$this->writeStream($fd);
		fclose($fd);
	}

	public function writeStream($stream)
	{
		if (!is_resource($stream)) {
			throw new InvalidArgumentException("Stream parameter is not resource");
		}
		$list = $this->getData();
		if (count($list) > 0) {
			if ($this->isOutputHeader()) {
				fputcsv($stream, array_keys($list[0]));
			}
			foreach ($list as $row) {
				fputcsv($stream, array_values($row));
			}
		}
	}

	protected abstract function getData();

}
