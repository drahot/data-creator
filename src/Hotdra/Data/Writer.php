<?php

namespace Hotdra\Data;

abstract class Writer implements WriterInterface
{

	public function writeFile($filename)
	{
		if (!is_string($filename)) {
			throw new InvalidArgumentException("Filename parameter is not string!");
		}
		$dirname = dirname($filename);
		if (strlen($dirname) > 0 && !file_exists($dirname)) {
			if (false === @mkdir($dirname, 0777, true)) {
				throw new RutimeException("Directory does not make!");
			}
		}
		$this->writeFileProcess($filename);
	}	

	protected abstract function writeFileProcess($filename);

}