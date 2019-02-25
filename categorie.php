<?php

class Categorie	{
	private $_idC;
	private $_type;

	public function __construct ($neoCa)	{
		$this->_type = $neoCa;
	}

	public function liCa (array $dataC)	{
		foreach ($dataC as $key => $value) {
			$cato[$key]=$value;
		}
		return $cato;
	}

	// ___ GETTER ___
	public function getCat()	{
		return $this->_type;
	}
	public function getIdC()	{
		return $this->_IdC;
	}

	// ___ SETTER ___
	public function setIdC($idC)	{
		$idC = (int) $idC;
		if ($idC>0)	{
			$this->_idC = $idC;
		}
	}
	public function setType($type)	{
		if (is_string($type))	{
			$this->_type = $type;
		}
	}
}
 ?>
