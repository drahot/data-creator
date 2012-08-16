<?php

namespace Hotdra\Data\Excel;
use Hotdra\Utils\PDOTrait;

class PDOWriter extends Writer
{
	use PDOTrait;

	public function __construct(\PDO $db, $sql, array $params = array(), 
		$isXlsxType = true, $outputHeader = true)
	{
		parent::__construct($isXlsxType, $outputHeader);
		$this->setPDO($db);
		$this->setSql($sql);
		$this->setParams($params);
	}

	protected function getData()
	{
		return $this->fetchAll(\PDO::FETCH_ASSOC);
	}	

}