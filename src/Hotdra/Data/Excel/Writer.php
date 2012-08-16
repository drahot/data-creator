<?php

namespace Hotdra\Data\Excel;

use Hotdra\Data\Writer as BaseWriter;
use Hotdra\Data\HeaderTrait;

abstract class Writer extends BaseWriter
{
	use HeaderTrait;

	private $isXlsxType = true;

	public function __construct($isXlsxType = true, $outputHeader = true)
	{
		$this->isXlsxType = $isXlsxType;
		$this->setOutputHeader($outputHeader);
	}

	protected function writeFileProcess($filename)
	{
		$list = $this->getData();
		if (count($list) > 0) {
			$xls = new \PHPExcel();
			$xls->setActiveSheetIndex(0);
			$sheet = $xls->getActiveSheet();
			$sheet->setTitle("Sheet1");
			$line = 1;
			if ($this->isOutputHeader()) {
				foreach (array_keys($list[0]) as $index => $name) {
					$sheet->setCellValue(chr(ord('A') + $index). $line, $name);
				}
				$line++;
			}
			foreach ($list as $row) {
				foreach(array_values($row) as $index => $value) {
					$sheet->setCellValue(chr(ord('A') + $index) . $line, $value);
				}
				$line++;				
			}
			$writer = \PHPExcel_IOFactory::createWriter($xls, $this->isXlsxType ? 'Excel2007' : "Excel5");
			$writer->save($filename);
		}
	}

	public function writeStream($stream)
	{
		throw new BadMethodCallException("Unsupported this method!");
	}

	public function isXlsxType()
	{
		return $this->isXlsxType;
	}

	public function setXlsxType($isXlsxType)
	{
		$this->isXlsxType = $isXlsxType;		
	}

	protected abstract function getData();
}