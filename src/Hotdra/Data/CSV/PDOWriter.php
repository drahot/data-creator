<?php

namespace Hotdra\Data\CSV;

use Hotdra\Utils\PDOTrait;

class PDOWriter extends Writer
{
	use PDOTrait;

	public function __construct(\PDO $db, $sql, array $params = array(), $outputHeader = true)
	{
		parent::__construct($outputHeader);
		$this->setPDO($db);
		$this->setSql($sql);
		$this->setParams($params);
	}

	protected function getData()
	{
		return $this->fetchAll(\PDO::FETCH_ASSOC);
	}

}
