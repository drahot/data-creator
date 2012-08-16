<?php

namespace Hotdra\Utils;

trait PDOTrait
{

	private $pdo;
	private $sql;
	private $params;

	public function getPDO()
	{
		return $this->pdo;
	}

	public function setPDO(\PDO $pdo)
	{
		$this->pdo = $pdo;
	}

	public function getSql()
	{
		return $this->sql;
	}

	public function setSql($sql)
	{
		$this->sql = $sql;
	}

	public function setParams(array $params)
	{
		$this->params = $params;
	}

	public function getParams()
	{
		return $this->params;
	}

	public function execute()
	{
		$sth = $this->pdo->prepare($this->sql);
		$sth->execute($this->params);
		return $sth;
	}

	public function fetchAll($fetchStyle)
	{
		return $this->execute()->fetchAll($fetchStyle);
	}

	public function fetch($fetchStyle)
	{
		return $this->execute()->fetchAll($fetchStyle);		
	}

	public function fetchOne()
	{
		return $this->execute()->fetchOne();
	}

}