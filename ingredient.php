<?php
class Ingredient	{
	private $_idI,
	$_lib,
	$_pxL;
	// + origine

	public function __construct (array $dataI)	{
		$this->insuffle($dataI);
	}

	public function insuffle(array $data)	{
		foreach ($data as $key => $value) {
			$proced = 'set'.ucfirst($key);
			if (method_exists($this, $proced))	{
				$this->$proced($value);
			}	}	}

	// ___ GETTER ___
	public function idI()	{
		return $this->_idI;
	}
	public function lib()	{
		return $this->_lib;
	}
	public function cat()	{
		return $this->_cat;
	}
	public function pxL()	{
		return $this->_pxL;
	}

	// ___ SETTER ___
	public function setIdI($idI)	{
		$idI = (int) $idI;
		if ($idI>0)	{
			$this->_idI = $idI;
		}
	}
	public function setLib($lib)	{
		if (is_string($lib))	{
			$this->_lib = $lib;
		}
	}
	public function setCat($cat)	{
		if (is_string($cat))	{
			$this->_cat = $cat;
		}
	}
	public function setPxL($pxL)	{
		$pxL = (float) number_format($pxL,2);
		if ($pxL>0)	{
			$this->_pxL = $pxL;
		}
	}

}
