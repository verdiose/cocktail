<?php
class Recette	{
	private $_idR,
	$_intit,
	$_nbIng,
	$_nbAgr,
	$_realiz;

	public function __construct(array $dataR)	{
		$this->inject($dataR);	}

	public function valide()	{
		return !empty ($this->_intit);	}

	public function inject(array $data)	{
		foreach ($data as $key => $value) {
			$method = 'set'.ucfirst($key);
			if (method_exists($this, $method))	{
				$this->$method($value);
	}	}	}

	// ___ GETTER ___
	public function realiz()	{
		return $this->_realiz;	}

	public function idR()	{
		return $this->_idR;	}

	public function intit()	{
		return $this->_intit;	}

	public function nbIng()	{
		return $this->_nbIng;	}

	public function nbAgr()	{
		return $this->_nbAgr;	}


	// ___ SETTER ___
	public function setIdR($idR)	{
		$idR = (int) $idR;
		if ($idR>0)	{
			$this->_idR = $idR;
		}	}
	public function setIntit($intit)	{
		if (is_string($intit))	{
			$this->_intit = $intit;
		}	}
	public function setNbIng($nbIng)	{
		$nbIng = (int) $nbIng;
		if ($nbIng>1)	{
			$this->_nbIng = $nbIng;
		}	}
	public function setNbAgr($nbAgr)	{
		$nbAgr = (int) $nbAgr;
		if ($nbAgr>1)	{
			$this->_nbAgr = $nbAgr;
		}	}
	public function setRealiz($realiz)	{
		if (is_string($realiz))	{
			$this->_realiz = $realiz;
		}	}

}
