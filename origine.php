<?php
class origine{
	private $_idO,
	$_crea,
	$_pays,
	$_year;

	public function __construct (array $dataO)	{
		$this->injectO($dataO);	}

		public function injectO(array $data)	{
			foreach ($data as $key => $value) {
				$demarche = 'set'.ucfirst($key);
				if (method_exists($this, $demarche))	{
					$this->$demarche($value);
		}	}	}

	// ___ GETTER ___
	public function idO()	{
		return $this->_idO;	}
	public function crea()	{
		return $this->_crea;	}
	public function pays()	{
		return $this->_pays;	}
	public function year()	{
		return $this->_year;	}

	// ___ SETTER ___
	public function setIdO($idO)	{
		$idO = (int) $idO;
		if ($idO>0)	{
			$this->_idO = $idO;
		}	}
	public function setCrea($crea)	{
		if (is_string($crea))	{
			$this->_crea = $crea;
		}	}
	public function setPays($pays)	{
		if (is_string($pays))	{
			$this->_pays = $pays;
		}	}
	public function setDate($year)	{
		if (is_string($year))	{
			$this->_year = $year;
		}	}
}
